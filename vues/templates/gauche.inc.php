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
            echo "<li><a href=\".?controleur=utilisateur&action=afficherCommandes\">-Afficher mes commandes</a></li>";
            echo "<li><a href=\".?controleur=utilisateur&action=coordonnees\">-Mes informations</a></li>";
            echo "<hr>";
            echo "<li><a href=\".?controleur=utilisateur&action=commander\">-Passer une commande</a></li>";
            echo "<li><a href=\".?controleur=utilisateur&action=produits\">-Nos Produits</a></li>";
            echo "<li><a href=\".?controleur=utilisateur&action=formules\">-Nos Formules</a></li>";
        } else {
            echo "<li><a href=\".?controleur=connexion&action=seConnecter\">Se connecter</a></li>";
        }
        if (!is_null($this->lireDonnee('loginAuthentification')) && MaSession::get('role') == 1) {
            //ajout menu de gauche pour l'administrateur
            echo "<hr>";
            //echo "<li><a href=\".?controleur=AdminPersonnes&action=creerPersonne\">-Cr&eacute;er une personne</a></li>";
            echo "<li><a href=\".?controleur=AdminPersonnes&action=ajouterProduit\">-Ajouter un produit</a></li>";
            //echo "<li><a href=\".?controleur=administrateur&action=creerClasse\">-Cr&eacute;er une classe</a></li>";
            //echo "<li><a href=\".?controleur=administrateur&action=creerUtilisateur&role=MaitreStage\">-Ajouter un ma&icirc;tre de stage</a></li>";
        }
        if (!is_null($this->lireDonnee('loginAuthentification')) && ((MaSession::get('role') == 1 || MaSession::get('role') == 2))) {
            //ajout menu de gauche pour les boulangers
            echo "<hr>";
            //echo "<li><a href=\".?controleur=utilisateur&action=creerEntreprise\">-Ajouter une entreprise</a></li>";
            //echo "<li><a href=\".?controleur=utilisateur&action=MajEntreprise\">-M.A.J entreprise</a></li>";
            //echo "<hr>";
            //echo "<li><a href=\".?controleur=utilisateur&action=ajoutStage\">-Ajouter un stage</a></li>";
            echo "<li><a href=\".?controleur=utilisateur&action=commandesEnCours\">-Commandes en cours</a></li>";
        }
        ?>
    </ul>
</div>