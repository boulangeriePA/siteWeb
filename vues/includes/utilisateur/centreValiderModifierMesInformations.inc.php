        <h1><?php echo $this->lireDonnee('message'); ?></h1>
        <input type="button" value="Retour" onclick="gotoUrl('.?controleur=utilisateur&action=coordonnees')">
<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>