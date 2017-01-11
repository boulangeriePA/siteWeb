<?php

/**
 * Description of M_Sandwich
 *
 * @author arichard
 */
class M_Sandwich extends M_Produit {

    private $temperaturePain; // type : booléen

    function __construct($idProduit, $nomProduit, $temperaturePain) {
        $this->temperaturePain = $temperaturePain;
        parent::__construct($idProduit, $nomProduit);
    }

    function getTemperaturePain() {
        return $this->temperaturePain;
    }

    function setTemperaturePain($temperaturePain) {
        $this->temperaturePain = $temperaturePain;
    }

}
