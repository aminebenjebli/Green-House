<?php
require_once '..\..\..\Controller\ProduitC.php';
$ProduitC = new ProduitC();
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $listeProduit = $ProduitC->recheche($_GET['q']);

} else {
    $listeProduit = $ProduitC->afficherproduits();

}

foreach ($listeProduit

as $Produit) { ?>
<tr>
    <th><?php echo $Produit['Nomproduit']; ?></th>
    <th><?php echo $Produit['Marque']; ?></th>
    <th><?php echo $Produit['Prix']; ?></th>
    <th><?php echo $Produit['Prod_desc']; ?></th>
    <th><?php echo $Produit['Qte_stock']; ?></th>
    <th><?php echo $Produit['Id_cat']; ?></th>


    <td><img style="width: 30px;height: 30px"
             src="http://localhost:80/gestion-produit/View/back/assets/images/produit/<?php echo $Produit['image_prod']; ?>"
             alt=""></td>

    <td>
        <?php
        if ($Produit['pourcentage'] != null) {
            echo $Produit['pourcentage'] . '%';
        } else {
            echo '0%';
        }
        ?>
    </td>
    <td style="display: flex; justify-content: center">
        <a href="modifieProduit.php?NumProduit=<?php echo $Produit['NumProduit']; ?>"
           class="btn btn-tbl-edit">
            <i class="fa fa-edit"
               style="font-size:20px;color:rgb(15, 192, 15)"></i>
        </a>
        <form method="POST"
              action="supprimerProduit.php?NumProduit=<?php echo $Produit['NumProduit']; ?>"
              onsubmit="return confirm('tu est sure de supprimer cette billet');">
            <button class="btn btn-tbl-edit">
                <i class="fa fa-trash"
                   style="font-size:20px;color:red"></i>
            </button>
        </form>


    </td>
    <?php
    }
    ?>
</tr>
