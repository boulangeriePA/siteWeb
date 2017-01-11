<h1>Produits</h1>

<ul id="menu">
<li class="onglet_1"><a id="boutonSandwich">Sandwichs</a></li>
<li class="onglet_2"><a id="boutonBoisson">Boissons</a></li>
<li class="onglet_3"><a id="boutonDessert">Desserts</a></li>
</ul>
 
<div id="divSandwich" style="display: block">
    <h1>Nos Sandwichs !<h1/>    
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
    <img src="../vues/images/americain.jpg" height="240px" width="360px" style=" float: right"/>
</div>

<div id="divDessert" style="display: none">
    <h1>Nos Desserts !</h1>    
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
    <img src="../vues/images/desserts.jpg" height="320px" width="480px" style=" float: right"/>
</div>

<div id="divBoisson" style="display: none">
    <h1>Nos Boissons !</h1>    
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
    <img src="../vues/images/boissons.jpg" height="170px" width="500px" style=" float: right"/>
</div>

<script>
    document.querySelector("#boutonSandwich").onclick = function() {
        document.querySelector("#divSandwich").style.display = "block";
        document.querySelector("#divDessert").style.display = "none";
        document.querySelector("#divBoisson").style.display = "none";
    }
    document.querySelector("#boutonDessert").onclick = function() {
        document.querySelector("#divSandwich").style.display = "none";
        document.querySelector("#divDessert").style.display = "block";
        document.querySelector("#divBoisson").style.display = "none";
    }
    document.querySelector("#boutonBoisson").onclick = function() {
        document.querySelector("#divSandwich").style.display = "none";
        document.querySelector("#divDessert").style.display = "none";
        document.querySelector("#divBoisson").style.display = "block";
    }
</script>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>
