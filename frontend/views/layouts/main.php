<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--CSS-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../theme/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../../theme/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../../theme/css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../../theme/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../../theme/css/flaticon.css">
    <link rel="stylesheet" href="../../frontend/web/css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../../theme/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../../theme/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../../theme/css/style.css">

    <!-- custom css -->
    <link rel="stylesheet" href="../../theme/css/custom.css">

    <!-- google font -->
    <style>
        /* Change font here */
        @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,400;0,500;0,600;0,700;0,800;1,800&display=swap');

        * {
            font-family: 'Prompt', sans-serif !important;
        }
    </style>
    <!-- icon change favicon here --> 
    <?php
        $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => 'https://cdn-icons-png.flaticon.com/512/2985/2985698.png']);
    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header style="border-bottom: 2px solid #0000005c;">
        <div class="tiny-header">
            <div class="container">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <div>
                            สินค้าทุกชิ้นมีการรับประกัน, ซื้อวันนี้แถมฟรีคู่มือการใช้งาน
                        </div>
                        <div>
                            <?php
                            if (!Yii::$app->user->isGuest) {
                                echo "Hello " . Yii::$app->user->identity->username;
                            } else {
                                echo "กรุณาเข้าสู่ระบบก่อนซื้อสินค้า";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        NavBar::begin([
            'brandLabel' => "<h1 class='custom-brand-label'>Electronic Shop</h1>",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                // 'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top'
                'class' => 'navbar navbar-expand-lg navbar-light bg-light',
            ]
        ]);
        ?>
        <?php
        // php header replace here
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'All Products', 'url' => ['site/all-product']],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = ['label' => 'Profile', 'url' => ['personal-info/index']];
            $menuItems[] = ['label' => 'Cart', 'url' => ['/cart/index']];
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    // 'Logout (' . Yii::$app->user->identity->username . ')',
                    'Logout ',
                    ['class' => 'btn btn-warning btn-sm mt-1 ml-4']
                )
                . Html::endForm()
                . '</li>';
        }
        ?>
        <?php
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto '],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <!-- container -->
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
        </div>

        <!-- /container -->
        <?= $content ?>
    </main>
    <!--::footer_part start::-->
    <footer class="footer_part" style="background-color: #F8F9FA; border-top: 2px solid #0000005c;">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Top Products</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Managed Website</a></li>
                            <li><a href="">Manage Reputation</a></li>
                            <li><a href="">Power Tools</a></li>
                            <li><a href="">Marketing Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Features</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Resources</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Guides</a></li>
                            <li><a href="">Research</a></li>
                            <li><a href="">Experts</a></li>
                            <li><a href="">Agencies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Newsletter</h4>
                        <p>Heaven fruitful doesn't over lesser in days. Appear creeping
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">subscribe</button>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <?= Yii::powered() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <?php $this->endBody() ?>
</body>

<!--Script-->
<!-- jquery plugins here-->
<script src="../../theme/js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="../../theme/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="../../theme/js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="../../theme/js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="../../theme/js/swiper.min.js"></script>
<!-- swiper js -->
<script src="../../theme/js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="../../theme/js/owl.carousel.min.js"></script>
<script src="../../theme/js/jquery.nice-select.min.js"></script>
<!-- slick js -->
<script src="../../theme/js/slick.min.js"></script>
<script src="../../theme/js/jquery.counterup.min.js"></script>
<script src="../../theme/js/waypoints.min.js"></script>
<script src="../../theme/js/contact.js"></script>
<script src="../../theme/js/jquery.ajaxchimp.min.js"></script>
<script src="../../theme/js/jquery.form.js"></script>
<script src="../../theme/js/jquery.validate.min.js"></script>
<script src="../../theme/js/mail-script.js"></script>
<!-- custom js -->
<script src="../../theme/js/custom.js"></script>


</html>
<?php $this->endPage(); ?>