<h1>Produits</h1>

<ul id="menu">
    <li class="onglet_1"><input type="button" id="boutonSandwich" value="Sandwichs"></li>
    <li class="onglet_3"><input type="button" id="boutonDessert" value="Desserts"></li>
    <li class="onglet_2"><input type="button" id="boutonBoisson" value="Boissons"></li>    
</ul> 

<div id="divSandwich" style="display: block">Nos Sandwich !
    <table border="1px">
        <tr>
            <th>Sandwich</th>
            <th>température pain</th>
        </tr>
        <?php
        foreach ($this->lireDonnee('lesSandwichs') as $unSandwich) {
            echo'<tr>';
            echo'<td>' . $unSandwich->getNomProduit() . '</td>';
            if($unSandwich->getTemperaturePain()==0){
                echo'<td>froid</td>';
            }  elseif ($unSandwich->getTemperaturePain()==1) {
                echo'<td>chaud</td>';
            }
            echo'</tr>';
        }
        ?>
    </table>
</div>

<div id="divDessert" style="display: none">Nos Desserts !
    <table border="1px">
        <tr>
            <th>Dessert</th>
        </tr>
        <?php
        foreach ($this->lireDonnee('lesDesserts') as $unDessert) {
            echo'<tr>';
            echo'<td>' . $unDessert->getNomProduit() . '</td>';
            echo'</tr>';
        }
        ?>
    </table>
</div>

<div id="divBoisson" style="display: none">Nos Boissons !
    <table border="1px">
        <tr>
            <th>Boisson</th>
            <th>Volume</th>
        </tr>
        <?php
        foreach ($this->lireDonnee('lesBoissons') as $uneBoisson) {
            echo'<tr>';
            echo'<td>' . $uneBoisson->getNomProduit() . '</td>';
            echo'<td>' . $uneBoisson->getVolume() . ' cl</td>';
            echo'</tr>';
        }
        ?>
    </table>
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