<!-- cette page s'affiche lors de la réussite de la création d'une personne-->

<!--récupération des données de l'utilisateur créé-->
<?php
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
if ($idSpecialite != null) {
    $specialite = new M_Specialite(null, null, null);
    $daoSpecialite = new M_DaoSpecialite();
    $daoSpecialite->connecter();
    $pdo = $daoSpecialite->getPdo();
    $specialite = $daoSpecialite->selectOne($idSpecialite);
//* récupération de toutes les données en rapport avec l'ID de la spécialité choisie dans la page de création d'une personne
}
$numClasse = $_POST['classe'];
$anneeScol = $_POST['anneeScol'];
//FIN DU CAS OÙ LA PERSONNE EST ÉTUDIANTE
//DEBUT DU CAS OÙ LA PERSONNE EST MAITRE DE STAGE
$idOrganisation = $_POST['organisation'];
if ($idOrganisation != null) {
    $organisation = new M_Organisation(null, null, null, null, null, null, null, null, null);
    $daoOrganisation = new M_DaoOrganisation();
    $daoOrganisation->connecter();
    $pdo = $daoOrganisation->getPdo();
    $organisation = $daoOrganisation->selectOne($idOrganisation);
//* récupération de toutes les données en rapport avec l'ID de l'a spécialité'organisation choisie dans la page de création d'une personne
}
$fonction = $_POST['fonction'];
//FIN DU CAS OÙ LA PERSONNE EST MAITRE DE STAGE

$login = $_POST['login'];
?>

<h1 style="color : red;">La personne a bien été créée</h1>

<h2>Récapitulatif de ses informations personnelles</h2>

<fieldset>
    <legend>Type de compte</legend>
    <label for="role">Rôle :</label>
    <input type="text" readonly="readonly" name="role" id="role" value="<?php echo $role->getLibelle() ?>"></input><br/>
</fieldset>


<fieldset>
    <legend>Ses informations</legend>
    <label for="civilite">Civilité :</label>
    <input type="text" readonly="readonly" name="civilite" id="civilite" value="<?php echo $civilite ?>"></input><br/>
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" readonly="readonly" value="<?php echo $nom ?>"></input><br/>
    <label for="prenom">Prénom :</label>
    <input type="prenom" name="prenom" id="mdp" readonly="readonly" value="<?php echo $prenom ?>"></input><br/>
    <label for="mail">E-Mail :</label>
    <input type="text" name="mail" id="mail" readonly="readonly" value="<?php echo $mail ?>"></input><br/>
    <label for="tel">Tel :</label>
    <input type="text" name="tel" id="tel" readonly="readonly" value="<?php echo $numTel ?>"></input><br/>
    <label for="tel">Tel portable:</label>
    <input type="text" name="telP" id="telP" readonly="readonly" value="<?php echo $mobile ?>"></input><br/>
</fieldset>

<?php if ($idRole == "4") { ?>
    <fieldset>
        <legend>Informations spécifiques à l'étudiant</legend>
        <label for="etudes">Etudes :</label>
        <input type="text" readonly="readonly" name="etudes" id="etudes" value="<?php echo $etudes ?>"></input><br/>
        <label for="formation">Formation :</label>
        <input type="text" readonly="readonly" name="formation" id="formation" value="<?php echo $formation ?>"></input><br/>
        <label for="option">Specialité :</label>
        <input type="text" readonly="readonly" name="specialite" id="specialite" value="<?php echo $specialite->getLibellecCourt() ?>"></input><br/>
        <label for="classe">Classe :</label>
        <input type="text" readonly="readonly" name="classe" id="classe" value="<?php echo $numClasse ?>"></input><br/>
        <label for="anneeScol">Année Scolaire :</label>
        <input type="text" readonly="readonly" name="anneeScol" id="anneeScol" value="<?php echo $anneeScol ?>"></input><br/>
    </fieldset>
<?php } else if ($idRole == "5") { ?>
    <fieldset>
        <legend>Informations spécifiques du professionnel :</legend>
        <label for="organisation">Organisation :</label>
        <input type="text" readonly="readonly" name="organisation" id="organisation" value="<?php echo $organisation->getNom() ?>"></input><br/>
        <label for="fonction">Fonction :</label>
        <input type="text" readonly="readonly" name="fonction" id="fonction" value="<?php echo $fonction ?>"></input><br/>
    </fieldset>
<?php } ?>

<fieldset>
    <legend>Identifiant de connexion</legend>
    <label for="login">Login :</label>
    <input type="text" readonly="readonly" name="login" id="login" value="<?php echo $login ?>"></input><br/>
</fieldset>

<br/>

<input type="button" value="Retour à la page de création d'un utlisateur" onclick="gotoUrl('.?controleur=AdminPersonnes&action=creerPersonne')">
<br/>