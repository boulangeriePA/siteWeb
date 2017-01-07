<?php

/**
 * Description of M_TypeRetrait
 *
 * @author arichard
 */
class M_TypeRetrait {

    private $idTypeRetrait; // type : int
    private $nomTypeRetrait; // ADMINISTRATEUR, UTILISATEUR

    function __construct($idTypeRetrait, $nomTypeRetrait) {
        $this->idTypeRetrait = $idTypeRetrait;
        $this->nomTypeRetrait = $nomTypeRetrait;
    }

    function getIdTypeRetrait() {
        return $this->idTypeRetrait;
    }

    function getNomTypeRetrait() {
        return $this->nomTypeRetrait;
    }

    function setIdTypeRetrait($idTypeRetrait) {
        $this->idTypeRetrait = $idTypeRetrait;
    }

    function setNomTypeRetrait($nomTypeRetrait) {
        $this->nomTypeRetrait = $nomTypeRetrait;
    }

}
