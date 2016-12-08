<?php

class M_Promotion {

    private $pAnneeScol;
    private $pIdPersonne;
    private $pNumClasse;

    function __construct($pAnneeScol, $pIdPersonne, $pNumClasse) {
        $this->pAnneeScol = $pAnneeScol;
        $this->pIdPersonne = $pIdPersonne;
        $this->pNumClasse = $pNumClasse;
    }
    public function getPAnneeScol() {
        return $this->pAnneeScol;
    }

    public function getPIdPersonne() {
        return $this->pIdPersonne;
    }

    public function getPNumClasse() {
        return $this->pNumClasse;
    }

    public function setPAnneeScol($pAnneeScol) {
        $this->pAnneeScol = $pAnneeScol;
    }

    public function setPIdPersonne($pIdPersonne) {
        $this->pIdPersonne = $pIdPersonne;
    }

    public function setPNumClasse($pNumClasse) {
        $this->pNumClasse = $pNumClasse;
    }



}
