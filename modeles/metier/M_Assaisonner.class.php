<?php
/**
 * Description of M_Assaisonner
 *
 * @author arichard
 */
class M_Assaisonner {

    private $idProduit; // type : int
    private $idSauce; // type : int

    function __construct($idProduit, $idSauce) {
        $this->idProduit = $idProduit;
        $this->idSauce = $idSauce;
    }

    function getIdProduit() {
        return $this->idProduit;
    }

    function getIdSauce() {
        return $this->idSauce;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    function setIdSauce($idSauce) {
        $this->idSauce = $idSauce;
    }

}
