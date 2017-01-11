
<h1 style="color : red;">Commandes Effectuées</h1>
<table border="2px" > 
    <tr >
        <th>N° de Commande</th>
        <th>Date/heure commande</th>
        <th>heure retrait</th>
        <th>Type de retrait</th>
        <th>Produits</th>
    </tr>
    <?php
    foreach ($this->lireDonnee('lesCommandes') as $uneCommande) {
        echo'<tr>';
        echo'<td>' . $uneCommande->getIdCommande() . '</td>';
        echo'<td>' . $uneCommande->getDateHeure() . '</td>';
        echo'<td>' . $uneCommande->getHeureRetrait() . '</td>';
        echo'<td>' . $uneCommande->getTypeRetrait()->getNomTypeRetrait() . '</td>';
        echo'<td>';
        $daoProduit = new M_DaoProduit();
        $daoProduit->connecter();
        //récupération de la liste des commandes
        $produits = $daoProduit->getProduitsCommandeByIdCommande($uneCommande->getIdCommande());
        $this->ecrireDonnee('lesProduits', $produits);
        $daoProduit->deconnecter();
        foreach ($this->lireDonnee('lesProduits') as $unProduit) {
            echo $unProduit->getNomProduit().', ';
        }
        echo'</td>';
        echo'</tr>';
    }
    ?>
</table>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>