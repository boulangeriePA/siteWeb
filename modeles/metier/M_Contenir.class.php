<?php

/**
 * Description of M_Contenir
 *
 * @author arichard
 */
class M_Contenir {

    private $idIngredient; // type : int
    private $idProduit; // type : int

    function __construct($idIngredient, $idProduit) {
        $this->idIngredient = $idIngredient;
        $this->idProduit = $idProduit;
    }

    function getIdIngredient() {
        return $this->idIngredient;
    }

    function getIdProduit() {
        return $this->idProduit;
    }

    function setIdIngredient($idIngredient) {
        $this->idIngredient = $idIngredient;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

}
