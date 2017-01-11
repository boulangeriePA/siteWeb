
<h1 style="color : red;">Formules du Midi</h1>

<?php
echo'<h2>Nos Formules :</h2>';
foreach ($this->lireDonnee('lesFormules') as $uneFormule) {
    echo'<div>'. $uneFormule->getidMenu() . ') ' . $uneFormule->getNomMenu() . ' : ' . $uneFormule->getPrixMenu() . ' €<div>';
    echo'<br/>';
}
?>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>