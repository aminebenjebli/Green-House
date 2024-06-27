<?php
require_once  '..\..\..\config.php';
require_once '..\..\..\Controller\ProduitC.php';
require_once  '..\..\..\Controller\CategorieC.php';

$ProduitC = new ProduitC();
$listeProduits = $ProduitC->afficherproduits();
$CategorieC = new CategorieC();
$listeCategorie = $CategorieC->affichercategories();

if (isset($_GET['idCat'])) {
    $listeProduits = $ProduitC->recupererproduitByCategorie($_GET['idCat']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <title>Bj Man</title>
</head>
<body>
<!--==================== HEADER ====================-->
<header class="header" id="header">
    <nav class="nav container">
        <a href="#" class="nav__logo">
            <i class="ri-leaf-line nav__logo-icon"></i> Green House
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#home" class="nav__link ">Home</a>
                </li>
                <li class="nav__item">
                    <a href="#about" class="nav__link">About</a>
                </li>
                <li class="nav__item">
                    <a href="produit" class="nav__link active-link">Products</a>
                </li>
                <li class="nav__item">
                    <a href="#faqs" class="nav__link">FAQs</a>
                </li>
                <li class="nav__item">
                    <a href="#contact" class="nav__link">Contact Us</a>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-line"></i>
            </div>
        </div>

        <div class="nav__btns">
            <!-- Theme change button -->
            <i class="ri-moon-line change-theme" id="theme-button"></i>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line"></i>
            </div>
        </div>
    </nav>
</header>

<main class="main">


    <!--==================== PRODUCTS ====================-->
    <section class="product section container" id="products">
    <h2 class="section__title-center">
            Consultez nos <br> produits
        </h2>

        <p class="product__description">
            Achetez et profitez de la meilleure qualité .
        <div style="display: flex;">
            <div style="background-color: antiquewhite;
    margin: 4rem 15px;
    padding: 10px;
    border-radius: 10px;
    height: fit-content;"
            >
                <h3>Categorie</h3>
                <?php
                foreach ($listeCategorie as $categorie) {
                    ?>
                    <a  href="index.php?idCat=<?php echo $categorie['Id_cat'] ?>"
                       style="color: black; <?php if (isset($_GET['idCat']) && ($categorie['Id_cat'] == $_GET['idCat'])) {
                           echo "color: hsl(var(--hue), 24%, 32%)";
                       } ?>"> <?php echo $categorie['NomCategorie'] ?></a>
                    <br>
                    <?php
                }
                ?>
            </div>
            <div class="product__container grid">
                <?php
                foreach ($listeProduits as $Produit) {
                    ?>
                    <article class="product__card">
                        <?php
                        if ($Produit['pourcentage'] != null) {
                            echo '
                        <div style=" z-index:10;width: 50px;
            height: 50px; top: 0%;
    right: 0%; padding: 11px;" class="product__circle">' .
                                $Produit['pourcentage'] .
                                '%  </div>';
                        }
                        ?>
                        <img src="http://localhost:80/gestion-produit/View/back/assets/images/produit/<?php echo $Produit['image_prod']; ?>"
                             alt="" class="product__img">

                        <span class="product__name"><?php echo $Produit['Nomproduit']; ?></span>
                        <span  class="product__price"><?php echo $Produit['Prix']; ?> dt</span>
                        
                        <div>
                            <p><?php echo $Produit['Prod_desc']; ?></p>
                        </div>
                        <br>
                        <div>
                            <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </div>
                        
                    </article>


                    <?php
                }
                ?>
            </div>
        </div>
    </section>


    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">
                    <i class="ri-leaf-line footer__logo-icon"></i> Green House
                </a>

                <h3 class="footer__title">
                    Inscrivez-vous à notre newsletter <br> pour rester informé(e)
                </h3>

                <div class="footer__subscribe">
                    <input type="email" placeholder="Enter your email" class="footer__input">

                    <button class="button button--flex footer__button">
                        S'abonner
                        <i class="ri-arrow-right-up-line button__icon"></i>
                    </button>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Notre adresse </h3>

                <ul class="footer__data">
                    <li class="footer__information">Route de Bizerte GP8</li>

                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Contactez-nous</h3>

                <ul class="footer__data">
                    <li class="footer__information">+21654327348</li>
                    <li class="footer__information">aminebenjebli@gmail.com</li>
                    <div class="footer__social">
                        <a href="https://www.facebook.com/medamine.benjebli/" class="footer__social-link">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/benjebli_amine/" class="footer__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/ben-jebli-amine/" class="footer__social-link">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                    </div>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    Nous acceptons toutes les cartes de crédit
                </h3>

                <div class="footer__cards">
                    <img src="../assets/img/card1.png" alt="" class="footer__card">
                    <img src="../assets/img/card2.png" alt="" class="footer__card">
                    <img src="../assets/img/card3.png" alt="" class="footer__card">
                    <img src="../assets/img/card4.png" alt="" class="footer__card">
                </div>
            </div>
        </div>

        <p class="footer__copy">&#169; Bedimcode. All rigths reserved</p>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-fill scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="../assets/js/scrollreveal.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="../assets/js/main.js"></script>
</body>
</html>