<?php

/**
 * Description of M_Posseder
 *
 * @author arichard
 */
class M_Posseder {

    private $idMenu; // type : int
    private $idProduit; // type : int

    function __construct($idMenu, $idProduit) {
        $this->idMenu = $idMenu;
        $this->idProduit = $idProduit;
    }

    function getIdMenu() {
        return $this->idMenu;
    }

    function getIdProduit() {
        return $this->idProduit;
    }

    function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

}
