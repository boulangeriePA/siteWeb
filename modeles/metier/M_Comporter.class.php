<?php

/**
 * Description of M_Comporter
 *
 * @author arichard
 */
class M_Comporter {

    private $idMenu; // type : int
    private $idCommande; // type : int

    function __construct($idMenu, $idCommande) {
        $this->idMenu = $idMenu;
        $this->idCommande = $idCommande;
    }

    function getIdMenu() {
        return $this->idMenu;
    }

    function getIdCommande() {
        return $this->idCommande;
    }

    function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }

    function setIdCommande($idCommande) {
        $this->idCommande = $idCommande;
    }

}
