<?php
/**
 * Description of M_Boisson
 *
 * @author arichard
 */
class M_Boisson {

    private $idProduit; // type : int
    private $volume; // type : float

    function __construct($idProduit, $volume) {
        $this->idProduit = $idProduit;
        $this->volume = $volume;
    }

    function getIdProduit() {
        return $this->idProduit;
    }

    function getVolume() {
        return $this->volume;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    function setVolume($volume) {
        $this->volume = $volume;
    }

}
