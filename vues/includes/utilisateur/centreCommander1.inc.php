
<script type="text/javascript">
    
    function validerChoixSandwichs(name) {
        numeroBouton = document.getElementByName(name);
        for (i = 0; i < bouton.length; i++) {
            if (numeroBouton[i].checked) {
                return true;
            }
        }
        return false;
    }

    funtion valeur(){
        var ok = 1;
        if (validerChoixSandichs('menus')) {
            document.getElementById('erreur').style.display = "none";
        } else {
            document.getElementById('erreur').style.display = "inline";
            ok = 0;
            return false;
        }
        if (ok == 1) {
            document.submit();
        }
    }
    
</script>

<form method="post" action=".?controleur=utilisateur&action=commander2">
    <h1 style="color : red;">Passer une commande</h1>
    <fieldset>
        <legend>Menus</legend>
        <p>
            Choisissez votre type de menu :
            <br/><br/>
            <?php
            foreach ($this->lireDonnee('lesFormules') as $uneFormule) {
                echo '<input style="float: none ;" type="radio" name="menus" value="menu'
                . $uneFormule->getIdMenu() . '" id="menu' . $uneFormule->getIdMenu()
                . '"/> <label style="float: none ;" for="menu' . $uneFormule->getIdMenu()
                . '">' . $uneFormule->getNomMenu() . ' : ' . $uneFormule->getPrixMenu()
                . ' €</label>';
                echo '<br/>';
            }
            ?>
        </p>
        <div id="erreur" style="text-align: center; color: red; display: none;"> Veuillez choisir un menu !</div>
        <p style="text-align: center;"><input style="float: none ; margin-bottom: 0;" type="submit" value="Valider"/></p>
    </fieldset>
</form>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>