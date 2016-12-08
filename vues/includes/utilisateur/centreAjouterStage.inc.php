<script language="JavaScript" type="text/javascript" src="../vues/javascript/fonctionsJavascript.inc.js"></script>
<script language="JavaScript" type="text/javascript" src="../bibliotheques/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src=".../vues/javascript/ajax.inc.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script> //fonction permettant d'afficher un calendrier pour le choix d'une date
    $(function() {
        $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
        // adaptation du format de la date pour la base de donnée
    });
</script>

<!-- VARIABLES NECESSAIRES -->
<form method="post" action=".?controleur=Utilisateur&action=validerAjoutStage" name="AjoutStage">
    <h1>Ajouter un Stage</h1>

    <fieldset>
        <legend>Informations étudiant</legend>
        <input type="hidden" readonly="readonly" name="id" id="id"></input>
        <label for="etudiant">Etudiant :</label>
        <?php
        //récupération des informations de l'utilisateur connecté
        $unUtilisateur = $this->lireDonnee('utilisateur');
        //récupération du role de l'utilisateur
        $roleUtilisateur = $unUtilisateur->getRole()->getId();
        //si l'utilisateur est un étudiant son nom est déjà inscrit
        if ($roleUtilisateur == 4) {
            echo'<input type="text" style="display:none" name="eleveId" id="eleveId" value="' . $unUtilisateur->getId() . '"></input>';
            echo'<input type="text" readonly="readonly" name="eleveNomPrenom" id="eleveNomPrenom" value="' . $unUtilisateur->getNom() . ' ' . $unUtilisateur->getPrenom() . '"></input>';
            //si l'utilisateur n'est pas un étudiant la liste déroulante de tous les étudiants apparaissent            
        } else {
            echo'<select name = "eleveId" id = "eleveId">';
            echo'<option value = "">Choisissez un étudiant</option>';
            // remplissage du "SELECT" qui contient les élèves
            foreach ($this->lireDonnee('lesEleves') as $eleve) {
                echo'<option value = "' . $eleve->getId() . '">' . $eleve->getNom() . ' ' . $eleve->getPrenom() . '</option>';
            }
            echo'</select>';
        }
        ?>
        <label>Année scolaire :</label>
        <select id="annee" name="annee">
            <option value="">Sélectionnez l'année scolaire</option>
            <?php
            // remplissage du "SELECT" qui contient les années scolaires
            foreach ($this->lireDonnee('lesAnneesScol') as $anneescol) {
                echo'<option value="' . $anneescol->getAnneeScol() . '">' . $anneescol->getAnneeScol() . '</option>';
            }
            ?>
        </select>
    </fieldset>

    <fieldset>
        <legend>Informations stage</legend>
        <label for="organisation">Organisation :</label>
        <select name="organisation" id="organisation">
            <option value="">Sélectionnez une organisation</option>
            <?php
            // remplissage du "SELECT" qui contient les organisations
            foreach ($this->lireDonnee('lesOrganisations') as $organisation) {
                echo'<option value="' . $organisation->getId() . '">' . $organisation->getNom() . '</option>';
            }
            ?>
        </select>
        <label for="ville">Ville :</label>
        <select name="ville" id="ville">
            <option value="">Sélectionnez une ville</option>
            <?php
            // remplissage du "SELECT" qui contient les villes déjà enregistrer dans la table organisation
            foreach ($this->lireDonnee('lesOrganisations') as $organisation) {
                echo'<option value="' . $organisation->getVille() . '">' . $organisation->getVille() . '</option>';
            }
            ?>
        </select>
        <label for="maitrestage">Maitre de stage :</label>
        <select name="maitrestage" id="maitrestage">
            <option value="">Choisissez un maître de stage</option>
            <?php
            // remplissage du "SELECT" qui contient les maîtres de stage
            foreach ($this->lireDonnee('lesMaitresStage') as $maitrestage) {
                echo'<option value="' . $maitrestage->getId() . '">' . $maitrestage->getNom() . ' ' . $maitrestage->getPrenom() . '</option>';
            }
            ?>
        </select>
        <label for="datedebut">Date debut :</label>
        <input type="text" class="datepicker" name="dateDebut" id="dateDebut">
        <label for="datefin">Date fin :</label>
        <input type="text" class="datepicker" name="dateFin" id="dateFin">
    </fieldset>

    <fieldset>
        <legend>Informations complémentaire</legend>
        <label for="divers">Divers :</label>
        <input type="text" name="divers" id="divers"></input>
        <label for="bilanTravaux">Bilan des travaux:</label>
        <input type="text" name="bilanTravaux" id="bilanTravaux"></input>
        <label for="ressourcesOutils">Ressources des Outils :</label>
        <input type="text" name="RessourcesOutils" id="RessourcesOutils"></input>
        <label for="commentaire">Commentaire :</label>
        <textarea style="margin: 0px; height: 19px; width: 172px;" type="text" name="Commentaire" id="Commentaire"></textarea>
        <label for="participationCCF">Participation CCF :</label>
        <select type="select" name="ParticipationCCF" id="ParticipationCCF">
            <option value=""></option>
            <option value="Oui">Oui</option>
            <option value="Non">Non</option>
        </select>
    </fieldset>

    <fieldset>
        <legend>Suivi</legend>
        <label for="professeur">Professeur :</label>
        <select name="professeur" id="professeur">
            <option value="">Choisissez un professeur</option>
            <?php
            // remplissage du "SELECT" qui contient les professeurs
            foreach ($this->lireDonnee('lesProfesseurs') as $professeur) {
                echo'<option value="' . $professeur->getId() . '">' . $professeur->getNom() . ' ' . $professeur->getPrenom() . '</option>';
            }
            ?>
        </select>
        <label for="datevisite">Date visite :</label>
        <input type="text" class="datepicker" name="dateVisite" id="dateVisite">
    </fieldset>

    <fieldset>
        <input type="submit" value="Ajouter" onclick="return validerStage()"></input><!-- OnClick éxécutera le JS qui testera tout les champ du formulaire. -->
        <input type="button" value="Retour" onclick="history.go(-1)">
    </fieldset>
</form>
<?php
// message de validation de création ou non 
if (isset($this->message)) {
    echo "<strong>" . $this->message . "</strong>";
}
?>
