<ul id="menu">
    <li class="onglet_1"><a id="boutonCommandesEnCours">Commandes En Cours</a></li>
    <li class="onglet_2"><a id="boutonCommandesTerminees">Commandes Terminées</a></li>
</ul>

<div id="divCommandesEnCours" style="display: block">
    <br>
    <table border="2px" > 
        <tr >
            <th>N° de Commande</th>
            <th>Date/heure commande</th>
            <th>heure retrait</th>
            <th>Type de retrait</th>
            <th>Produits</th>
        </tr>
        <?php
        foreach ($this->lireDonnee('lesCommandesEnCours') as $uneCommandeEnCours) {
            echo'<tr>';
            echo'<td>' . $uneCommandeEnCours->getIdCommande() . '</td>';
            echo'<td>' . $uneCommandeEnCours->getDateHeure() . '</td>';
            echo'<td>' . $uneCommandeEnCours->getHeureRetrait() . '</td>';
            echo'<td>' . $uneCommandeEnCours->getTypeRetrait()->getNomTypeRetrait() . '</td>';
            echo'<td>';
            $daoProduit = new M_DaoProduit();
            $daoProduit->connecter();
            //récupération de la liste des produits
            $produits = $daoProduit->getProduitsCommandeByIdCommande($uneCommandeEnCours->getIdCommande());
            $this->ecrireDonnee('lesProduits', $produits);
            $daoProduit->deconnecter();
            foreach ($this->lireDonnee('lesProduits') as $unProduit) {
                echo $unProduit->getNomProduit();
                $daoIngredient = new M_DaoIngredient();
                $daoIngredient->connecter();
                //récupération de la liste des ingredients
                $ingredients = $daoIngredient->getIngredientByIdCommandeAndIdProduit($uneCommandeEnCours->getIdCommande(),$unProduit->getIdProduit());
                $this->ecrireDonnee('lesIngredients', $ingredients);
                $daoIngredient->deconnecter();
                if($this->lireDonnee('lesIngredients')!=null){
                    echo ' ( ';
                    foreach ($this->lireDonnee('lesIngredients') as $unIngredient) {                    
                        echo $unIngredient->getNomIngredient() . ', ';
                    }                    
                }
                $daoSauce = new M_DaoSauce();
                $daoSauce->connecter();
                //récupération de la liste des ingredients
                $sauces = $daoSauce->getSauceByIdCommandeAndIdProduit($uneCommandeEnCours->getIdCommande(),$unProduit->getIdProduit());
                $this->ecrireDonnee('lesSauces', $sauces);
                $daoSauce->deconnecter();
                if($this->lireDonnee('lesSauces')!=null){
                    foreach ($this->lireDonnee('lesSauces') as $uneSauce) {                    
                        echo $uneSauce->getNomSauce() . ' ';
                    }
                    echo ')';
                }
                echo ', ';
            }
            echo'</td>';
            echo'</tr>';
        }
        ?>
    </table>
</div>

<div id="divCommandesTerminees" style="display: none">
    <br>
    <table border="2px" > 
        <tr >
            <th>N° de Commande</th>
            <th>Date/heure commande</th>
            <th>heure retrait</th>
            <th>Type de retrait</th>
            <th>Produits</th>
        </tr>
        <?php
        foreach ($this->lireDonnee('lesCommandesTerminees') as $uneCommandeTerminee) {
            echo'<tr>';
            echo'<td>' . $uneCommandeTerminee->getIdCommande() . '</td>';
            echo'<td>' . $uneCommandeTerminee->getDateHeure() . '</td>';
            echo'<td>' . $uneCommandeTerminee->getHeureRetrait() . '</td>';
            echo'<td>' . $uneCommandeTerminee->getTypeRetrait()->getNomTypeRetrait() . '</td>';
            echo'<td>';
            $daoProduit = new M_DaoProduit();
            $daoProduit->connecter();
            //récupération de la liste des commandes
            $produits = $daoProduit->getProduitsCommandeByIdCommande($uneCommandeTerminee->getIdCommande());
            $this->ecrireDonnee('lesProduits', $produits);
            $daoProduit->deconnecter();
            foreach ($this->lireDonnee('lesProduits') as $unProduit) {
                echo $unProduit->getNomProduit() . ', ';
            }
            echo'</td>';
            echo'</tr>';
        }
        ?>
    </table>
</div>

<script>
    document.querySelector("#boutonCommandesEnCours").onclick = function() {
        document.querySelector("#divCommandesEnCours").style.display = "block";
        document.querySelector("#divCommandesTerminees").style.display = "none";
    }
    document.querySelector("#boutonCommandesTerminees").onclick = function() {
        document.querySelector("#divCommandesEnCours").style.display = "none";
        document.querySelector("#divCommandesTerminees").style.display = "block";
    }
</script>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>