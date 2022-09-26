<?php

use app\models\Products;
use app\models\Brand;
use app\models\Type;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'ElectronicShop';
$product = Products::find()->where(['status' => '1'])->all();
$brand = Brand::find()->where(['status' => '1'])->all();
$type = Type::find()->where(['status' => '1'])->all();
$brandName;
?>

<!-- product_list part start-->
<!-- New Products -->
<section class="product_list best_seller" style="margin: 0px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>New Products</h2>
                    <?= Html::a('ชมสินค้าทั้งหมด >', ['/site/all-product'], ['class' => 'h5']) ?>
                </div>
            </div>
        </div>
        <div class=" row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    $newProducts = array_slice($product, 0, 6);
                    foreach ($newProducts as $index => $item) { ?>
                        <div class="single_product_item">
                            <div style="height: 220px;">
                                <img src="<?= $item->productImage[1] ?>" alt="">
                            </div>
                            <div class="single_product_text mt-5" style="height: 270px;">
                                <h4><?= $item->productName ?></h4>
                                <?php $brandName = Brand::find()->where(['brand_id' => $item->brand_id])->one()->brandName; ?>
                                <p><?= $brandName ?></p>
                                <div class="d-flex justify-content-between">
                                    <b style="color: #F1574F;">
                                        ฿ <?= number_format($item->productPrice) ?>
                                    </b>
                                    <!-- price before discount -->
                                    <b style="color: #BDBDBD; text-decoration: line-through;">
                                        ฿ <?= number_format($item->productPrice + 2000) ?>
                                    </b>
                                </div>
                                <p><?= strlen($item->productDescrip) > 50 ? mb_substr($item->productDescrip, 0, 50, 'UTF-8') . "..." : " " ?></p>
                            </div>
                            <a href="index.php?r=products/view&_id=<?= $item->product_id ?>" class="btn btn-warning btn-sm btn-block mt-2">More Detail</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->

<!-- Shop by Type -->
<div class="container">
    <div class="section_tittle text-left">
        <h2>Shop by types</h2>
        <h5 class="text-secondary h5">เลือกชมสินค้าตามประเภท</h5>
    </div>
    <div class="row">
        <?php foreach ($type as $index => $item) {
            $model = Products::find()->where(['type_id' => $item->type_id])->one();
            // Traps errors if the product can't be found.
            // if not found, skip it
            if (empty($model)) {
                continue;
            }
        ?>
            <div class="col-md-3 col-6 card-hover" style="margin-bottom: 4em;">
                <!-- card item -->
                <a href="index.php?r=site/shop-by-type&type_id=<?= $item->type_id ?>">
                    <div class="single_product_model">
                        <div style="height: 220px;">
                            <img src="<?= $model->productImage[0] ?>" alt="">
                        </div>
                        <div class="single_product_text mt-5 text-center">
                            <a href="index.php?r=site/shop-by-type&type_id=<?= $item->type_id ?>" class="pt-2" id="shopbybrand">
                                <h3><?= $item->typeName ?></h3>
                            </a>
                        </div>
                    </div>
                </a>
                <!-- end of card item -->
            </div>
        <?php } ?>
    </div>
</div>
<!-- end Shop by Type -->

<!-- product_list part start-->
<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Shop by brands</h2>
                    <h5 class="text-secondary h5">เลือกชมสินค้าตามแบรนด์</h5>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php foreach ($brand as $index => $item) { ?>
                        <div class="single_product_item">
                            <a href="index.php?r=site/shop-by-brand&brand_id=<?= $item->brand_id ?>">
                                <div style="height: 100px;">
                                    <img src="<?= $item->brandImage ?>" alt="">
                                </div>
                                <div class="single_product_text">
                                    <a href="index.php?r=site/shop-by-brand&brand_id=<?= $item->brand_id ?>" class="pt-2" id="shopbybrand">
                                        <h4><?= $item->brandName ?></h4>
                                    </a>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->