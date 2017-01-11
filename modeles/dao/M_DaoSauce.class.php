<?php
/**
 * Description of M_DaoSauce
 *
 * @author arichard
 */
class M_DaoSauce extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "SAUCE";
        $this->nomClefPrimaireIdProduit = "IDSAUCE";
    }

    /**
     * Redéfinition de la méthode abstraite de M_DaoGenerique
     * Permet d'instancier un objet d'après les valeurs d'un enregistrement lu dans la base de données
     * @param tableau-associatif $unEnreg liste des valeurs des champs d'un enregistrement
     * @return objet :  instance de la classe métier, initialisée d'après les valeurs de l'enregistrement 
     */
    public function enregistrementVersObjet($enreg) {
        //on construit l'objet Sauce
        $retour = new M_Sauce($enreg['idSauce'], $enreg['nomSauce']);
        return $retour;
    }

    /**
     * Prépare une liste de paramètres pour une requête SQL UPDATE ou INSERT
     * @param Object $objetMetier
     * @return array : tableau ordonné de valeurs
     */
    public function objetVersEnregistrement($objetMetier) {
        // construire un tableau des paramètres d'insertion ou de modification
        // l'ordre des valeurs est important : il correspond à celui des paramètres de la requête SQL
        $retour = array(
            ':nomSauce' => $objetMetier->getNomSauce()
        );
        return $retour;
    }

    public function insert($objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "INSERT INTO $this->nomTable (NOMSAUCE) VALUES (:nomSauce)";
//            var_dump($sql);
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // préparer la  liste des paramètres, avec l'identifiant en dernier
            $parametres = $this->objetVersEnregistrement($objetMetier);
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $retour = $queryPrepare->execute($parametres);
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public function update($idMetier, $objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "UPDATE $this->nomTable SET ";
            $sql .= "NOMSAUCE = :nomSauce ";
            $sql .= "WHERE IDSAUCE = :id";
//            var_dump($sql);
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // préparer la  liste des paramètres la valeur de l'identifiant
            //  à prendre en compte est celle qui a été passée en paramètre à la méthode
            $parametres = $this->objetVersEnregistrement($objetMetier);
            $parametres[':id'] = $idMetier;
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $retour = $queryPrepare->execute($parametres);
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }
    
    function getSauceByIdCommandeAndIdProduit($idCommande,$idProduit) {
        $retour = null;
// Requête textuelle
        $sql = "SELECT $this->nomTable.nomSauce,$this->nomTable.idSauce FROM $this->nomTable ";
        $sql .= "INNER JOIN assaisonner a ON $this->nomTable.idSauce=a.idSauce ";
        $sql .= "INNER JOIN produit pr ON a.idProduit=pr.idProduit ";
        $sql .= "INNER JOIN posseder po ON po.idProduit=pr.idProduit ";
        $sql .= "INNER JOIN menu m ON po.idMenu=m.idMenu ";
        $sql .= "INNER JOIN comporter comp ON m.idMenu=comp.idMenu ";
        $sql .= "INNER JOIN commande ON comp.idCommande=commande.idCommande ";
        $sql .= "WHERE commande.idCommande = :idCommande ";
        $sql .= "AND a.idProduit = :idProduit";
        try {
// préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
// exécuter la requête PDO
            if ($queryPrepare->execute(array(':idCommande' => $idCommande, ':idProduit' => $idProduit))) {
// si la requête réussit :
// initialiser le tableau d'objets à retourner
                $retour = array();
// pour chaque enregistrement retourné par la requête
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
// construir un objet métier correspondant
                    $unObjetMetier = $this->enregistrementVersObjet($enregistrement);
// ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

}
