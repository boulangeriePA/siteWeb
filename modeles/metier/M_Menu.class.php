<?php

/**
 * Description of M_Menu
 *
 * @author arichard
 */
class M_Menu {

    private $idMenu; // type : int
    private $prixMenu; // type : float
    private $nomMenu; // type : String

    function __construct($idMenu, $prixMenu, $nomMenu) {
        $this->idMenu = $idMenu;
        $this->prixMenu = $prixMenu;
        $this->nomMenu = $nomMenu;
    }

    function getIdMenu() {
        return $this->idMenu;
    }

    function getPrixMenu() {
        return $this->prixMenu;
    }

    function getNomMenu() {
        return $this->nomMenu;
    }

    function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }

    function setPrixMenu($prixMenu) {
        $this->prixMenu = $prixMenu;
    }

    function setNomMenu($nomMenu) {
        $this->nomMenu = $nomMenu;
    }

}
