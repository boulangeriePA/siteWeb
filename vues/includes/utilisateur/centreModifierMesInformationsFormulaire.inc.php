
<?php
// on récupère un objet métier de type Personne
$unUtilisateur = $this->lireDonnee('utilisateur');
?>

<form method="post" action=".?controleur=utilisateur&action=validerModifierCoordonnees&id=<?php echo $unUtilisateur->getIdUser(); ?>">
    <h1 style="color : red;">Modification des informations personnelles</h1>
    <fieldset>
        <legend>Mes informations</legend>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php echo $unUtilisateur->getNomUser(); ?>"></input><br/>
        <label for="prenom">Prénom :</label>
        <input type="prenom" name="prenom" value="<?php echo $unUtilisateur->getPrenomUser(); ?>"></input><br/>
        <label for="mail">E-Mail :</label>
        <input type="text" name="mail" id="mail" value="<?php echo $unUtilisateur->getEmail(); ?>"></input><br/>
        <label for="tel">Tel :</label>
        <input type="text" name="tel" id="tel" value="<?php echo $unUtilisateur->getTel(); ?>"></input><br/>
        <!--
        <label for="login">Login :</label>
        <input type="text" name="login" id="login" value="<?php //echo $unUtilisateur->getLogin(); ?>"></input><br/>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" value="<?php //echo $unUtilisateur->getMdp(); ?>"></input><br/>
        -->
        <input type="submit" value="Sauvegarder" /><!--validation modification-->
        <input type="button" value="Retour" onclick="history.back()"><!--allez à la page précédente-->

    </fieldset>

</form>
<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>