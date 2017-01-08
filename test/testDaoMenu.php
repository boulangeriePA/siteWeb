<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test DaoMenu</title>
    </head>
    <body>
        <?php
        require_once("../includes/parametres.inc.php");
        require_once("../includes/fonctions.inc.php");

        $dao = new M_DaoMenu();
        $dao->connecter();

        //Test de sélection par Id 
        echo "<p>Test de sélection par Id</p>";
        $menu = $dao->getOneById(1);
        var_dump($menu);

        
        //Test de sélection de tous les enregistrements
        echo "<p>Test de sélection de tous les enregistrements</p>";
        $lesMenus = $dao->getAll();
        var_dump($lesMenus);
        
        //Test d'insertion
        echo "<p>Test d'insertion</p>";
        $menu= new M_Menu(null, 10.25, "test menu");
        var_dump($menu);
        $dao->insert($menu);
        $menuLu = $dao->selectOneByName("test menu");
        var_dump($menuLu);
        
        //Test de modification
        echo "<p>Test de modification</p>";
        $menu->setNomMenu("changement nom menu");
        $menu->setPrixMenu(1000);
        $enr = $dao->getPdo()->query('SELECT IDMENU FROM MENU WHERE NOMMENU="test menu";')->fetch();
        $id= $enr[0];
        $dao->update($id,$menu);
        $menuLu = $dao->selectOneByName("changement nom menu");
        var_dump($menuLu);
 
        //Test de suppression
        echo "<p>Test de suppression</p>";
        $id = $menuLu->getIdMenu();
        echo "Supprimer : ".$id."<br/>";
        $dao->delete($id);
        $menuLu = $dao->getOneById($id);
        var_dump($menuLu);
        
        $dao->deconnecter();
        ?>
    </body>
</html>
