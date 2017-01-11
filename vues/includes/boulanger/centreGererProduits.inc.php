<h1 style="color: red">Gérer les Produits</h1> 
<div id="divSandwich" style="display: inline-block; vertical-align: top;">
    <br>
    <table border="1px" style="display: inline-block; vertical-align: top;">
        <tr>
            <th>Sandwichs</th>
        </tr>
        <?php
        foreach ($this->lireDonnee('lesSandwichs') as $unSandwich) {
            echo'<tr>';
            echo'<td>- ' . $unSandwich->getNomProduit();
            if($unSandwich->getTemperaturePain()==0){
                echo' froid</td>';
            }  elseif ($unSandwich->getTemperaturePain()==1) {
                echo' chaud</td>';
            }
            echo'</tr>';
        }
        ?>
    </table>
    <table border="1px" style="display: inline-block; vertical-align: top;">
        <tr>
            <th>Ingrédients</th>
        </tr>
        <?php
        foreach ($this->lireDonnee('lesIngredients') as $unIngredient) {
            echo'<tr>';
            echo'<td>- ' . $unIngredient->getNomIngredient() . '</td>';
            echo'</tr>';
        }
        ?>
    </table>
</div>

<div id="divDessert" style="display: inline-block; vertical-align: top;">
    <br>
    <table border="1px" style="display: inline-block; vertical-align: top;">
        <tr>
            <th>Desserts</th>
        </tr>
        <?php
        foreach ($this->lireDonnee('lesDesserts') as $unDessert) {
            echo'<tr>';
            echo'<td>- ' . $unDessert->getNomProduit() . '</td>';
            echo'</tr>';
        }
        ?>
    </table>
</div>

<div id="divBoisson" style="display: inline-block; vertical-align: top;">
    <br>
    <table border="1px" style="display: inline-block; vertical-align: top;">
        <tr>
            <th>Boisson</th>
            <th>Volume</th>
        </tr>
        <?php
        foreach ($this->lireDonnee('lesBoissons') as $uneBoisson) {
            echo'<tr>';
            echo'<td>- ' . $uneBoisson->getNomProduit() . '</td>';
            echo'<td>' . $uneBoisson->getVolume() . ' cl</td>';
            echo'</tr>';
        }
        ?>
    </table>
</div>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>
