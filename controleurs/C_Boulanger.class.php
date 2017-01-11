<?php

class C_Boulanger extends C_ControleurGenerique {

    function gererFormules() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Nos Formules');
        $daoFormule = new M_DaoMenu();
        $daoFormule->connecter();
        //récupération de la liste des organisations
        $formules = $daoFormule->getAll();
        $this->vue->ecrireDonnee('lesFormules', $formules);
        $daoFormule->deconnecter();
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/boulanger/centreGererFormules.inc.php");
        $this->vue->afficher();
    }
    
    function gererProduits() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Nos Produits');
        
        $daoSandwich = new M_DaoSandwich();
        $daoSandwich->connecter();
        //récupération de la liste des sandwichs
        $sandwichs = $daoSandwich->getSandwichs();
        $this->vue->ecrireDonnee('lesSandwichs', $sandwichs);
        $daoSandwich->deconnecter();
        
        $daoIngredient = new M_DaoIngredient();
        $daoIngredient->connecter();
        //récupération de la liste des sandwichs
        $ingredients = $daoIngredient->getIngredients();
        $this->vue->ecrireDonnee('lesIngredients', $ingredients);
        $daoIngredient->deconnecter();
        
        $daoDessert = new M_DaoDessert();
        $daoDessert->connecter();
        //récupération de la liste des organisations
        $desserts = $daoDessert->getDesserts();
        $this->vue->ecrireDonnee('lesDesserts', $desserts);
        $daoDessert->deconnecter();
        
        $daoBoisson = new M_DaoBoisson();
        $daoBoisson->connecter();
        //récupération de la liste des organisations
        $boissons = $daoBoisson->getBoissons();
        $this->vue->ecrireDonnee('lesBoissons', $boissons);
        $daoBoisson->deconnecter();
         
        
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/boulanger/centreGererProduits.inc.php");
        $this->vue->afficher();
    }
    
    function gererCommandes() {              
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Les commandes');
        $daoCommandeEnCours = new M_DaoCommande();
        $daoCommandeEnCours->connecter();
        //récupération de la liste des organisations
        $commandesEnCours = $daoCommandeEnCours->getCommandesEnCours("en cours");
        $this->vue->ecrireDonnee('lesCommandesEnCours', $commandesEnCours);
        $daoCommandeEnCours->deconnecter();
        
        $daoCommandeTerminee = new M_DaoCommande();
        $daoCommandeTerminee->connecter();
        //récupération de la liste des organisations
        $commandesTerminees = $daoCommandeTerminee->getCommandesTerminees("terminée");
        $this->vue->ecrireDonnee('lesCommandesTerminees', $commandesTerminees);
        $daoCommandeTerminee->deconnecter();
        
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/boulanger/centreGererCommandes.inc.php");
        $this->vue->afficher();
    }

}
