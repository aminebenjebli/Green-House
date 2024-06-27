<?php

require_once __DIR__ . '\..\config.php';
require_once __DIR__ . '\..\Model\Produit.php';

class ProduitC
{
    function afficherproduits()
    {
        $sql = "SELECT * FROM produit p inner join categorie c on p.id_cat=c.id_cat LEFT JOIN remise on remise.id_produit = p.NumProduit and CURRENT_DATE BETWEEN remise.`date_debut` and remise.`date_fin`;
";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function supprimerproduit($NumProduit)
    {
        $sql = "DELETE FROM produit WHERE NumProduit=:NumProduit";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':NumProduit', $NumProduit);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function ajouterproduit($Produit)
    {
        $sql = "INSERT INTO produit ( NumProduit,Nomproduit, Marque, Prix, Prod_desc, Qte_stock, Id_cat, image_prod) 
			VALUES (DEFAULT,:Nomproduit,:Marque, :Prix,:Prod_desc, :Qte_stock, :Id_cat, :image_prod)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Nomproduit' => $Produit->getNomproduit(),
                'Marque' => $Produit->getMarque(),
                'Prix' => $Produit->getPrix(),
                'Prod_desc' => $Produit->getProd_desc(),
                'Qte_stock' => $Produit->getQte_stock(),
                'Id_cat' => $Produit->getId_cat(),
                'image_prod' => $Produit->getImage_prod()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function recupererproduit($NumProduit)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * from produit where NumProduit=:NumProduit");
            $query->execute([
                'NumProduit' => $NumProduit
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function modifierproduit($Produit, $NumProduit)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
						Nomproduit=:Nomproduit, 
						Marque=:Marque, 
						Prix=:Prix, 
						Prod_desc=:Prod_desc, 
						Qte_stock=:Qte_stock,
						Id_cat=:Id_cat,
                   image_prod=:img
                    
					WHERE NumProduit=:NumProduit'
            );
            $query->execute([
                'Nomproduit' => $Produit->getNomproduit(),
                'Marque' => $Produit->getMarque(),
                'Prix' => $Produit->getPrix(),
                'Prod_desc' => $Produit->getProd_desc(),
                'Qte_stock' => $Produit->getQte_stock(),
                'Id_cat' => $Produit->getId_cat(),
                'NumProduit' => $NumProduit,
                'img' => $Produit->getImage_prod()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function recupererproduitByCategorie($id_cat)
    {
        $sql = "SELECT * FROM produit p inner join categorie c on p.id_cat=c.id_cat LEFT JOIN remise on remise.id_produit = p.NumProduit and CURRENT_DATE BETWEEN remise.`date_debut` and remise.`date_fin` where p.Id_cat=$id_cat";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function recheche($key)
    {
        $sql = "SELECT * FROM produit p inner join categorie c on p.id_cat=c.id_cat LEFT JOIN remise on remise.id_produit = p.NumProduit and CURRENT_DATE BETWEEN remise.`date_debut` and remise.`date_fin` WHERE upper(`Nomproduit`) LIKE '%$key%' or upper(`Marque`) LIKE '%$key%';";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
}
