<?php

/**
 * Description of C_AdminPersonnes
 * CRUD Personnes
 * @author btssio
 */
class C_AdminPersonnes extends C_ControleurGenerique {

    // Fonction d'affichage du formulaire de création d'une personne
    function creerPersonne() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Création d\'une personne');
        // ... depuis la BDD       
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();

        // Mémoriser la liste des rôles disponibles
        $daoRole = new M_DaoRole();
        $daoRole->setPdo($pdo);
        $this->vue->ecrireDonnee('lesRoles', $daoRole->getAll());

        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->ecrireDonnee('centre', "../vues/includes/adminPersonnes/centreCreerPersonne.inc.php");

        $this->vue->afficher();
    }

    function ajouterProduit() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Ajout d\'un Produit');
        // ... depuis la BDD       
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();

        // Mémoriser la liste des spécialités disponibles
        $daoSpecialite = new M_DaoSpecialite();
        $daoSpecialite->setPdo($pdo);
        $this->vue->ecrireDonnee('lesSpecialites', $daoSpecialite->getAll());

        // Mémoriser la liste des rôles disponibles
        $daoRole = new M_DaoRole();
        $daoRole->setPdo($pdo);
        $this->vue->ecrireDonnee('lesRoles', $daoRole->getAll());

        // Mémoriser la liste des classes disponibles
        $daoClasse = new M_DaoClasse();
        $daoClasse->setPdo($pdo);
        $this->vue->ecrireDonnee('lesClasses', $daoClasse->getAll());

        // Mémoriser la liste des années scolaires disponibles
        $daoAnneeScol = new M_DaoAnneeScol();
        $daoAnneeScol->setPdo($pdo);
        $this->vue->ecrireDonnee('lesAnneeScol', $daoAnneeScol->getAll());

        // Mémoriser la liste des organisations disponibles
        $daoOrganisation = new M_DaoOrganisation();
        $daoOrganisation->setPdo($pdo);
        $this->vue->ecrireDonnee('lesOrganisations', $daoOrganisation->getAll());

        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->ecrireDonnee('centre', "../vues/includes/adminPersonnes/centreCreerPersonne.inc.php");

        $this->vue->afficher();
    }
    
    //validation de création d'utilisateur 
    function validationcreerPersonne() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', "Validation de la création d'une personne");

        $idRole = $_POST['role'];

        $role = new M_Role(null, null);

        $daoRole = new M_DaoRole();
        $daoRole->connecter();
        $pdo = $daoRole->getPdo();
        $role = $daoRole->selectOne($idRole);
        //* récupération de toutes les données en rapport avec l'ID du rôle choisi dans la page de création d'une personne

        $nom = $_POST['nomUser'];
        $prenom = $_POST['prenomUser'];
        $mail = $_POST['email'];
        $tel = $_POST['tel'];
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);

        $unePersonne = new M_User(null, $nom, $prenom, $mail, $tel, $login, $mdp, $role);
        $daoPers = new M_DaoUser();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
        $daoPers->insert($unePersonne);

        if ($daoPers) {

            $this->vue->ecrireDonnee('centre', "../vues/includes/adminPersonnes/centreValiderCreationPersonne.php");
        }

        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }

}
