<!DOCTYPE html>
<?php
var_dump(__DIR__);
//require_once __DIR__.'\..\..\..\config.php';

require_once '..\..\..\Controller\ProduitC.php';
$ProduitC = new ProduitC();
$listeProduit = $ProduitC->afficherproduits();

if (isset($_POST['btn-rechrche']) && isset($_POST['recherche'])) {
    if (!empty($_POST['recherche']))
        $listeProduit = $ProduitC->recheche($_POST['recherche']);
}
?>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Stexo - Responsive Admin & Dashboard Template | Themesdesign</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">


</head>

<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="index.html" class="logo">
                    <span class="logo-light">
                            <i class="mdi mdi-camera-control"></i> Stexo
                        </span>
                <span class="logo-sm">
                            <i class="mdi mdi-camera-control"></i>
                        </span>
            </a>
        </div>

        <nav class="navbar-custom">
            <ul class="navbar-right list-inline float-right mb-0">

                <!-- language-->
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                       role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="../assets/images/flags/us_flag.jpg" class="mr-2" height="12" alt=""/> English <span
                                class="mdi mdi-chevron-down"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                        <a class="dropdown-item" href="#"><img src="../assets/images/flags/french_flag.jpg" alt=""
                                                               height="16"/><span> French </span></a>
                        <a class="dropdown-item" href="#"><img src="../assets/images/flags/spain_flag.jpg" alt=""
                                                               height="16"/><span> Spanish </span></a>
                        <a class="dropdown-item" href="#"><img src="../assets/images/flags/russia_flag.jpg" alt=""
                                                               height="16"/><span> Russian </span></a>
                        <a class="dropdown-item" href="#"><img src="../assets/images/flags/germany_flag.jpg" alt=""
                                                               height="16"/><span> German </span></a>
                        <a class="dropdown-item" href="#"><img src="../assets/images/flags/italy_flag.jpg" alt=""
                                                               height="16"/><span> Italian </span></a>
                    </div>
                </li>

                <!-- full screen -->
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                        <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                    </a>
                </li>

                <!-- notification -->
                <li class="dropdown notification-list list-inline-item">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                       role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                            Notifications
                        </h6>
                        <div class="slimscroll notification-item-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                                <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span>
                                </p>
                            </a>

                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list list-inline-item">
                    <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="../assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> Wallet</a>
                            <a class="dropdown-item d-block" href="#"><span
                                        class="badge badge-success float-right">11</span><i
                                        class="mdi mdi-settings"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power text-danger"></i>
                                Logout</a>
                        </div>
                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                <li class="d-none d-md-inline-block">
                    <form role="search" class="app-search">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" placeholder="Search..">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
            </ul>

        </nav>

    </div>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">


                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-mail-open"></i><span> categorie <span
                                        class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="../categorie/index.php">List Categorie</a></li>
                            <li><a href="../categorie/ajouterCategorie.php">ajouter categorie</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-mail-open"></i><span> Produit <span
                                        class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="index.php">List Produit</a></li>
                            <li><a href="ajouterProduit.php">ajouter Produit</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i
                                    class="icon-mail-open"></i><span> Remise <span
                                        class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="../remise/index.php">List Remise</a></li>
                            <li><a href="../remise/ajouterRemise.php">ajouter Remise</a></li>
                        </ul>
                    </li>


                </ul>

            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Responsive Table</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Responsive Table</li>
                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div>
                <!-- end page-title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Produit</h4>
                                <p class="sub-title font-14">
                                    <input type="text" name="recherche" id="recherche111">

                                </p>

                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table  table-striped">
                                            <thead>
                                            <tr>
                                                <th data-priority="1">nom</th>
                                                <th data-priority="3">Marque</th>
                                                <th data-priority="1">Prix</th>
                                                <th data-priority="1">description</th>
                                                <th data-priority="1">quantite</th>
                                                <th data-priority="1">Categorie</th>
                                                <th data-priority="1">Image</th>
                                                <th>remise Aujourduit</th>
                                            </tr>
                                            </thead>
                                            <tbody id="result">
                                            <?php
                                            foreach ($listeProduit

                                            as $Produit) {
                                            ?>
                                            <tr>
                                                <th>
                                                    <?php echo $Produit['Nomproduit']; ?></th>
                                                <th>
                                                    <?php echo $Produit['Marque']; ?></th>
                                                <th>
                                                    <?php echo $Produit['Prix']; ?></th>
                                                <th>
                                                    <?php echo $Produit['Prod_desc']; ?></th>
                                                <th>
                                                    <?php echo $Produit['Qte_stock']; ?></th>
                                                <th>
                                                    <?php echo $Produit['Id_cat']; ?></th>


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
                                                    <a href="modifieProduit.php?NumProduit=
                                            <?php echo $Produit['NumProduit']; ?>"
                                                       class="btn btn-tbl-edit">
                                                        <i class="fa fa-edit"
                                                           style="font-size:20px;color:rgb(15, 192, 15)"></i>
                                                    </a>
                                                    <form method="POST"
                                                          action="supprimerProduit.php?NumProduit=
                                            <?php echo $Produit['NumProduit']; ?>"
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


                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->

        <footer class="footer">
            © 2019 - 2020 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i
                        class="mdi mdi-heart text-danger"></i> by Amine Ben jebli</span>.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- jQuery  -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/metismenu.min.js"></script>
<script src="../assets/js/jquery.slimscroll.js"></script>
<script src="../assets/js/waves.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<!-- Responsive-table-->
<script src="../plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js"></script>

<!-- App js -->
<script src="../assets/js/app.js"></script>
<script>


    $(document).ready(function () {
        $('#recherche111').keyup(function () {
            var search = $(this).val();

            if (search != '') {
                $.ajax({
                    url: "fetch.php?q=" + search,
                    method: "GET",
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $.ajax({
                    url: "fetch.php",
                    method: "GET",
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
        });
    });
</script>
<!-- END wrapper -->

</body>

</html>