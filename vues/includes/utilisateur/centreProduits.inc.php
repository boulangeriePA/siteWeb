
<h1>Produits</h1>

 <ul id="menu">
  <li class="onglet_1"><a href="http://localhost/boulangeriePA/public/?controleur=utilisateur&action=produits">Sandwichs</a></li>
  <li class="onglet_2"><a href="http://localhost/boulangeriePA/public/?controleur=utilisateur&action=produits">Boissons</a></li>
  <li class="onglet_3"><a href="http://localhost/boulangeriePA/public/?controleur=utilisateur&action=produits">Desserts</a></li>
</ul> 

<table border="1px">
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