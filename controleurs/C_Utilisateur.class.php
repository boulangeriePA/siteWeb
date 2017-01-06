<?php

class C_Utilisateur extends C_ControleurGenerique {

    /**
     * préparation et affichage des coordonnées de l'utilisateur courant
     */
    function coordonnees() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Vos informations');
        // charger les coordonnées de l'utilisateur connecté depuis la BDD       
        $daoPers = new M_DaoPersonne();
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
        $daoPers = new M_DaoPersonne();
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
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        // récupérer les données du formulaire l'identifiant de l'utilisateur courant
        $id = $_GET["id"];

        // charger l'objet métier correspondant à l'utilisateur courant
//        $utilisateur = $daoPers->getOneByLoginEager($id);
        $utilisateur = $daoPers->getOneById($id);
//        var_dump($utilisateur);
        // mettre à jour l'objet métier d'après le formilaire de saisie
        $utilisateur->setCivilite($_POST["civilite"]);
        $utilisateur->setNom($_POST["nom"]);
        $utilisateur->setPrenom($_POST["prenom"]);
        $utilisateur->setNumTel($_POST["tel"]);
        $utilisateur->setMail($_POST["mail"]);
        if (MaSession::get('role') == 4) {
            $utilisateur->setEtudes($_POST["etudes"]);
            $utilisateur->setFormation($_POST["formation"]);
        }
        $ok = $daoPers->update($id, $utilisateur);
        if ($ok) {
            $this->vue->ecrireDonnee('message', "Modifications enregistr&eacute;es");
        } else {
            $this->vue->ecrireDonnee('message', "Echec des modifications");
        }
        $this->vue->afficher();
    }

    function ajoutStage() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Ajouter un stage');
        // ... depuis la BDD       
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $daoAnneeScol = new M_DaoAnneeScol();
        $daoAnneeScol->connecter();
        $daoOrga = new M_DaoOrganisation();
        $daoOrga->connecter();

        //récupération de la liste des élèves
        $eleve = $daoPers->getAllByRole('4');
        $this->vue->ecrireDonnee('lesEleves', $eleve);
        
        // charger les coordonnées de l'utilisateur connecté depuis la BDD       
        $utilisateur = $daoPers->getOneByLogin(MaSession::get('login'));
        $this->vue->ecrireDonnee('utilisateur', $utilisateur);

        //récupération de la liste des années scolaires
        $anneescol = $daoAnneeScol->getAll();
        $this->vue->ecrireDonnee('lesAnneesScol', $anneescol);

        //récupération de la liste des organisations
        $organisation = $daoOrga->getAll();
        $this->vue->ecrireDonnee('lesOrganisations', $organisation);

        //récupération de la liste des maîtres de stage
        $maitrestage = $daoPers->getAllByRole('5');
        $this->vue->ecrireDonnee('lesMaitresStage', $maitrestage);

        //récupération de la liste des maîtres de stage
        $professeur = $daoPers->getAllByRole('3');
        $this->vue->ecrireDonnee('lesProfesseurs', $professeur);

        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreAjouterStage.inc.php");

        $this->vue->afficher();
    }

    function validerAjoutStage() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', "Validation de la création d'une personne");
        //récupération des données
        $annee = $_POST['annee'];
        $organisation = $_POST['organisation'];
        $ville = $_POST['ville'];
        $dateDebut = $_POST['dateDebut'];
        $dateFin = $_POST['dateFin'];
        $dateVisite = $_POST['dateVisite'];
        $eleve = $_POST['eleveId'];
        $professeur = $_POST['professeur'];
        $maitreStage = $_POST['maitrestage'];
        $divers = $_POST['divers'];
        $bilanTravaux = $_POST['bilanTravaux'];
        $ressourcesOutils = $_POST['RessourcesOutils'];
        $commentaire = $_POST['Commentaire'];
        $participationCCF = $_POST['ParticipationCCF'];

        //création d'un stage
        $unStage = new M_Stage(0, $annee, $eleve, $professeur, $organisation, $maitreStage, $dateDebut, $dateFin, $dateVisite, $ville, $divers, $bilanTravaux, $ressourcesOutils, $commentaire, $participationCCF);
        $daoStage = new M_DaoStage();
        $daoStage->connecter();
        $daoStage->insert($unStage);
        $daoStage->deconnecter();

        if ($daoStage) {
            $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreValiderAjoutStage.php");
        }
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get("login"));
        $this->vue->afficher();
    }

    function afficherCommandes() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Mes commandes');
        $daoOrg = new M_DaoOrganisation();
        $daoOrg->connecter();
        //récupération de la liste des organisations
        $organisation = $daoOrg->getAll();
        $this->vue->ecrireDonnee('lesOrganisations', $organisation);
        $daoOrg->deconnecter();
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreAfficherCommandes.inc.php");
        $this->vue->afficher();
    }
    
    function commander() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Commander');
        $daoOrg = new M_DaoOrganisation();
        $daoOrg->connecter();
        //récupération de la liste des organisations
        $organisation = $daoOrg->getAll();
        $this->vue->ecrireDonnee('lesOrganisations', $organisation);
        $daoOrg->deconnecter();
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreCommander.inc.php");
        $this->vue->afficher();
    }
    
    function produits() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Nos Produits');
        $daoOrg = new M_DaoOrganisation();
        $daoOrg->connecter();
        //récupération de la liste des organisations
        $organisation = $daoOrg->getAll();
        $this->vue->ecrireDonnee('lesOrganisations', $organisation);
        $daoOrg->deconnecter();
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreProduits.inc.php");
        $this->vue->afficher();
    }
    
    function formules() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Nos Formules');
        $daoOrg = new M_DaoOrganisation();
        $daoOrg->connecter();
        //récupération de la liste des organisations
        $organisation = $daoOrg->getAll();
        $this->vue->ecrireDonnee('lesOrganisations', $organisation);
        $daoOrg->deconnecter();
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreFormules.inc.php");
        $this->vue->afficher();
    }
    
    function commandesEnCours() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Les commandes');
        $daoOrg = new M_DaoOrganisation();
        $daoOrg->connecter();
        //récupération de la liste des organisations
        $organisation = $daoOrg->getAll();
        $this->vue->ecrireDonnee('lesOrganisations', $organisation);
        $daoOrg->deconnecter();
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreCommandesEnCours.inc.php");
        $this->vue->afficher();
    }

    function MajEntreprise() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Maj Entreprise');
        $daoOrg = new M_DaoOrganisation();
        $daoOrg->connecter();
        //récupération de la liste des organisations
        $organisation = $daoOrg->getAll();
        $this->vue->ecrireDonnee('lesOrganisations', $organisation);
        $daoOrg->deconnecter();
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreMajEntreprise.inc.php");
        $this->vue->afficher();
    }

    //validation de maj d'une entreprise
    function validerMajEntreprise() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', "Modification de vos informations");
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreValiderModifierMesInformations.inc.php");
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        // récupérer les données du formulaire l'identifiant de l'utilisateur courant
        $id = $_GET["id"];

        // charger l'objet métier correspondant à l'utilisateur courant
//        $utilisateur = $daoPers->getOneByLoginEager($id);
        $utilisateur = $daoPers->getOneById($id);
//        var_dump($utilisateur);
        // mettre à jour l'objet métier d'après le formilaire de saisie
        $utilisateur->setCivilite($_POST["civilite"]);
        $utilisateur->setNom($_POST["nom"]);
        $utilisateur->setPrenom($_POST["prenom"]);
        $utilisateur->setNumTel($_POST["tel"]);
        $utilisateur->setMail($_POST["mail"]);
        if (MaSession::get('role') == 4) {
            $utilisateur->setEtudes($_POST["etudes"]);
            $utilisateur->setFormation($_POST["formation"]);
        }
        $ok = $daoPers->update($id, $utilisateur);
        if ($ok) {
            $this->vue->ecrireDonnee('message', "Modifications enregistr&eacute;es");
        } else {
            $this->vue->ecrireDonnee('message', "Echec des modifications");
        }
        $this->vue->afficher();
    }

}
