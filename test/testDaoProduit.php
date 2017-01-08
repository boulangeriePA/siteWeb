<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test DaoProduit</title>
    </head>
    <body>
        <?php
        require_once("../includes/parametres.inc.php");
        require_once("../includes/fonctions.inc.php");

        $dao = new M_DaoProduit();
        $dao->connecter();

        //Test de sélection par Id 
        echo "<p>Test de sélection par Id </p>";
        $produit = $dao->getOneById(1);
        var_dump($produit);

        
        //Test de sélection de tous les enregistrements
        echo "<p>Test de sélection de tous les enregistrements</p>";
        $lesProduits = $dao->getAll();
        var_dump($lesProduits);
        
        //Test d'insertion
        echo "<p>Test d'insertion</p>";
        $produit = new M_Produit(null, "test prod");
        var_dump($produit);
        $dao->insert($produit);
        $produitLu = $dao->selectOneByName('test prod');
        var_dump($produitLu);
        
        //Test de modification
        echo "<p>Test de modification</p>";
        $produit->setNomProduit("bouffe");
        $enr = $dao->getPdo()->query('SELECT MAX(IDPRODUIT) FROM PRODUIT;')->fetch();
        $id= $enr[0];
        $dao->update($id,$produit);
        $produitLu = $dao->selectOneByName("bouffe");
        var_dump($produitLu);
 
        //Test de suppression
        echo "<p>Test de suppression</p>";
        $id = $produitLu->getIdProduit();
        echo "Supprimer : ".$id."<br/>";
        $dao->delete($id);
        $produitLu = $dao->getOneById($id);
        var_dump($produitLu);
        
        $dao->deconnecter();
        ?>
    </body>
</html>
