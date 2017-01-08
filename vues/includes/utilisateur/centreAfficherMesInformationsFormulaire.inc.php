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
        <input type="password" size="6" name="password" id="password" readonly="readonly" value="password"></input><br/>
        <!--
        <?php
        //contenu à afficher en fonction de l'utilisateur
        //if (MaSession::get('role') == 4){
        //contenu si c'est un étudiant 
        ?>
                <label for="etudes">Etudes :</label>
                <input type="text" name="etudes" id="etudes" readonly="readonly" value="<?php //echo $unUtilisateur->getEtudes();  ?>"></input><br/>
                <label for="formation">Formation :</label>
                <input type="text" name="formation" id="formation" readonly="readonly" value="<?php //echo $unUtilisateur->getFormation();  ?>"></input><br/>       
        <?php
        // }
        ?>
        -->
        <input type="submit" value="Modifier mes informations" />
    </fieldset>

</form>
<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>