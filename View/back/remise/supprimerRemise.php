<?php
require_once __DIR__ . '\..\..\..\Controller\RemiseC.php';
$remiseC = new RemiseC();
$remiseC->supprimerremise($_GET["id"]);
header('Location:index.php');
?>