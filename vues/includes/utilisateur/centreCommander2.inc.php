
<form method="post" action=".?controleur=utilisateur&action=commander2">
    <h1 style="color : red;">Passer une commande</h1>
    <fieldset>
        <?php
            echo '<legend>' . $_POST['menus'] . '</legend>';
            echo 'Vous avez choisi le ' . $_POST['menus'] . ' :';
        ?>
        <p style="text-align: center;"><input style="float: none ; margin-bottom: 0;" type="submit" value="Valider"/></p>
    </fieldset>
</form>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>


<!-- isset($_POST['menus']) -->
<!-- $_POST['menus'] -->