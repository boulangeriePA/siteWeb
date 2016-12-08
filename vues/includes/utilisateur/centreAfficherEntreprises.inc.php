

<table border="1px" > 
    <tr >
        <th>Nom</th>
        <th>Ville</th>
        <th>Adresse</th>
        <th>Code Postal</th>
        <th>Téléphone</th>
        <th>Fax</th>
        <th>Forme Juridique</th>
        <th>Activité</th>
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
        echo'<td>' . $organisation->getActivite() . '</td>';
        echo'</tr>';
    }
    ?>
</table>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>