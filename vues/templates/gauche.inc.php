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
            if (MaSession::get('role') == 2) {
                echo "<h2>Client : <i>" . $this->lireDonnee('loginAuthentification') . "</i></h2>";
            } else if (MaSession::get('role') == 1) {
                echo "<h2>Administrateur : <i>" . $this->lireDonnee('loginAuthentification') . "</i></h2>";
            } else if (MaSession::get('role') == 3) {
                echo "<h2>Boulanger : <i>" . $this->lireDonnee('loginAuthentification') . "</i></h2>";
            }
        }
        if (!is_null($this->lireDonnee('loginAuthentification'))) {
            //menu de gauche présent pour tous les utilisateurs

            echo "<li><a href=\".?controleur=utilisateur&action=coordonnees\">Mes Informations</a></li><br>";
            //VOIR / MODIFIER SES INFORMATIONS
            if (MaSession::get('role') == 1 || MaSession::get('role') == 2) {
                echo "<li><a href=\".?controleur=utilisateur&action=afficherCommandes\">Mes Commandes</a></li><br>";
                //VOIR / MODIFIER SES COMMANDES
            }
            echo "<hr>";
            echo "<li><a href=\".?controleur=utilisateur&action=formules\">Nos Formules</a></li><br>";
            //VOIR LES INFORMATIONS
            echo "<li><a href=\".?controleur=utilisateur&action=produits\">Nos Produits</a></li><br>";
            //VOIR LES INFORMATIONS
            if (MaSession::get('role') == 1 || MaSession::get('role') == 2) {
                echo "<li><a href=\".?controleur=utilisateur&action=commander1\">Commander</a></li>";
                //PASSER UNE COMMANDE
            }
        } else {
            echo "<li><a href=\".?controleur=utilisateur&action=inscription\">S'inscrire</a></li><br>";
            echo "<li><a href=\".?controleur=connexion&action=seConnecter\">Se connecter</a></li>";
        }
        if (!is_null($this->lireDonnee('loginAuthentification')) && ((MaSession::get('role') == 1 || MaSession::get('role') == 3))) {
            //ajout menu de gauche pour les boulangers
            echo "<hr>";
            echo "<li><a href=\".?controleur=boulanger&action=gererFormules\">Gérer les formules</a></li><br>";
            //AJOUTER / MODIFIER / SUPPRIMER UN FORMULE
            echo "<li><a href=\".?controleur=boulanger&action=gererProduits\">Gérer les produits</a></li><br>";
            //AJOUTER / MODIFIER / SUPPRIMER UNE PRODUIT
            echo "<li><a href=\".?controleur=boulanger&action=gererCommandes\">Gérer les commandes</a></li><br>";
            //AJOUTER / MODIFIER / SUPPRIMER UNE COMMANDE
        }if (!is_null($this->lireDonnee('loginAuthentification')) && MaSession::get('role') == 1) {
            //ajout menu de gauche pour l'administrateur
            //echo "<hr>";
            //echo "<li><a href=\".?controleur=adminpersonnes&action=gererUser\">Gérer les utilisateurs</a></li><br>";
            //AJOUTER / MODIFIER / SUPPRIMER UNE PERSONNE
        //
        }
        ?>
    </ul>
</div>
