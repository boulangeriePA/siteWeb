<?php

/**
 * Description of M_Boisson
 *
 * @author arichard
 */
class M_Boisson extends M_Produit {

    private $volume; // type : float

    function __construct($idProduit, $nomProduit, $volume) {
        super();
        $this->volume = $volume;
    }

    function getVolume() {
        return $this->volume;
    }

    function setVolume($volume) {
        $this->volume = $volume;
    }

}
