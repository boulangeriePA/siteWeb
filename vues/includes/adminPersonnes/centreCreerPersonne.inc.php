<script language="JavaScript" type="text/javascript" src="../vues/javascript/fonctionsJavascript.inc.js"></script>
<script language="JavaScript" type="text/javascript" src="../bibliotheques/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src=".../vues/javascript/ajax.inc.js"></script>


<!-- VARIABLES NECESSAIRES -->

<!-- $this->message : à afficher sous le formulaire -->
<form method="post" action=".?controleur=AdminPersonnes&action=validationCreerPersonne" name="CreateUser">
    <h1 style="color : red;">Creation d'une personne</h1>
    <!-- Choix du type de compte pour afficher les différentes informations pour créer un compte spécifique -->
    <fieldset>
        <legend>Type de compte</legend>
        <input type="hidden" readonly="readonly" name="id" id="id"></input>
        <label for="role">Rôle :</label>
        <select OnChange="javascript:choixRole();"  name="role" id="role"><!-- le OnChange exécute la fonction qui affichera ou non le formulaire etudiant -->
            <option value="">Sélectionnez un type de compte</option>
            <?php
            // remplissage du "SELECT" qui contient les roles
            foreach ($this->lireDonnee('lesRoles') as $role) {
                echo'<option value="' . $role->getId() . '">' . $role->getLibelle() . '</option>';
            }
            ?>  
        </select>
    </fieldset>

    <!-- Données valables pour tous les rôles -->
    <fieldset>
        <legend>Ses informations générales</legend>
        <input type="hidden" readonly="readonly" name="id" id="id"></input>
        <label for="civilite">Civilité :</label>
        <select type="select" name="civilite" id="civilite">
            <option value="">Sélectionnez une civilté</option>
            <option value="Madame">Madame</option>
            <option value="Monsieur">Monsieur</option>
        </select>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom"></input><br/>
        <label for="prenom">Prénom :</label>
        <input type="prenom" name="prenom" id="prenom"></input><br/>
        <label for="mail">E-Mail :</label>
        <input type="text" name="mail" id="mail"></input><br/>
        <label for="tel">Tel :</label>
        <input type="text" name="tel" id="tel"></input><br/>
        <label for="telP">Tel portable:</label>
        <input type="text" name="telP" id="telP"></input><br/>
    </fieldset>

    <!-- Information nécessaire uniquement aux étudiants -->
    <div id="Formulaire_Etudiant" style="display:none" height="0">
        <fieldset>
            <legend>Informations spécifiques à l'étudiant</legend>
            <label for="etudes">Etudes :</label>
            <input type="text" name="etudes" id="etudes"></input><br/>
            <label for="formation">Formation :</label>
            <input type="text" name="formation" id="formation"></input><br/>
            <label for="option">Specialité :</label>
            <select name ="option" id="option">
                <option value="">Sélectionnez une spécialité</option>
                <?
                //création du contenu du select pour les spécialités des étudiants
                foreach ($this->lireDonnee('lesSpecialites') as $spe) {
                    echo'<option value="' . $spe->getId() . '">' . $spe->getLibellecCourt() . '</option>'; //echo de la ligne 
                }
                ?>
            </select>
            <label for="classe">Classe :</label>
            <select name ="classe" id="classe">
                <option value="">Sélectionnez une classe</option>
                <?
                //création du contenu du select pour les classes d'étudiants
                foreach ($this->lireDonnee('lesClasses') as $classe) {
                    echo'<option value="' . $classe->getNumClasse() . '">' . $classe->getNumClasse() . '</option>'; //echo de la ligne 
                }
                ?>
            </select>
            <label for="anneeScol">Année Scolaire :</label>
            <select name ="anneeScol" id="anneeScol">
                <option value="">Sélectionnez une année scolaire</option>
                <?
                //création du contenu du select pour les années scolaires
                foreach ($this->lireDonnee('lesAnneeScol') as $anneeScol) {
                    echo'<option value="' . $anneeScol->getAnneeScol() . '">' . $anneeScol->getAnneeScol() . '</option>'; //echo de la ligne 
                }
                ?>
            </select>
        </fieldset>
    </div>

    <!-- Information nécessaire uniquement aux maitre de stage -->
    <div id="Formulaire_MaitreStage" style="display:none" height="0">
        <fieldset>
            <legend>Informations spécifiques du professionnel :</legend>
            <label for="organisation">Organisation :</label>
            <select name="organisation" id="organisation">
                <option value="">Sélectionnez une organisation</option>
                <?php
                //création du contenu du select pour les organisations
                foreach ($this->lireDonnee('lesOrganisations') as $organisation) {
                    // création d'une ligne du select 
                    echo'<option value="' . $organisation->getId() . '">' . $organisation->getNom() . '</option>';
                }
                ?>    
            </select>
            <label for="fonction">Fonction :</label>
            <input type="text" name="fonction" id="fonction"></input><br/>
        </fieldset>
    </div>

    <!-- Donnée de connexion des utilisateur -->
    <fieldset>
        <legend>Ses identifiants de connexion</legend>
        <label for="login">Login :</label>
        <input type="text" name="login" id="login"></input><br/>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp"></input><br/>
        <label for="mdp2">Retaper le mot de passe :</label>  <!-- vérification de mots de passe -->
        <input type="password" name="mdp2" id="mdp2"></input><br/>
    </fieldset>

    <fieldset>
        <input type="submit" value="Creer" onclick="return valider()"></input><!-- OnClick exécutera le JS qui testera tout les champ du formulaire. -->
        <input type="button" value="Retour" onclick="history.go(-1)">
    </fieldset>
</form>
<?php
// message de validation de création ou non 
if (isset($this->message)) {
    echo "<strong>" . $this->message . "</strong>";
}
?>