<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\models\Products;
use app\models\Brand;
use app\models\Type;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

// change page title to product name
// $this->title = $model->_id;
$this->title = $model->productName . " - Electronic Shop";

// $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

// variables
$product = Products::find()->where(['status' => '1'])->all();
$brandName;
$typeName;
$quantity=1;
?>
<?php
$form = ActiveForm::begin(); ?>
<header>
    <link rel="stylesheet" href="../../theme/css/custom.css">
</header>

<div class="container">
    <div class="alert alert-dark w-100" role="alert" style="background-color: #F8F9FA;">
        <div class="d-flex justify-content-between">
            <?= Html::a('< กลับไปหน้าหลัก', ['/site/index'], ['class' => 'text-dark']) ?>
            <?= Html::a('ไปยังตะกร้าสินค้า >', ['/cart/index'], ['class' => 'text-dark']) ?>
        </div>
    </div>
</div>

<!--================Single Product Area =================-->
<div class="product_image_area section-padding-custom">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-6 col-xl-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src="<?= $model->productImage[0] ?>" style="height: 300px; margin: auto;">
                        </div>
                        <?php foreach (array_slice($model->productImage, 1) as $index => $item) { ?>
                            <div class="carousel-item">
                                <img class="d-block" src="<?= $item ?>" style="height: 300px; margin: auto;">
                            </div>
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" style="filter: invert(100%);" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" style="filter: invert(100%);" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="s_product_text">
                    <h3><?= $model->productName ?></h3>
                    <label style="text-decoration: line-through; color: #02B29A;">
                        ราคาปกติ ฿ <?= number_format($model->productPrice + 2000) ?>
                    </label>
                    <h2>
                        <div class="d-flex">
                            <span class="badge bg-secondary mr-4 text-light bg-danger">
                                - 20%
                            </span>
                            ฿ <?= number_format($model->productPrice) ?>
                        </div>
                    </h2>
                    <ul class="list">
                        <!-- <li>
                            <a class="active" href="#">
                            <span>Category</span> : <?= $model->type_id ?></a>
                        </li> -->
                        <!-- brand -->
                        <li>
                            <?php $brandName = Brand::find()->where(['brand_id' => $model->brand_id])->one()->brandName; ?>
                            <a href="#">
                                <span>Brand</span> : <?= $brandName ?>
                            </a>
                        </li>
                        <!-- type -->
                        <li>
                            <?php $typeName = Type::find()->where(['type_id' => $model->type_id])->one()->typeName; ?>
                            <a href="#">
                                <span>Type</span> : <?= $typeName ?>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>In Stock</span> : <?= $model->inStock ?>
                            </a>
                        </li>
                    </ul>
                    <p>
                        <?= $model->productDescrip ?>
                    </p>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <div class="product_count">
                                <?php echo $form->field($cartModel, 'quantity',[
                                'options' => [
                                    'tag' => 'div',
                                    'class' => 'input-number',
                                ]])->textInput(['type'=>'number','min' => 0, 'max' => 10, 'step' => 1,'value' => $quantity ])->label(false);?>
                                <!-- <input class="input-number" type="text"value="1" min="0" max="10" name="qty"> -->
                        </div>
                        <?php
                        if (Yii::$app->user->isGuest) { ?>
                            <a href="index.php?r=site%2Flogin" class="btn_3 w-100 text-center">Add to Cart</a>
                        <?php } else {
                            echo $form->field($cartModel, 'product_id')->hiddenInput(['value' => $product_id])->label(false);
                            echo $form->field($cartModel, 'price')->hiddenInput(['value' => $model->productPrice])->label(false);
                            echo $form->field($cartModel, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false);
                            // echo $form->field($cartModel, 'quantity')->hiddenInput(['value' => $quantity ])->label(false);
                            echo Html::submitButton('Add to cart', ['class' => 'btn_3 w-100 text-center']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!-- New Products -->
<section class="product_list best_seller section_padding" style="background-color: #F8F9FA;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>สินค้าอื่นๆ ที่คุณอาจสนใจ</h2>
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
                                <img src="<?= $item->productImage[1] ?>" style="background-color: transparent !important" alt="">
                            </div>
                            <div class="single_product_text mt-5" style="height: 270px;">
                                <h4><?= $item->productName ?></h4>
                                <?php $brandName = Brand::find()->where(['brand_id' => $model->brand_id])->one()->brandName; ?>
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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<?php ActiveForm::end(); ?>