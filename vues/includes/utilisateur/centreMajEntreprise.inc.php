<select OnChange="javascript:choixOrganisation();" name="organisation" id="organisation">
    <option value="">Sélectionnez une organisation</option>
    <?php
    // remplissage du "SELECT" qui contient les organisations
    foreach ($this->lireDonnee('lesOrganisations') as $organisation) {
        echo'<option value="' . $organisation->getId() . '">' . $organisation->getNom() . '</option>';
    }
    ?>
</select>

<div id="Info_Organisation" style="display:none" height="0">
    <?php
    // on récupère un objet métier de type Organisation
    $uneOrganisation = $this->lireDonnee('organisation');
    ?>
    <form method="post" action=".?controleur=utilisateur&action=validerMajEntreprise>">
        <h1>Modification des informations de l'entreprise</h1>
        <fieldset>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo $uneOrganisation->getNom(); ?>"></input><br/>
            <label for="ville">Ville :</label>
            <input type="text" name="ville" id="ville"  value="<?php echo $uneOrganisation->getVille(); ?>"></input><br/>
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse" value="<?php echo $uneOrganisation->getAdresse(); ?>"></input><br/>
            <label for="cp">Code Postal :</label>
            <input type="text" name="cp" id="cp" value="<?php echo $uneOrganisation->getCp(); ?>"></input><br/>
            <label for="tel">Tel :</label>
            <input type="text" name="tel" id="tel" value="<?php echo $uneOrganisation->getTel(); ?>"></input><br/>
            <label for="fax">Fax :</label>
            <input type="text" name="fax" id="fax" value="<?php echo $uneOrganisation->getFax(); ?>"></input><br/>
            <label for="formJur">Forme Juridique :</label>
            <input type="text" name="formJur" id="formJur" value="<?php echo $uneOrganisation->getFormeJuridique(); ?>"></input><br/>
            <label for="activite">Activité :</label>
            <input type="text" name="activite" id="activite" value="<?php echo $uneOrganisation->getActivite(); ?>"></input><br/>
            <br />
            <input type="submit" value="Sauvegarder" /><!--validation modification-->
            <input type="button" value="Retour" onclick="history.back()"><!--allez à la page précédente-->

        </fieldset>

    </form>
</div>
<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>


