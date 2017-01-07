<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test DaoUser</title>
    </head>
    <body>
        <?php
        require_once("../includes/parametres.inc.php");
        require_once("../includes/fonctions.inc.php");

        $dao = new M_DaoUser();
        $dao->connecter();

        //Test de sélection par Id 
        echo "<p>Test de sélection par Id </p>";
        $role = $dao->getOneById(1);
        var_dump($role);

        
        //Test de sélection de tous les enregistrements
        echo "<p>Test de sélection de tous les enregistrements</p>";
        $lesPers = $dao->getAll();
        var_dump($lesPers);
        
        //Test de sélection sur le login sans association
        echo "<p>Test de sélection sur le login sans association</p>";
        $role = $dao->getOneByLogin('bsabaron');
        var_dump($role);
        
        //Test de sélection sur le login avec association
        echo "<p>Test de sélection sur le login avec association</p>";
        $role = $dao->getOneByLogin('ldijoux');
        var_dump($role);

        //Test d'insertion
        echo "<p>Test d'insertion</p>";
        $role = new M_Role(2, "intendant");
        $role= new M_User(5, "Hugo", "Victor","vhugo@free.fr", "0678901234", "vhugo", "vhugo", $role);
        var_dump($role);
        $dao->insert($role);
        $persLu = $dao->getOneByLogin('vhugo');
        var_dump($persLu);
        
        //Test de modification
        echo "<p>Test de modification</p>";
        $role->setEmail("victor.hugo@laposte.net");
        $role->setNomUser("uther");
        $enr = $dao->getPdo()->query('SELECT MAX(IDUSER) FROM USER;')->fetch();
        $id= $enr[0];
        $dao->update($id,$role);
        $persLu = $dao->getOneByLogin('vhugo');
        var_dump($persLu);
 
        //Test de suppression
        echo "<p>Test de suppression</p>";
        $id = $persLu->getIdUser();
        echo "Supprimer : ".$id."<br/>";
        $dao->delete($id);
        $persLu = $dao->getOneById($id);
        var_dump($persLu);
        
        $dao->deconnecter();
        ?>
    </body>
</html>
