<?php

/**
 * Description of M_Commande
 *
 * @author arichard
 */
class M_Commande {

    private $idCommande; // type : int
    private $dateHeure; //type : datetime
    private $heureRetrait; //type : date
    private $idUser; //type : int
    private $typeRetrait; //objet TypeRetrait
    private $etatCommande; //// type : varchar
    
    function __construct($idCommande, $dateHeure, $heureRetrait, $idUser, $typeRetrait,$etatCommande) {
        $this->idCommande = $idCommande;
        $this->dateHeure = $dateHeure;
        $this->heureRetrait = $heureRetrait;
        $this->idUser = $idUser;
        $this->typeRetrait = $typeRetrait;
        $this->etatCommande = $etatCommande;
    }

    function getIdCommande() {
        return $this->idCommande;
    }

    function getDateHeure() {
        return $this->dateHeure;
    }

    function getHeureRetrait() {
        return $this->heureRetrait;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getTypeRetrait() {
        return $this->typeRetrait;
    }
    
    function getEtatCommande() {
        return $this->typeRetrait;
    }

    function setIdCommande($idCommande) {
        $this->idCommande = $idCommande;
    }

    function setDateHeure($dateHeure) {
        $this->dateHeure = $dateHeure;
    }

    function setHeureRetrait($heureRetrait) {
        $this->heureRetrait = $heureRetrait;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setTypeRetrait($typeRetrait) {
        $this->typeRetrait = $typeRetrait;
    }
    
    function setEtatCommande($typeRetrait) {
        $this->typeRetrait = $typeRetrait;
    }

}
