<?php

class M_DaoPromotion extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "PROMOTION";
        $this->nomClefPrimaireAnneeScol = "ANNEESCOL";
        $this->nomClefPrimaireIdPersonne = "IDPERSONNE";
        $this->nomClefPrimaireNumClasse = "NUMCLASSE";
    }

    /**
     * Redéfinition de la méthode abstraite de M_DaoGenerique
     * Permet d'instancier un objet d'après les valeurs d'un enregistrement lu dans la base de données
     * @param tableau-associatif $unEnreg liste des valeurs des champs d'un enregistrement
     * @return objet :  instance de la classe métier, initialisée d'après les valeurs de l'enregistrement 
     */
    public function enregistrementVersObjet($enreg) {
        // on construit l'objet Role 
        $retour = new M_Promotion($enreg['ANNEESCOL'], $enreg['IDPERSONNE'], $enreg['NUMCLASSE']);
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
            ':anneeScol' => $objetMetier->getPAnneeScol(),
            ':idPersonne' => $objetMetier->getPIdPersonne(),
            ':numClasse' => $objetMetier->getPNumClasse()
        );
        return $retour;
    }

    public function insert($objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "INSERT INTO $this->nomTable (";
            $sql .= "ANNEESCOL, IDPERSONNE, NUMCLASSE) ";
            $sql .= "VALUES (";
            $sql .= ":anneeScol, :idPersonne, :numClasse)";
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
        return FALSE;
    }

    /**
     * Retourne toutes les données en rapport avec l'ID du rôle en paramètre
     * @param type $idRole
     * @return array $retour
     */
    public function selectOne($idPersonne) {
        $retour = null;
        try {
            //requete
            $sql = "SELECT * FROM $this->nomTable WHERE idpersonne= :id";
            //préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            //execution de la  requete
            if ($queryPrepare->execute(array(':id' => $idPersonne))) {
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
