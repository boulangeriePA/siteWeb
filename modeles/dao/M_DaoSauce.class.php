<?php
/**
 * Description of M_DaoBoisson
 *
 * @author arichard
 */
class M_DaoBoisson extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "SAUCE";
        $this->nomClefPrimaireIdProduit = "IDSAUCE";
    }

    /**
     * Redéfinition de la méthode abstraite de M_DaoGenerique
     * Permet d'instancier un objet d'après les valeurs d'un enregistrement lu dans la base de données
     * @param tableau-associatif $unEnreg liste des valeurs des champs d'un enregistrement
     * @return objet :  instance de la classe métier, initialisée d'après les valeurs de l'enregistrement 
     */
    public function enregistrementVersObjet($enreg) {
        //on construit l'objet Specialite
        $retour = new M_DaoBoisson($enreg['IDSAUCE'], $enreg['NOMSAUCE']);
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
        $retour = array(
            ':idSauce' => $objetMetier->getIdSauce(),
            ':nomSauce' => $objetMetier->getNomSauce()
        );
        return $retour;
    }

    public function insert($objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "INSERT INTO $this->nomTable (NOMSAUCE) VALUES (:nomSauce)";
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
            $sql .= "NOMSAUCE = :nomSauce ";
            $sql .= "WHERE IDSAUCE = :id";
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
     * Retourne toutes les données en rapport avec l'ID du produit en paramètre
     * @param type $idSauce
     * @return array $retour
     */
    public function selectOne($idSauce) {
        $retour = null;
        try {
            //requete
            $sql = "SELECT * FROM $this->nomTable WHERE idSauce = :id";
            //préparer la requête PDO

            $queryPrepare = $this->pdo->prepare($sql);
            //execution de la  requete
            if ($queryPrepare->execute(array(':id' => $idSauce))) {
                // si la requete marche
                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
                $retour = $this->enregistrementVersObjet($enregistrement);
            }
        } catch (Exception $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

}
