<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->_id;
// $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php 
    $form = ActiveForm::begin(); ?> 
                <!--================Single Product Area =================-->
                <div class="product_image_area section_padding">
                    <div class="container">
                    <div class="row s_product_inner justify-content-between">
                        <div class="col-lg-7 col-xl-7">
                        <div class="product_slider_img">
                            <div id="vertical">
                                <div data-thumb="<?=$model->productImage[0] ?>">
                                    <img src="<?=$model->productImage[0] ?>" />
                                </div>
                                <div data-thumb="<?=$model->productImage[1] ?>">
                                    <img src="<?=$model->productImage[1] ?>" />
                                </div>
                                <div data-thumb="<?=$model->productImage[2] ?>">
                                    <img src="<?=$model->productImage[2] ?>" />
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                        <div class="s_product_text">
                            <h5>previous <span>|</span> next</h5>
                            <h3><?=$model->productName ?></h3>
                            <h2>$<?=$model->productPrice ?></h2>
                            <ul class="list">
                            <!-- <li>
                                <a class="active" href="#">
                                <span>Category</span> : <?= $model->type_id ?></a>
                            </li> -->
                            <li>
                                <a href="#"> <span>In Stock</span> : <?=$model->inStock?></a>
                            </li>
                            </ul>
                            <p>
                            <?=$model->productDescrip?>
                            </p>
                            <div class="card_area d-flex justify-content-between align-items-center">
                            <div class="product_count">
                                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                <input class="input-number" type="text" value="1" min="0" max="10">
                                <span class="number-increment"> <i class="ti-plus"></i></span>
                            </div>
                            <a href="#" class="btn_3">add to cart</a>
                            <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!--================End Single Product Area =================-->
<?php ActiveForm::end(); ?> 
