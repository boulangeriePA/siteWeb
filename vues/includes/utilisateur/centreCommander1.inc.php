
<form method="post" action=".?controleur=utilisateur&action=commander2">
    <h1 style="color : red;">Passer une commande</h1>
    <fieldset>
        <legend>Menus</legend>
        <p>
        Choisissez votre type de menu :
        <br/><br/>
        <?php
        foreach ($this->lireDonnee('lesFormules') as $uneFormule) {
            echo '<input style="float: none ;" type="radio" name="menus" value="menu'
            . $uneFormule->getidMenu() . '" id="menu' . $uneFormule->getidMenu()
            . '"/> <label style="float: none ;" for="menu' . $uneFormule->getidMenu()
            . '">' . $uneFormule->getNomMenu() . ' : ' . $uneFormule->getPrixMenu()
            . ' €</label>';
            echo '<br/>';
        }
        ?>
        </p>
        <p style="text-align: center;"><input style="float: none ; margin-bottom: 0;" type="submit" value="Valider"/></p>
    </fieldset>
</form>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>