<script language="JavaScript" type="text/javascript" src="../vues/javascript/fonctionsJavascript.inc.js"></script>
<script language="JavaScript" type="text/javascript" src="../bibliotheques/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src=".../vues/javascript/ajax.inc.js"></script>

<!-- VARIABLES NECESSAIRES -->

<!-- $this->message : à afficher sous le formulaire -->
<form class="inscription" method="post" action=".?controleur=utilisateur&action=validationInscription" name="CreateUser">
    <h1>Inscription</h1>

    <!-- Données valables pour tous les rôles -->
    <fieldset>
        <legend>Mes informations générales</legend>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom"></input><br/>
        <label for="prenom">Prénom :</label>
        <input type="prenom" name="prenom" id="prenom"></input><br/>
        <label for="mail">E-Mail :</label>
        <input type="text" name="mail" id="mail"></input><br/>
        <label for="tel">Tel :</label>
        <input type="text" name="tel" id="tel"></input><br/>
    </fieldset>

    <!-- Donnée de connexion des utilisateur -->
    <fieldset>
        <legend>Mes identifiants de connexion</legend>
        <label for="login">Login :</label>
        <input type="text" name="login" id="login"></input><br/>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp"></input><br/>
        <label for="mdp2">Retaper le mot de passe :</label>  <!-- vérification de mots de passe -->
        <input type="password" name="mdp2" id="mdp2"></input><br/>
    </fieldset>

    <fieldset style="padding: 1%;">
        <p style="text-align: center; margin: 0;">
            <input style="float: none ; margin: 0;" type="submit" value="Créer" onclick="return validerInscription()"></input><!-- OnClick exécutera le JS qui testera tout les champ du formulaire. -->
            <input style="float: none ; margin: 0;" type="button" value="Retour" onclick="history.go(-1)">

    </fieldset>
</form>
<?php
// message de validation de création ou non 
if (isset($this->message)) {
    echo "<strong>" . $this->message . "</strong>";
}
?>