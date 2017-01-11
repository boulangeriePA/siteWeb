<!-- VARIABLES NECESSAIRES -->
<!-- $this->message : à afficher sous le formulaire -->
<?php
// on récupère un objet métier de type Personne
$unUtilisateur = $this->lireDonnee('utilisateur');
?>
<form method="post" action=".?controleur=utilisateur&action=modifierCoordonnees">
    <h1>Informations personnelles</h1>
    <fieldset>
        <legend>Mes informations</legend>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" readonly="readonly" value="<?php echo $unUtilisateur->getNomUser(); ?>"></input><br/>
        <label for="prenom">Prénom :</label>
        <input type="prenom" name="prenom" id="prenom" readonly="readonly" value="<?php echo $unUtilisateur->getPrenomUser(); ?>"></input><br/>
        <label for="mail">E-Mail :</label>
        <input type="text" name="mail" id="mail" readonly="readonly" value="<?php echo $unUtilisateur->getEmail(); ?>"></input><br/>
        <label for="tel">Tel :</label>
        <input type="text" name="tel" id="tel" readonly="readonly" value="<?php echo $unUtilisateur->getTel(); ?>"></input><br/>

        <label for="login">Login :</label>
        <input type="text" name="login" id="login" readonly="readonly" value="<?php echo $unUtilisateur->getLogin(); ?>"></input><br/>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" readonly="readonly" value="password"></input><br/>

        <p style="text-align: center;">
            <input style="float: none ; margin: 0;" type="submit" value="Modifier mes informations" />
        </p>
    </fieldset>

</form>
<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>