<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test DaoRole et DaoTypeRetrait</title>
    </head>
    <body>
        <?php
        require_once("../includes/parametres.inc.php");
        require_once("../includes/fonctions.inc.php");
        
        $dao = new M_DaoRole();
        $dao->connecter();
        
        // Role : test de sélection par Id 
        echo "<p>Role : test de sélection par Id</p>";
        $role = $dao->getOneById(2);
        var_dump($role);
        
        // Role : test de sélection de tous les enregistrements
        echo "<p>Role : test de sélection de tous les enregistrements</p>";
        $lesRoles = $dao->getAll();
        var_dump($lesRoles);
        
        // role : test de la selection par l'id d'un seul role
        echo "<p><u>Role : test select one </u></p>";
        $unRole = $dao->selectOne(1);
        var_dump($unRole);
        
        
        $dao = new M_DaoTypeRetrait();
        $dao->connecter();
        
        // TypeRetrait : test de sélection par Id 
        echo "<p>TypeRetrait : test de sélection par Id</p>";
        $type = $dao->getOneById(2);
        var_dump($type);
        
        // TypeRetrait : test de sélection de tous les enregistrements
        echo "<p>TypeRetrait : test de sélection de tous les enregistrements</p>";
        $lesTypes = $dao->getAll();
        var_dump($lesTypes);
        
        // TypeRetrait : test de la selection par l'id d'une seule specialite
        echo '<p>TypeRetrait : test select one</p>';
        $selection = $dao->selectOne(1);
        var_dump($selection);
        $dao->deconnecter();
        ?>
    </body>
</html>