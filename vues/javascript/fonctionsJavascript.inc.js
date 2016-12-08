function gotoUrl($url) {
    window.location = $url;
}

//fonction de choix de roles
function choixRole() {
    $monDiv1 = document.getElementById('Formulaire_MaitreStage');
    $monDiv = document.getElementById('Formulaire_Etudiant');
    $monSelect = document.getElementById('role');//récupération de la valeur du roles
    //formulaire qui sera modifier par la fonction
    $monDiv.style.display = 'none';
    $monDiv.style.height = "0";
    $monDiv1.style.display = 'none';
    $monDiv1.style.height = "0";

    switch ($monSelect.value) { // 4 : Etudiant ; 5 : Maître de stage
        case "4" ://Etudiant
            $monDiv.style.display = 'block';
            $monDiv.style.height = "228px";
//            $monDiv1.style.display = 'none';
            break;
        case "5" : //MaitreDeStage
            $monDiv1.style.display = 'block';
            $monDiv1.style.height = "115px";
            break;
        default://laisse les option caché pour tout autres utilisateur
            $monDiv.style.display = 'none';
//            $monDiv1.style.display = 'none';
    }
}

////fonction de choix de l'organisation
//function choixOrganisation() {
//    $monDiv = document.getElementById('Info_Organisation');
//    $monSelect = document.getElementById('organisation');//récupération de l'id de l'organisation
//
//    if ($monSelect==null) {
//        $monDiv.style.display = 'block';
//        $monDiv.style.height = "150px";
//        $daoOrg = new M_DaoOrganisation();
//        $daoOrg->connecter();
//        //récupération de la liste des organisations
//        $organisation = $daoOrg->selectOne($monSelect);
//        $this->vue->ecrireDonnee('lesOrganisations', $organisation);
//        $daoOrg->deconnecter();
//    }
//}

// validation création utilisateur
function valider()
{
    var ok = 1;

    if (document.getElementById('role').value == "")
    {
        alert("Veuillez indiquer un type de compte.");
        ok = 0;
        document.getElementById('role').focus();
        return false;
    }
    if (document.getElementById('civilite').value == "")
    {
        alert("Veuillez indiquer une civilité.");
        ok = 0;
        document.getElementById('civilite').focus();
        return false;
    }
    if (document.getElementById('nom').value == "")
    {
        alert("Veuillez indiquer un nom.");
        ok = 0;
        document.getElementById('nom').focus();
        return false;
    }
    if (document.getElementById('prenom').value == "")
    {
        alert("Veuillez indiquer un prenom.");
        ok = 0;
        document.getElementById('prenom').focus();
        return false;
    }

    var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
    if (document.getElementById('mail').value == "")
    {
        alert("Veuillez indiquer une adresse email.");
        ok = 0;
        document.getElementById('mail').focus();
        return false;
    } else if (reg.test(document.getElementById('mail').value) === false)
    {
        alert("Veuillez saisir une adresse email valide.\nExemple : test@gmail.com");
        ok = 0;
        document.getElementById('mail').focus();
        return false;
    }
    if (document.getElementById('tel').value == "")
    {
        alert("Veuillez indiquer un numéro de téléphone.");
        ok = 0;
        document.getElementById('tel').focus();
        return false;
    }
    if (isNaN(document.getElementById('tel').value))
    {
        alert("Le numéro de téléphone ne comporte pas uniquement des chiffres. \nVeuillez corriger.");
        ok = 0;
        document.getElementById('tel').focus();
        return false;
    }
    if ((document.getElementById('tel').value.length > 10) || (document.getElementById('tel').value.length < 10))
    {
        alert("Le numéro de téléphone ne comporte pas 10 chiffres.");
        ok = 0;
        document.getElementById('tel').focus();
        return false;
    }
    if (document.getElementById('telP').value !== "")
    {
        if (isNaN(document.getElementById('telP').value))
        {
            alert("Le numéro de téléphone portable ne comporte pas uniquement des chiffres. \nVeuillez corriger.");
            ok = 0;
            document.getElementById('telP').focus();
            return false;
        }
        if ((document.getElementById('telP').value.length > 10) || (document.getElementById('telP').value.length < 10))
        {
            alert("Le numéro de téléphone portable ne comporte pas 10 chiffres.");
            ok = 0;
            document.getElementById('telP').focus();
            return false;
        }
    }
    if (document.getElementById('role').value == "4")
    {
        if (document.getElementById('etudes').value == "")
        {
            alert("Veuillez indiquer un niveau d'étude.");
            ok = 0;
            document.getElementById('etudes').focus();
            return false;
        }
        if (document.getElementById('formation').value == "")
        {
            alert("Veuillez indiquer la formation suivie.");
            ok = 0;
            document.getElementById('formation').focus();
            return false;
        }
        if (document.getElementById('option').value == "")
        {
            alert("Veuillez indiquer une spécialité.");
            ok = 0;
            document.getElementById('option').focus();
            return false;
        }
        if (document.getElementById('classe').value == "")
        {
            alert("Veuillez indiquer une classe.");
            ok = 0;
            document.getElementById('classe').focus();
            return false;
        }
        if (document.getElementById('anneeScol').value == "")
        {
            alert("Veuillez indiquer une année scolaire.");
            ok = 0;
            document.getElementById('anneeScol').focus();
            return false;
        }
    }
    if (document.getElementById('role').value == "5")
    {
        if (document.getElementById('organisation').value == "")
        {
            alert("Veuillez indiquer une organisation.");
            ok = 0;
            document.getElementById('organisation').focus();
            return false;
        }
        if (document.getElementById('fonction').value == "")
        {
            alert("Veuillez indiquer la fonction occupée.");
            ok = 0;
            document.getElementById('fonction').focus();
            return false;
        }
    }
    if (document.getElementById('login').value == "")
    {
        alert("Veuillez indiquer votre login.");
        ok = 0;
        document.getElementById('login').focus();
        return false;
    }
    if (document.getElementById('mdp').value == "")
    {
        alert("Veuillez indiquer votre mot de passe.");
        ok = 0;
        document.getElementById('mdp').focus();
        return false;
    }
    if (document.getElementById('mdp').value.length < 7)
    {
        alert("Votre mot de passe doit comporter au moins 7 caractères.");
        ok = 0;
        document.getElementById('mdp').focus();
        return false;
    }
    if (document.getElementById('mdp2').value == "")
    {
        alert("Veuillez indiquer votre vérification de mot de passe.");
        ok = 0;
        document.getElementById('mdp2').focus();
        return false;
    }
    if ((document.getElementById('mdp').value) != (document.getElementById('mdp2').value))
    {
        alert("Vos mots de passes sont différents.");
        ok = 0;
        document.getElementById('mdp').focus();
        return false;
    }

    if (ok == 1) {

        document.submit();

    }

}
//VAlidation création entreprise
function validerE()
{
    var ok = 1;


    if (document.getElementById('nom').value == "")
    {
        alert("Veuillez indiquer le nom de l'entreprise.");
        ok = 0;
        document.getElementById('nom').focus();
        return false;
    }
    if (document.getElementById('ville').value == "")
    {
        alert("Veuillez indiquer la ville de l'entreprise.");
        ok = 0;
        document.getElementById('ville').focus();
        return false;
    }

    if (document.getElementById('ads').value == "")
    {
        alert("Veuillez indiquer l'adresse l'entreprise.");
        ok = 0;
        document.getElementById('ads').focus();
        return false;
    }
    if (document.getElementById('cp').value == "")
    {
        alert("Veuillez indiquer le code postal.");
        ok = 0;
        document.getElementById('cp').focus();
        return false;
    }
    if (isNaN(document.getElementById('cp').value))
    {
        alert("Le code postal ne comporte pas uniquement des chiffres. \nVeuillez corriger.");
        ok = 0;
        document.getElementById('cp').focus();
        return false;
    }
    if ((document.getElementById('cp').value.length > 5) || (document.getElementById('cp').value.length < 5))
    {
        alert("Le code postal ne comporte pas 5 chifre.");
        ok = 0;
        document.getElementById('cp').focus();
        return false;
    }
    if (document.getElementById('tel').value == "")
    {
        alert("Veuillez indiquer le téléphone de l'entreprise.");
        ok = 0;
        document.getElementById('tel').focus();
        return false;
    }
    if (isNaN(document.getElementById('tel').value))
    {
        alert("Le téléphone ne comporte pas uniquement des chiffres. \nVeuillez corriger.");
        ok = 0;
        document.getElementById('tel').focus();
        return false;
    }
    if ((document.getElementById('tel').value.length > 10) || (document.getElementById('tel').value.length < 10))
    {
        alert("Le téléphone ne comporte pas 10 chifre.");
        ok = 0;
        document.getElementById('tel').focus();
        return false;
    }
    if (document.getElementById('fj').value == "")
    {
        alert("Veuillez indiquer sa forme juridique.");
        ok = 0;
        document.getElementById('fj').focus();
        return false;
    }
    if (ok == 1) {

        document.submit();

    }

}


function validerStage()
{
    var ok = 1;

    if (document.getElementById('eleveId').value == "")
    {
        alert("Veuillez sélectionner un étudiant.");
        ok = 0;
        document.getElementById('eleveId').focus();
        return false;
    }
    if (document.getElementById('annee').value == "")
    {
        alert("Veuillez indiquer une année scolaire.");
        ok = 0;
        document.getElementById('annee').focus();
        return false;
    }
    if (document.getElementById('organisation').value == "")
    {
        alert("Veuillez indiquer une organisation.");
        ok = 0;
        document.getElementById('organisation').focus();
        return false;
    }
    if (document.getElementById('ville').value == "")
    {
        alert("Veuillez indiquer une ville.");
        ok = 0;
        document.getElementById('ville').focus();
        return false;
    }
    if (document.getElementById('maitrestage').value == "")
    {
        alert("Veuillez indiquer un maitre de stage.");
        ok = 0;
        document.getElementById('maitrestage').focus();
        return false;
    }
    if (document.getElementById('dateDebut').value=="")
    {
        alert("Veuillez indiquer une date de debut.");
        ok = 0;
        document.getElementById('dateDebut').focus();
        return false;
    }
    if (document.getElementById('dateFin').value == "")
    {
        alert("Veuillez indiquer une date de fin.");
        ok = 0;
        document.getElementById('dateFin').focus();
        return false;
    }
    if (document.getElementById('ParticipationCCF').value == "")
    {
        alert("Veuillez indiquer si le stage participe à l'évaluation en CCF.");
        ok = 0;
        document.getElementById('ParticipationCCF').focus();
        return false;
    }
    if (document.getElementById('professeur').value == "")
    {
        alert("Veuillez sélectionner un professeur.");
        ok = 0;
        document.getElementById('professeur').focus();
        return false;
    }
    if (document.getElementById('dateVisite').value == "")
    {
        alert("Veuillez indiquer une date de visite.");
        ok = 0;
        document.getElementById('dateVisite').focus();
        return false;
    }
    
    //controle des bonnes dates
    if (document.getElementById('dateDebut').value == "")
    {
        alert("Veuillez indiquer une date de visite.");
        ok = 0;
        document.getElementById('dateDebut').focus();
        return false;
    }
    if (document.getElementById('dateVisite').value == "")
    {
        alert("Veuillez indiquer une date de visite.");
        ok = 0;
        document.getElementById('dateVisite').focus();
        return false;
    }
    if (document.getElementById('dateFin').value == "")
    {
        alert("Veuillez indiquer une date de visite.");
        ok = 0;
        document.getElementById('dateFin').focus();
        return false;
    }

    if (ok == 1) {

        document.submit();

    }

}



// donction d'impretion
//function imprimer(){
///var impression=document.creatElement("a");
/// var test_impression=document.createTextNode("Imprimer La sélection");
/// impression.appendChild(test_impression);
/// var imprimersortie=document.getElementByID("tableau");
/// imprimersortie.appendChild(impression);
//}
function imprimer() {
    document.body.className += "print";
    windows.print();
    document.body.className = document.body.classNAme.replace(/\bprint\b/, "");

}
    