
<form>
    <h1 style="color : red;">Passer une commande</h1>
    <fieldset>
        <legend>Finalisation</legend>
        <br/>
        <p style="text-align: center;">
        Commande Enregistrée avec Succès !
        </p>
        <br/>
        <p style="text-align: center;"><input style="float: none ; margin-bottom: 0;" type="submit" value="OK" onclick=gotoUrl('./index.php') </p>
    </fieldset>
</form>


<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>