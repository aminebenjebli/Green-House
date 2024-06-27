<?php

require_once __DIR__ . '\..\config.php';
require_once __DIR__ . '\..\Model\Remise.php';

class RemiseC
{
    function afficherRemise()
    {
        $sql = "SELECT * FROM `remise` INNER JOIN produit on remise.id_produit = produit.NumProduit;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function supprimerremise($id)
    {
        $sql = "DELETE FROM remise WHERE id_remise=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function ajouterRemise(Remise $remise)
    {
        $sql = "INSERT INTO `remise`(`id_remise`, `date_debut`, `date_fin`, `id_produit`, `pourcentage`) 
                                VALUES (default ,:dat_D,:date_F,:id_P,:pourcentage)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'dat_D' => $remise->getDateDebut(),
                'date_F' => $remise->getDateFin(),
                'id_P' => $remise->getProduit(),
                'pourcentage' => $remise->getPorcentage()

            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function modifierRemise(Remise $remise, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE `remise` SET `date_debut`=:date_d,`date_fin`=:date_f,`id_produit`=:id_p,`pourcentage`=:pourcentage WHERE `id_remise`=:id'
            );
            $query->execute([
                'date_d' => $remise->getDateDebut(),
                'date_f' => $remise->getDateFin(),
                'id_p' => $remise->getProduit(),
                'pourcentage' => $remise->getPorcentage(),
                'id' => $id

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function recupererRemise($id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * from remise INNER JOIN produit on remise.id_produit = produit.NumProduit where id_remise=:id");
            $query->execute([
                'id' => $id
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
// RecuperezRemiseParProduits()
function recupererOffreParProduit($id_produit)
{                               
    $sql = "SELECT * FROM remise 
            INNER JOIN produit ON remise.id_produit = produit.NumProduit 
            WHERE produit.NumProduit = :id_produit 
            AND CURRENT_DATE BETWEEN remise.date_debut AND remise.date_fin";

    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

}
