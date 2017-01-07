<?php
/**
 * Description of M_Commande
 *
 * @author arichard
 */
class M_Commande {

    private $idCommande; // type : int
    private $retrait; // type : booléen
    private $numero; //type : int
    private $dateHeure; //type : datetime
    private $heureRetrait; //type : date
    private $idUser; //type : int

    function __construct($idCommande, $retrait, $numero, $dateHeure, $heureRetrait, $idUser) {
        $this->idCommande = $idCommande;
        $this->retrait = $retrait;
        $this->numero = $numero;
        $this->dateHeure = $dateHeure;
        $this->heureRetrait = $heureRetrait;
        $this->idUser = $idUser;
    }

    function getIdCommande() {
        return $this->idCommande;
    }

    function getRetrait() {
        return $this->retrait;
    }

    function getNumero() {
        return $this->numero;
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

    function setIdCommande($idCommande) {
        $this->idCommande = $idCommande;
    }

    function setRetrait($retrait) {
        $this->retrait = $retrait;
    }

    function setNumero($numero) {
        $this->numero = $numero;
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

}
