
<form method="post" action="centreCommander.inc.php">
    <h1>Passer une commande</h1>
    <fieldset>
        <legend>Menus</legend>
        <p>
            Choisissez votre type de menu :
            <br/>
            <h3>Formules Chaudes</h3>
            <hr><div>- Panini:</div>
            <br/>
            <input style="float: none ;" type="radio" name="menus" value="menu1" id="menu1" checked="checked"/> <label style="float: none ;" for="menu1">Panini et Dessert : 5,50 €</label>
            <br/>
            <input style="float: none ; "type="radio" name="menus" value="menu2" id="menu2" /> <label style="float: none ;" for="menu2">Panini, Dessert et Boisson : 7 €</label>
            <br/>
            <hr><div>- Américain:</div>
            <br/>
            <input style="float: none ;" type="radio" name="menus" value="menu3" id="menu3" /> <label style="float: none ;" for="menu3">Américain et Boisson : 6,10 €</label>
            <br/>
            <input style="float: none ;" type="radio" name="menus" value="menu4" id="menu4" /> <label style="float: none ;" for="menu4">Américain, Boisson et Dessert : 8€</label>
            <br/>
            <h3>Formules Froides</h3>
            <hr><div>- Sandwich:</div>
            <br/>
            <input style="float: none ;" type="radio" name="menus" value="menu5" id="menu5"/> <label style="float: none ;" for="menu5">Sandwich et Dessert : 5,30 €</label>
            <br/>
            <input style="float: none ; "type="radio" name="menus" value="menu6" id="menu6" /> <label style="float: none ;" for="menu6">Sandwich, Dessert et Boisson : 6,40 €</label>
            <br/>
            <hr><div>- Club Sandwich:</div>
            <br/>
            <input style="float: none ;" type="radio" name="menus" value="menu7" id="menu7" /> <label style="float: none ;" for="menu7">Club Sandwich et Boisson : 4 €</label>
            <br/>
        </p>
        <p style="text-align: center;"><input style="float: none ;" type="submit" value="Valider"/></p>
    </fieldset>
</form>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>