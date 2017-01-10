<!-- VARIABLES NECESSAIRES -->
<!-- Constantes globales  de includes/version.inc.php -->
<!-- loginAuthentification : login si authentification ok -->
<div id="gauche">
    <ul class="menugauche">
        <p><h2>Menu</h2></p><p class="note">
        <li><a href="./index.php" >Accueil</a></li>
        <hr/>
        <?php
        if (!is_null($this->lireDonnee('loginAuthentification'))) {
            echo "<h2>Utilisateur : <i>" . $this->lireDonnee('loginAuthentification') . "</i></h2>";
            //menu de gauche présent pour tous les utilisateurs
            echo "<li><a href=\".?controleur=utilisateur&action=coordonnees\">-Mes informations</a></li>";
            echo "<li><a href=\".?controleur=utilisateur&action=afficherCommandes\">-Afficher mes commandes</a></li>";
            echo "<hr>";
            echo "<li><a href=\".?controleur=utilisateur&action=produits\">-Nos Produits</a></li>";
            echo "<li><a href=\".?controleur=utilisateur&action=formules\">-Nos Formules</a></li>";
            echo "<li><a href=\".?controleur=utilisateur&action=commander1\">-Passer une commande</a></li>";
        } else {
            echo "<li><a href=\".?controleur=connexion&action=seConnecter\">Se connecter</a></li>";
        }
        if (!is_null($this->lireDonnee('loginAuthentification')) && MaSession::get('role') == 1) {
            //ajout menu de gauche pour l'administrateur
            echo "<hr>";
            //echo "<li><a href=\".?controleur=administrateur&action=creerUtilisateur&role=MaitreStage\">-Ajouter un ma&icirc;tre de stage</a></li>";
        }
        if (!is_null($this->lireDonnee('loginAuthentification')) && ((MaSession::get('role') == 1 || MaSession::get('role') == 3))) {
            //ajout menu de gauche pour les boulangers
            echo "<hr>";
            echo "<li><a href=\".?controleur=AdminPersonnes&action=ajouterProduit\">-Ajouter un produit</a></li>";
            echo "<li><a href=\".?controleur=utilisateur&action=commandesEnCours\">-Commandes en cours</a></li>";
        }
        ?>
    </ul>
</div>