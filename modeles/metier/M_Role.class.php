<?php

/**
 * Description of M_Role
 *
 * @author arichard
 */
class M_Role {

    private $idRole; // type : int
    private $nomRole; // ADMINISTRATEUR, UTILISATEUR

    function __construct($idRole, $nomRole) {
        $this->idRole = $idRole;
        $this->nomRole = $nomRole;
    }

    function getIdRole() {
        return $this->idRole;
    }

    function getNomRole() {
        return $this->nomRole;
    }

    function setIdRole($idRole) {
        $this->idRole = $idRole;
    }

    function setNomRole($nomRole) {
        $this->nomRole = $nomRole;
    }

}
