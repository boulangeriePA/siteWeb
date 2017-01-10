<?php

/**
 * Description of M_DaoUser
 *
 * @author arichard
 */
class M_DaoUser extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "user";
        $this->nomClefPrimaire = "idUser";
    }

    /**
     * Redéfinition de la méthode abstraite de M_DaoGenerique
     * Permet d'instancier un objet d'après les valeurs d'un enregistrement lu dans la base de données
     * @param tableau-associatif $unEnregistrement liste des valeurs des champs d'un enregistrement
     * @return objet :  instance de la classe métier, initialisée d'après les valeurs de l'enregistrement 
     */
    public function enregistrementVersObjet($enreg) {
// on instancie l'objet Role s'il y a lieu
        $leRole = null;
        if (isset($enreg['nomRole'])) {
            $daoRole = new M_DaoRole();
            $daoRole->setPdo($this->pdo);
            $leRole = $daoRole->getOneById($enreg['idRole']);
        }

// on construit l'objet User 
        $retour = new M_User(
                $enreg['idUser'], $enreg['nomUser'], $enreg['prenomUser'], $enreg['email'], $enreg['tel'], $enreg['login'], $enreg['mdp'], $leRole);
        return $retour;
    }

    /**
     * Prépare une liste de paramètres pour une requête SQL UPDATE ou INSERT
     * @param Object $objetMetier
     * @return array : tableau ordonné de valeurs
     */
    public function objetVersEnregistrement($objetMetier) {
// construire un tableau des paramètres d'insertion ou de modification
// l'ordre des valeurs est important : il correspond à celui des paramètres de la requête SQL
// le rôle sera mis à jour séparément
        if (!is_null($objetMetier->getRole())) {
            $idRole = $objetMetier->getRole()->getIdRole();
        } else {
            $idRole = 0; // "Autre" (simple visiteur)
        }
        $retour = array(
            ':nomUser' => $objetMetier->getNomUser(),
            ':prenomUser' => $objetMetier->getPrenomUser(),
            ':email' => $objetMetier->getEmail(),
            ':tel' => $objetMetier->getTel(),
            ':login' => $objetMetier->getLogin(),
            ':mdp' => $objetMetier->getMdp(),
            ':idRole' => $idRole
        );
        return $retour;
    }

    /**
     * Lire tous les enregistrements d'une table
     * @return tableau-associatif d'objets : un tableau d'instances de la classe métier
     */
    function getAll() {
        echo "--- getAll redéfini ---<br/>";
        $retour = null;
// Requête textuelle
        $sql = "SELECT * FROM $this->nomTable P ";
        $sql .= "LEFT OUTER JOIN ROLE R ON R.IDROLE = P.IDROLE ";
        try {
// préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
// exécuter la requête PDO
            if ($queryPrepare->execute()) {
// si la requête réussit :
// initialiser le tableau d'objets à retourner
                $retour = array();
// pour chaque enregistrement retourné par la requête
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
// construir un objet métier correspondant
                    $unObjetMetier = $this->enregistrementVersObjet($enregistrement);
// ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    /**
     * Lire tous les enregistrements de table par le role insérer en paramètre
     * @return tableau-associatif d'objets : un tableau d'instances de la classe métier
     */
    function getAllByRole($idrole) {
        $retour = null;
        try {
            // Requête textuelle
            $sql = "SELECT * FROM $this->nomTable P ";
            $sql .= "LEFT OUTER JOIN ROLE R ON R.IDROLE = P.IDROLE ";
            $sql .= "WHERE P.IDROLE = :role";
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
            if ($queryPrepare->execute(array(':role' => $idrole))) {
                // si la requête réussit :
                // extraire l'enregistrement retourné par la requête
                // construire l'objet métier correspondant
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
// construir un objet métier correspondant
                    $unObjetMetier = $this->enregistrementVersObjet($enregistrement);
// ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    // Lire un enregistrement d'une table par son id mis en paramètre
    function getOneById($id) {
        $retour = null;
        try {
            // Requête textuelle
            $sql = "SELECT * FROM $this->nomTable P ";
            $sql .= "LEFT OUTER JOIN ROLE R ON R.IDROLE = P.IDROLE ";
            $sql .= "WHERE $this->nomClefPrimaire = :id";
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
            if ($queryPrepare->execute(array(':id' => $id))) {
                // si la requête réussit :
                // extraire l'enregistrement retourné par la requête
                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
                // construire l'objet métier correspondant
                $retour = $this->enregistrementVersObjet($enregistrement);
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    // Lire un enregistrement d'une table par son login mis en paramètre
    function getOneByLogin($valeurLogin) {
        $retour = null;
        try {
            // Requête textuelle
            $sql = "SELECT * FROM $this->nomTable P ";
            $sql .= "LEFT OUTER JOIN ROLE R ON R.IDROLE = P.IDROLE ";
            $sql .= "WHERE P.LOGIN = ?";
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
            if ($queryPrepare->execute(array($valeurLogin))) {
                // si la requête réussit :
                // extraire l'enregistrement retourné par la requête
                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
                // construire l'objet métier correspondant
                $retour = $this->enregistrementVersObjet($enregistrement);
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    /**
     * verifierLogin
     * @param string $login
     * @param string $mdp
     * @return boolean 
     */
    function verifierLogin($login, $mdp) {
        $retour = null;
        try {
            $sql = "SELECT * FROM $this->nomTable INNER JOIN role r ON $this->nomTable.idRole=r.idRole WHERE LOGIN = :login AND MDP = :mdp";
            $stmt = $this->pdo->prepare($sql);
            if ($stmt->execute(array(':login' => $login, ':mdp' => sha1($mdp)))) {
                $retour = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }
    
    /**
     * suppression
     * @param type $objetMetier
     * @return boolean Cette fonction retourne TRUE en cas de succès ou FALSE si une erreur survient.
     */
    function insert($objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "INSERT INTO $this->nomTable (";
            $sql .= "NOMUSER, PRENOMUSER, EMAIL, TEL, LOGIN, MDP, IDROLE) ";
            $sql .= "VALUES (";
            $sql .= ":nomUser, :prenomUser, :email, :tel, :login, :mdp, :idRole)";
//            var_dump($sql);
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // préparer la  liste des paramètres, avec l'identifiant en dernier
            $parametres = $this->objetVersEnregistrement($objetMetier);
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $retour = $queryPrepare->execute($parametres);
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    function update($idMetier, $objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "UPDATE $this->nomTable SET ";
            $sql .= "NOMUSER = :nomUser, ";
            $sql .= "PRENOMUSER = :prenomUser, ";
            $sql .= "EMAIL = :email, ";
            $sql .= "TEL = :tel, ";
            $sql .= "LOGIN = :login, ";
            $sql .= "MDP = :mdp, ";
            $sql .= "IDROLE = :idRole ";
            $sql .= "WHERE IDUSER = :id";
//            var_dump($sql);
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // préparer la  liste des paramètres la valeur de l'identifiant
            //  à prendre en compte est celle qui a été passée en paramètre à la méthode
            $parametres = $this->objetVersEnregistrement($objetMetier);
            $parametres[':id'] = $idMetier;
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $retour = $queryPrepare->execute($parametres);
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

}
