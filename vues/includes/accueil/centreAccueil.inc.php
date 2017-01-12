<!-- VARIABLES NECESSAIRES -->
<!-- $this->message : à afficher sous le formulaire -->
<h1>Bienvenue sur le site de notre boulangerie.</h1>
<img src="../vues/images/panierApain.png" height="350px" width="550px" style=""/>
<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>