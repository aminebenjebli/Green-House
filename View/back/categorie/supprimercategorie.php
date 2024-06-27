<?php
	require_once __DIR__.'\..\..\..\Controller\CategorieC.php';
	$CategorieC=new CategorieC();
	$CategorieC->supprimercategorie($_GET["Id_cat"]);
	header('Location:index.php');
?>