<?php

/**
 * Description of M_DaoCommande
 *
 * @author arichard
 */
class M_DaoCommande extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "COMMANDE";
        $this->nomClefPrimaire = "idCommande";
    }

    /**
     * Redéfinition de la méthode abstraite de M_DaoGenerique
     * Permet d'instancier un objet d'après les valeurs d'un enregistrement lu dans la base de données
     * @param tableau-associatif $unEnreg liste des valeurs des champs d'un enregistrement
     * @return objet :  instance de la classe métier, initialisée d'après les valeurs de l'enregistrement 
     */
    public function enregistrementVersObjet($enreg) {
        // on instancie l'objet TypeRetrait s'il y a lieu
        $leTypeRetrait = null;
        if (isset($enreg['nomTypeRetrait'])) {
            $daoTypeRetrait = new M_DaoTypeRetrait();
            $daoTypeRetrait->setPdo($this->pdo);
            $leTypeRetrait = $daoTypeRetrait->getOneById($enreg['idTypeRetrait']);
        }
        $retour = new M_Commande($enreg['idCommande'], $enreg['dateHeure'], $enreg['heureRetrait'], $enreg['idUser'], $leTypeRetrait);
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
        // le type de retrait sera mis à jour séparément
        if (!is_null($objetMetier->getTypeRetrait())) {
            $idTypeRetrait = $objetMetier->getTypeRetrait()->getIdTypeRetrait();
        } else {
            $idTypeRetrait = 1; // "Sur place"
        }
        $retour = array(
            ':dateHeure' => $objetMetier->getDateHeure(),
            ':heureRetrait' => $objetMetier->getHeureRetrait(),
            ':idUser' => $objetMetier->getIdUser(),
            ':idTypeRetrait' => $idTypeRetrait
        );
        return $retour;
    }

    public function insert($objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "INSERT INTO $this->nomTable (";
            $sql .= "DATEHEURE, HEURERETRAIT, IDUSER, IDTYPERETRAIT) ";
            $sql .= "VALUES (";
            $sql .= ":dateHeure, :heureRetrait, :idUser, :idTypeRetrait)";
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

    public function update($idMetier, $objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "UPDATE $this->nomTable SET ";
            $sql .= "DATEHEURE = :dateHeure, ";
            $sql .= "HEURERETRAIT = :heureRetrait, ";
            $sql .= "IDUSER = :idUser, ";
            $sql .= "IDTYPERETRAIT = :idTypeRetrait ";
            $sql .= "WHERE IDCOMMANDE = :id";
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

    /**
     * Retourne toutes les données en rapport avec l'ID de la commande en paramètre
     * @param type $idCommande
     * @return array $retour
     */
    public function selectOne($idCommande) {
        $retour = null;
        try {
            //requete
            $sql = "SELECT * FROM $this->nomTable WHERE idCommande = :id";
            //préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            //execution de la  requete
            if ($queryPrepare->execute(array(':id' => $idCommande))) {
                // si la requete marche
                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
                $retour = $this->enregistrementVersObjet($enregistrement);
            }
        } catch (Exception $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }
    
    function getCommandesByLogin($login) {
        $retour = null;
// Requête textuelle
        $sql = "SELECT * FROM $this->nomTable ";
        $sql .= "INNER JOIN user u ON $this->nomTable.idUser=u.idUser ";
        $sql .= "INNER JOIN typeRetrait tr ON  $this->nomTable.idTypeRetrait=tr.idTypeRetrait ";
        $sql .= "WHERE u.login = :login";
        try {
// préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
// exécuter la requête PDO
            if ($queryPrepare->execute(array(':login' => $login))) {
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
     * Lire tous les enregistrements d'une table
     * @return tableau-associatif d'objets : un tableau d'instances de la classe métier
     */
    function getAll() {
        $retour = null;
// Requête textuelle
        $sql = "SELECT * FROM $this->nomTable";
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

}
