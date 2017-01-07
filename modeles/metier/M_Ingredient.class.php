<?php

/**
 * Description of M_Ingredient
 *
 * @author arichard
 */
class M_Ingredient {

    private $idIngredient; // type : int
    private $nomIngredient; // type : float

    function __construct($idIngredient, $nomIngredient) {
        $this->idIngredient = $idIngredient;
        $this->nomIngredient = $nomIngredient;
    }

    function getIdIngredient() {
        return $this->idIngredient;
    }

    function getNomIngredient() {
        return $this->nomIngredient;
    }

    function setIdIngredient($idIngredient) {
        $this->idIngredient = $idIngredient;
    }

    function setNomIngredient($nomIngredient) {
        $this->nomIngredient = $nomIngredient;
    }

}
