<?php

/**
 * Description of M_Produit
 *
 * @author arichard
 */
class M_Produit {

    private $idProduit; // type : int
    private $nomProduit; // type : String

    function __construct($idProduit, $nomProduit) {
        $this->idProduit = $idProduit;
        $this->nomProduit = $nomProduit;
    }

    function getIdProduit() {
        return $this->idProduit;
    }

    function getNomProduit() {
        return $this->nomProduit;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    function setNomProduit($nomProduit) {
        $this->nomProduit = $nomProduit;
    }

}
