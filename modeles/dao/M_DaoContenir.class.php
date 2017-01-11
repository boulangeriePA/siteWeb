<?php

/**
 * Description of M_DaoContenir
 *
 * @author arichard
 */
class M_DaoContenir extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "CONTENIR";
        $this->nomClefPrimaireIdProduit = "IDINGREDIENT";
        $this->nomClefPrimaireIdSauce = "IDPRODUIT";
    }

    /**
     * Redéfinition de la méthode abstraite de M_DaoGenerique
     * Permet d'instancier un objet d'après les valeurs d'un enregistrement lu dans la base de données
     * @param tableau-associatif $unEnreg liste des valeurs des champs d'un enregistrement
     * @return objet :  instance de la classe métier, initialisée d'après les valeurs de l'enregistrement 
     */
    public function enregistrementVersObjet($enreg) {
        //on construit l'objet Specialite
        $retour = new M_Contenir($enreg['idIngredient'], $enreg['idProduit']);
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
            ':idIngredient' => $objetMetier->getIdProduit(),
            ':idProduit' => $objetMetier->getIdSauce()
        );
        return $retour;
    } 
}
