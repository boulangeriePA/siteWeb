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
        $id = htmlentities(stripcslashes(trim($_GET["id"])));

        // charger l'objet métier correspondant à l'utilisateur courant
        // $utilisateur = $daoPers->getOneByLoginEager($id);
        $utilisateur = $daoPers->getOneById($id);
        // var_dump($utilisateur);
        $nom = htmlentities(stripcslashes(trim($_POST["nom"])));
        $prenom = htmlentities(stripcslashes(trim($_POST["prenom"])));
        $mail = htmlentities(stripcslashes(trim($_POST["mail"])));
        $tel = htmlentities(stripcslashes(trim($_POST["tel"])));
        $login = htmlentities(stripcslashes(trim($_POST["login"])));
        $password = $_POST["password"];
        // mettre à jour l'objet métier d'après le formilaire de saisie
        if(isset($nom)){$utilisateur->setNomUser($nom);}
        if(isset($prenom)){$utilisateur->setPrenomUser($prenom);}
        if(isset($mail)){$utilisateur->setEmail($mail);}
        if(isset($tel)){$utilisateur->setTel($tel);}
        if(isset($login)){$utilisateur->setLogin($login);}
        if(isset($password)){$utilisateur->setMdp(sha1($password));}
        //$utilisateur->setMdp(password_hash($_POST['password'],PASSWORD_BCRYPT));

        /*
         * Vous l'aurez peut-être remarqué, le hash d'une même chaîne ne donne jamais le même résultat,
         * dans ce cas comment le comparer ?
         * PHP met à disposition la fonction password_verify(), pour cela :
         * 
         * if(password_verify('ADMIN', '$2a$10$GlvaE1qXuYE6O/ICVtPTeOf3QwE6QNB2quHgqpbK2JKzDYCNnyAL6')) {
         * echo 'OK';
         * } else {
         * echo 'ERREUR';
         * }
         * 
         */


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
        $this->vue->ecrireDonnee('titreVue', 'Commander');
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
        $this->vue->ecrireDonnee('titreVue', 'Commander');
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
    
    function commander3() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'ValidationCommande');
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
        
        $daoTypeRetrait = new M_DaoTypeRetrait();
        $daoTypeRetrait->connecter();
        //récupération de la liste des sandwichs
        $typeRetrait = $daoTypeRetrait->getTypesRetraits();
        $this->vue->ecrireDonnee('lesTypesRetraits', $typeRetrait);
        $daoTypeRetrait->deconnecter();

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
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreCommander3.inc.php");
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

// Fonction d'affichage du formulaire d'inscription
    function inscription() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Inscription');
        // ... depuis la BDD       
        $daoPers = new M_DaoUser();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();

        // Mémoriser la liste des rôles disponibles
        $daoRole = new M_DaoRole();
        $daoRole->setPdo($pdo);
        $this->vue->ecrireDonnee('lesRoles', $daoRole->getAll());

        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreInscription.inc.php");

        $this->vue->afficher();
    }

//validation de création d'utilisateur 
    function validationInscription() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', "Validation Inscription");

        $daoRole = new M_DaoRole();
        $daoRole->connecter();
        $pdo = $daoRole->getPdo();
        $role = new M_Role(null, null);
        $role = $daoRole->selectOne(2);
        $daoRole->deconnecter();
        //* récupération de toutes les données en rapport avec l'ID du rôle choisi dans la page de création d'une personne

        $nom = htmlentities(stripcslashes(trim($_POST['nom'])));
        $prenom = htmlentities(stripcslashes(trim($_POST['prenom'])));
        $mail = htmlentities(stripcslashes(trim($_POST['mail'])));
        $tel = htmlentities(stripcslashes(trim($_POST['tel'])));
        $login = htmlentities(stripcslashes(trim($_POST['login'])));
        $mdp = sha1($_POST['mdp']);
        //$mdp = password_hash($_POST['mdp'],PASSWORD_BCRYPT);

        /*
         * Vous l'aurez peut-être remarqué, le hash d'une même chaîne ne donne jamais le même résultat,
         * dans ce cas comment le comparer ?
         * PHP met à disposition la fonction password_verify(), pour cela :
         * 
         * if(password_verify('ADMIN', '$2a$10$GlvaE1qXuYE6O/ICVtPTeOf3QwE6QNB2quHgqpbK2JKzDYCNnyAL6')) {
         * echo 'OK';
         * } else {
         * echo 'ERREUR';
         * }
         * 
         */

        $unePersonne = new M_User(null, $nom, $prenom, $mail, $tel, $login, $mdp, $role);
        $daoPers = new M_DaoUser();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
        $daoPers->insert($unePersonne);
        $daoPers->deconnecter();

        if ($daoPers) {

            $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreValiderInscription.php");
        }

        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }

}
