<!-- cette page s'affiche lors de la réussite de la création d'une personne-->

<!--récupération des données de l'utilisateur créé-->

<?php

function test_input($data) {
    $trim = trim($data);
    $stripslashes = stripslashes($trim);
    $htmlentities = htmlentities($stripslashes);
    return $htmlentities;
}

$nom = test_input($_POST['nom']);
$prenom = test_input($_POST['prenom']);
$mail = test_input($_POST['mail']);
$numTel = test_input($_POST['tel']);
$login = test_input($_POST['login']);
?>

<h1>Inscription réussie</h1>

<h2>Récapitulatif de ses informations personnelles</h2>

<fieldset>
    <legend>Ses informations</legend>
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" readonly="readonly" value="<?php echo $nom ?>"></input><br/>
    <label for="prenom">Prénom :</label>
    <input type="prenom" name="prenom" id="mdp" readonly="readonly" value="<?php echo $prenom ?>"></input><br/>
    <label for="mail">E-Mail :</label>
    <input type="text" name="mail" id="mail" readonly="readonly" value="<?php echo $mail ?>"></input><br/>
    <label for="tel">Tel :</label>
    <input type="text" name="tel" id="tel" readonly="readonly" value="<?php echo $numTel ?>"></input><br/>
</fieldset>

<fieldset>
    <legend>Identifiant de connexion</legend>
    <label for="login">Login :</label>
    <input type="text" readonly="readonly" name="login" id="login" value="<?php echo $login ?>"></input><br/>
</fieldset>

<br/>

<input type="button" value="Retour à l'accueil" onclick="gotoUrl('./index.php')">
<br/>