<?php

/**
 * Description of M_Produit
 *
 * @author arichard
 */
abstract class M_Produit {

    protected $idProduit; // type : int
    protected $nomProduit; // type : String

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
