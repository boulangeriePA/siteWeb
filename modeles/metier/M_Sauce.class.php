<?php

/**
 * Description of M_Sauce
 *
 * @author arichard
 */
class M_Sauce {

    private $idSauce; // type : int
    private $nomSauce; // type : float

    function __construct($idSauce, $nomSauce) {
        $this->idSauce = $idSauce;
        $this->nomSauce = $nomSauce;
    }

    function getIdSauce() {
        return $this->idSauce;
    }

    function getNomSauce() {
        return $this->nomSauce;
    }

    function setIdSauce($idSauce) {
        $this->idSauce = $idSauce;
    }

    function setNomSauce($nomSauce) {
        $this->nomSauce = $nomSauce;
    }

}
