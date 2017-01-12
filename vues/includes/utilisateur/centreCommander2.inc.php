
<script type="text/javascript">
function Boissons() {

        if (document.getElementById('boisson').checked) {
            document.getElementById('afficheBoissons').style.visibility="visible";
        }
        else {
            document.getElementById('afficheBoissons').style.visibility="hidden";
        }
}

function Desserts() {

        if (document.getElementById('dessert').checked) {
            document.getElementById('afficheDesserts').style.visibility="visible";
        }
        else {
            document.getElementById('afficheDesserts').style.visibility="hidden";
        }
}
</script>

<form method="post" action=".?controleur=utilisateur&action=commander2">
    <h1 style="color : red;">Passer une commande</h1>
    <fieldset>
        <?php
            echo '<legend>' . $_POST['menus'] . '</legend>';
            echo 'Vous avez choisi le ' . $_POST['menus'] . ' : ';
            foreach ($this->lireDonnee('lesFormules') as $uneFormule) {
                if ( 'menu' . $uneFormule->getIdMenu() == $_POST['menus']) {
                    break;
                }
            }
            echo $uneFormule->getNomMenu();
            echo '<br/><br/>';
            echo '<hr><br/>';
            echo 'Choisissez votre plat :<br/><br/>';
            
            $plat = "";
            $pain = $uneFormule->getNomMenu();
            
            if (strpos($uneFormule->getNomMenu(), "Panini")!==false) {
                $plat = "Panini";
            }
            if (strpos($uneFormule->getNomMenu(), "Sandwich")!==false) {
                $plat = "Sandwich";
            }
            if (strpos($uneFormule->getNomMenu(), "Américain")!==false) {
                $plat = "Américain";
            }
            
            if ($plat == "Panini") {
                echo '<input style="float: none ;" type="radio" name="plats"' . ' value="plat1" id="plat1"/> <label style="float: none ;"' . ' for="plat1">' . $plat . ' Poulet </label>';
                echo '<br/>';
                echo '<input style="float: none ;" type="radio" name="plats"' . ' value="plat2" id="plat2"/> <label style="float: none ;"' . ' for="plat2">' . $plat . ' Riot </label>';
                echo '<br/>';
                echo '<input style="float: none ;" type="radio" name="plats"' . ' value="plat3" id="plat3"/> <label style="float: none ;"' . ' for="plat3">' . $plat . ' Porc </label>';
            }
            
            if ($plat == "Sandwich") {
                echo '<input style="float: none ;" type="radio" name="plats"' . ' value="plat1" id="plat1"/> <label style="float: none ;"' . ' for="plat1">' . $plat . ' Poulet </label>';
                echo '<br/>';
                echo '<input style="float: none ;" type="radio" name="plats"' . ' value="plat2" id="plat2"/> <label style="float: none ;"' . ' for="plat2">' . $plat . ' Porc </label>';
            }
            
            if ($plat == "Américain") {
                echo '<input style="float: none ;" type="radio" name="plats"' . ' value="plat1" id="plat1"/> <label style="float: none ;"' . ' for="plat1">' . $plat . ' Steak </label>';
                echo '<br/>';
                echo '<input style="float: none ;" type="radio" name="plats"' . ' value="plat2" id="plat2"/> <label style="float: none ;"' . ' for="plat2">' . $plat . ' Poulet </label>';
            }
            
            echo '<br/><hr><br/>';
            
            //Menu avec : Boisson ou Dessert
            if (strpos($uneFormule->getNomMenu(), "ou")!==false) {
                echo 'Choisissez votre accompagnement :<br/><br/>';
                echo '<input style="float: none ; margin-bottom: 0;" type="radio" onclick="Boissons()" name="boud"' . ' value="boisson" id="boisson"/> <label style="float: none ;" for="boisson">Boissons </label>';
                
                echo '<p id="afficheBoissons" style="visibility: hidden; margin: 0;">';
                foreach ($this->lireDonnee('lesBoissons') as $uneBoisson) {
                    echo '<input style="float: none ; margin-bottom: 0;" type="radio" name="boissons" value="boisson' . $uneBoisson->getIdProduit() . '" id="boisson' . $uneBoisson->getIdProduit()
                    . '"/> <label style="float: none ;" for="boisson' . $uneBoisson->getIdProduit() . '">' . $uneBoisson->getNomProduit() . '</label>';
                }
                echo '</p>';
                
                echo '<input style="float: none ;" type="radio" onclick="Desserts()" name="boud"' . ' value="dessert" id="dessert"/> <label style="float: none ;" for="dessert">Desserts </label>';
                echo '<br/>';
            }
            //Menu avec : Boisson + Dessert
            if (strpos($uneFormule->getNomMenu(), "ou")==false) {
                echo 'Choisissez vos accompagnements :<br/><br/>';
                echo '<input style="float: none ; margin-bottom: 0;" type="checkbox" onclick="Boissons()" name="betd1"' . ' value="boisson" id="boisson"/> <label style="float: none ;" for="boisson">Boissons </label>';
                
                echo '<p id="afficheBoissons" style="visibility: hidden; margin: 0;">'; 
                foreach ($this->lireDonnee('lesBoissons') as $uneBoisson) {
                    echo '<input style="float: none ; margin-bottom: 0;" type="radio" name="boissons" value="boisson' . $uneBoisson->getIdProduit() . '" id="boisson' . $uneBoisson->getIdProduit()
                    . '"/> <label style="float: none ;" for="boisson' . $uneBoisson->getIdProduit() . '">' . $uneBoisson->getNomProduit() . '</label>';
                }
                echo '</p>';
                
                echo '<input style="float: none ;" type="checkbox" onclick="Desserts()" name="betd2"' . ' value="dessert" id="dessert"/> <label style="float: none ;" for="dessert">Desserts </label>';
                echo '<br/>';
            }
        ?>
        <p style="text-align: center;"><input style="float: none ; margin-bottom: 0;" type="submit" value="Valider"/></p>
    </fieldset>
</form>

<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>" . $this->lireDonnee('message') . "</strong>";
}
?>