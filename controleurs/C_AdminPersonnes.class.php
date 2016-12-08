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

        $role = new M_Role(null, null, null);

        $daoRole = new M_DaoRole();
        $daoRole->connecter();
        $pdo = $daoRole->getPdo();
        $role = $daoRole->selectOne($idRole);
        //* récupération de toutes les données en rapport avec l'ID du rôle choisi dans la page de création d'une personne

        $civilite = $_POST['civilite'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $numTel = $_POST['tel'];
        $mobile = $_POST['telP'];

        //DEBUT DU CAS OÙ LA PERSONNE EST ÉTUDIANTE
        $etudes = $_POST['etudes'];
        $formation = $_POST['formation'];

        $idSpecialite = $_POST['option'];
        $specialite = new M_Specialite(null, null, null);
        if ($idSpecialite != null) {
            $daoSpecialite = new M_DaoSpecialite();
            $daoSpecialite->connecter();
            $pdo = $daoSpecialite->getPdo();
            $specialite = $daoSpecialite->selectOne($idSpecialite);
            //récupération de toutes les données en rapport avec l'ID de la spécialité choisie dans la page de création d'une personne
        }

        $numClasse = $_POST['classe'];
        $anneeScol = $_POST['anneeScol'];
        //FIN DU CAS OÙ LA PERSONNE EST ÉTUDIANTE
        //DEBUT DU CAS OÙ LA PERSONNE EST MAITRE DE STAGE
        $idOrganisation = $_POST['organisation'];
        $fonction = $_POST['fonction'];
        //FIN DU CAS OÙ LA PERSONNE EST MAITRE DE STAGE

        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);

        $unePersonne = new M_Personne(null, $specialite, $role, $civilite, $nom, $prenom, $numTel, $mail, $mobile, $etudes, $formation, $login, $mdp);
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
        $daoPers->insert($unePersonne);

        if (($anneeScol != null && $numClasse != null) || ($idOrganisation != null && $fonction != null)) {
            //on rappelle la meme personne pour obtenir son id (qui est auto-incrémenté en base)
            $laMemePersonne = new M_Personne(null, null, null, null, null, null, null, null, null, null, null, null, null);
            $laMemePersonne = $daoPers->getOneByLogin($login);
            $idPersonne = $laMemePersonne->getId();

            if ($anneeScol != null && $numClasse != null) {
                $unePromotion = new M_Promotion($anneeScol, $idPersonne, $numClasse);
                $daoPromotion = new M_DaoPromotion();
                $daoPromotion->connecter();
                $pdo = $daoPromotion->getPdo();
                $daoPromotion->insert($unePromotion);
            }
            if ($idOrganisation != null && $fonction != null) {
                $unContactOrganisation = new M_Contact_Organisation($idOrganisation, $idPersonne, $fonction);
                $daoContactOrganisation = new M_DaoContact_Organisation();
                $daoContactOrganisation->connecter();
                $pdo = $daoContactOrganisation->getPdo();
                $daoContactOrganisation->insert($unContactOrganisation);
            }
        }

        if ($daoPers) {

            $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreValiderCreationPersonne.php");
        }

        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }

}
