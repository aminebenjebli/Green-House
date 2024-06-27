<?php
require_once __DIR__ . '\..\..\..\Controller\ProduitC.php';
$ProduitC = new ProduitC();
$ProduitC->supprimerproduit($_GET["NumProduit"]);
header('Location:index.php');
?>