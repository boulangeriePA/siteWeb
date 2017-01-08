
<h1>Commandes Effectuées</h1>
<table border="2px" > 
    <tr >
        <th>N° de Commande</th>
        <th>ID User</th>
        <th>Date/heure commande</th>
        <th>heure retrait</th>
        <th>Type de retrait</th>
    </tr>
    <?php
    foreach ($this->lireDonnee('lesCommandes') as $uneCommande) {
        echo'<tr>';
        echo'<td>' . $uneCommande->getIdCommande() . '</td>';
        echo'<td>' . $organisation->getIdUser() . '</td>';
        echo'<td>' . $organisation->getDateHeure() . '</td>';
        echo'<td>' . $organisation->getHeureRetrait() . '</td>';        
        echo'<td>' . $organisation->getTypeRetrait() . '</td>';
        echo'</tr>';
    }
    ?>
</table>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>