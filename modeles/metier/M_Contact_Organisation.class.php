<?php

class M_Contact_Organisation {

    private $idOrganisation;
    private $idContact;
    private $fonction;

    function __construct($idOrganisation, $idContact, $fonction) {
        $this->idOrganisation = $idOrganisation;
        $this->idContact = $idContact;
        $this->fonction = $fonction;
    }

    public function getIdOrganisation() {
        return $this->idOrganisation;
    }

    public function getIdContact() {
        return $this->idContact;
    }

    public function getFonction() {
        return $this->fonction;
    }

    public function setIdOrganisation($idOrganisation) {
        $this->idOrganisation = $idOrganisation;
    }

    public function setIdContact($idContact) {
        $this->idContact = $idContact;
    }

    public function setFonction($fonction) {
        $this->fonction = $fonction;
    }

}
