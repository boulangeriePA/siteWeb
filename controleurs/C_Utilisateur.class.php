<?php

class C_Utilisateur extends C_ControleurGenerique {

    /**
     * préparation et affichage des coordonnées de l'utilisateur courant
     */
    function coordonnees() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Vos informations');
        // charger les coordonnées de l'utilisateur connecté depuis la BDD       
        $daoPers = new M_DaoUser();
        $daoPers->connecter();
        $utilisateur = $daoPers->getOneByLogin(MaSession::get('login'));
        $daoPers->deconnecter();
        $this->vue->ecrireDonnee('utilisateur', $utilisateur);
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreAfficherMesInformationsFormulaire.inc.php");
        $this->vue->afficher();
    }

    /**
     *  modification des coordonnées de l'utilisateur courant
     */
    function modifierCoordonnees() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Modification de vos informations');
        // charger les coordonnées de l'utilisateur connecté depuis la BDD       
        $daoPers = new M_DaoUser();
        $daoPers->connecter();
        $utilisateur = $daoPers->getOneByLogin(MaSession::get('login'));
        $daoPers->deconnecter();
        $this->vue->ecrireDonnee('utilisateur', $utilisateur);
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));

        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreModifierMesInformationsFormulaire.inc.php");
        $this->vue->afficher();
    }

    //validation de modification des donnée personelle à l'utilisateur
    function validerModifierCoordonnees() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', "Modification de vos informations");
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreValiderModifierMesInformations.inc.php");
        $daoPers = new M_DaoUser();
        $daoPers->connecter();
        // récupérer les données du formulaire l'identifiant de l'utilisateur courant
        $id = $_GET["id"];

        // charger l'objet métier correspondant à l'utilisateur courant
//        $utilisateur = $daoPers->getOneByLoginEager($id);
        $utilisateur = $daoPers->getOneById($id);
//        var_dump($utilisateur);
        // mettre à jour l'objet métier d'après le formilaire de saisie
        $utilisateur->setNomUser($_POST["nom"]);
        $utilisateur->setPrenomUser($_POST["prenom"]);
        $utilisateur->setEmail($_POST["mail"]);
        $utilisateur->setTel($_POST["tel"]);
        
        $ok = $daoPers->update($id, $utilisateur);
        if ($ok) {
            $this->vue->ecrireDonnee('message', "Modifications enregistrées");
        } else {
            $this->vue->ecrireDonnee('message', "Echec des modifications");
        }
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }

    function afficherCommandes() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Mes commandes');
        $daoCommande = new M_DaoCommande();
        $daoCommande->connecter();
        //récupération de la liste des commandes
        $commandes = $daoCommande->getCommandesByLogin(MaSession::get('login'));
        $this->vue->ecrireDonnee('lesCommandes', $commandes);
        $daoCommande->deconnecter();
//        
//        $daoProduit = new M_DaoProduit();
//        $daoProduit->connecter();
//        //récupération de la liste des commandes
//        $produits = $daoProduit->getProduitsCommandeByIdCommande($commandes->getIdCommande());
//        $this->vue->ecrireDonnee('lesProduits', $produits);
//        $daoProduit->deconnecter();
//        
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreAfficherCommandes.inc.php");
        $this->vue->afficher();
    }
    
    function commander1() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Mes commandes');
        $daoFormule = new M_DaoMenu();
        $daoFormule->connecter();
        //récupération de la liste des organisations
        $formules = $daoFormule->getAll();
        $this->vue->ecrireDonnee('lesFormules', $formules);
        $daoFormule->deconnecter();
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreCommander1.inc.php");
        $this->vue->afficher();
    }
    
    function commander2() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Mes commandes');
        $daoFormule = new M_DaoMenu();
        $daoFormule->connecter();
        //récupération de la liste des organisations
        $formules = $daoFormule->getAll();
        $this->vue->ecrireDonnee('lesFormules', $formules);
        $daoFormule->deconnecter();
        
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
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreCommander2.inc.php");
        $this->vue->afficher();
    }
    
    function produits() {
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
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreProduits.inc.php");
        $this->vue->afficher();
    }
    
    function formules() {
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
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreFormules.inc.php");
        $this->vue->afficher();
    }
    
    function commandesEnCours() {              
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Les commandes');
        $daoCommandeEnCours = new M_DaoCommande();
        $daoCommandeEnCours->connecter();
        //récupération de la liste des organisations
        $etatCommande="en cours";
        $commandesEnCours = $daoCommandeEnCours->getCommandesEnCours($etatCommande);
        $this->vue->ecrireDonnee('lesCommandesEnCours', $commandesEnCours);
        $daoCommandeEnCours->deconnecter();
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreCommandesEnCours.inc.php");
        $this->vue->afficher();
    }
}
