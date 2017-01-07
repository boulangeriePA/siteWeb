<?php

/**
 * Description of M_User
 *
 * @author arichard
 */
class M_User {

    private $idUser; //type : int
    private $nom; //type : String
    private $prenom; //type : String
    private $email; //type : String
    private $tel; //type : String
    private $login; //type : String
    private $mdp; //type : String encodé en sha1
    private $role; //objet role

    function __construct($idUser, $nom, $prenom, $email, $tel, $login, $mdp, $role) {
        $this->idUser = $idUser;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->tel = $tel;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->role = $role;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getEmail() {
        return $this->email;
    }

    function getTel() {
        return $this->tel;
    }

    function getLogin() {
        return $this->login;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getRole() {
        return $this->role;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setRole($role) {
        $this->role = $role;
    }

}
