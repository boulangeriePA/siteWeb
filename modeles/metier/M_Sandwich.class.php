<?php

/**
 * Description of M_Sandwich
 *
 * @author arichard
 */
class M_Sandwich extends M_Produit {

    private $temperaturePain; // type : booléen

    function __construct($idProduit, $nomProduit, $temperaturePain) {
        super();
        $this->temperaturePain = $temperaturePain;
    }

    function getTemperaturePain() {
        return $this->temperaturePain;
    }

    function setTemperaturePain($temperaturePain) {
        $this->temperaturePain = $temperaturePain;
    }

}
