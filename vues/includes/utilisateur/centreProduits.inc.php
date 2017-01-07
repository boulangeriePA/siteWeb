<h1>Produits</h1>

<ul id="menu">
    <li class="onglet_1"><input type="button" id="boutonSandwich" value="Sandwichs"></li>
    <li class="onglet_3"><input type="button" id="boutonDessert" value="Desserts"></li>
    <li class="onglet_2"><input type="button" id="boutonBoisson" value="Boissons"></li>    
</ul> 

<div id="divSandwich" style="display: block">sandwich !</div>

<div id="divDessert" style="display: none">dessert !</div>

<div id="divBoisson" style="display: none">boisson !</div>

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

<table border="1px">
    <?php
    /*
      foreach ($this->lireDonnee('lesProduits') as $unProduit) {
      echo'<tr>';
      echo'<td>' . $unProduit->getIdProduit() . '</td>';
      echo'<td>' . $unProduit->getNomProduit() . '</td>';
      echo'</tr>';
      }
     */
    ?>
</table>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>