
<h1>Commandes Effectuées</h1>
<table border="2px" > 
    <tr >
        <th>N° de Commande</th>
        <th>Produits</th>
        <th>Nom</th>
        <th>Date</th>
        <th>Heure de commande</th>
        <th>Heure de Retrait</th>
        <th>Mode de Retrait</th>
    </tr>
    <?php
    foreach ($this->lireDonnee('lesOrganisations') as $organisation) {
        echo'<tr>';
        echo'<td>' . $organisation->getNom() . '</td>';
        echo'<td>' . $organisation->getVille() . '</td>';
        echo'<td>' . $organisation->getAdresse() . '</td>';
        echo'<td>' . $organisation->getCp() . '</td>';
        echo'<td>' . $organisation->getTel() . '</td>';
        echo'<td>' . $organisation->getFax() . '</td>';
        echo'<td>' . $organisation->getFormeJuridique() . '</td>';
        echo'</tr>';
    }
    ?>
</table>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>