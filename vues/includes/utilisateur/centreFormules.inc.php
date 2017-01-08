<h1>Nos Formules</h1>
<table border="2px" > 
    <tr >
        <th>Formule</th>
        <th>Prix</th>
    </tr>
    <?php
    foreach ($this->lireDonnee('lesFormules') as $uneFormule) {
        echo'<tr>';
        echo'<td>' . $uneFormule->getNomMenu() . '</td>';
        echo'<td>' . $uneFormule->getPrixMenu() . ' €</td>';
        echo'</tr>';
    }
    ?>
</table>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>