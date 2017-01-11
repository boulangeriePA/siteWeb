
<h1 style="color : red;">Formules du Midi</h1>

<?php
foreach ($this->lireDonnee('lesFormules') as $uneFormule) {
    echo'<div style="font-size:17px;">'. '- '.$uneFormule->getNomMenu() . ' : ' . $uneFormule->getPrixMenu() . ' €<div>';
    echo'<br/>';
}
?>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>