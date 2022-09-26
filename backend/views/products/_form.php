<?php

use yii\helpers\Html;
use app\models\Brand;
use app\models\Type;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'productName') ?>

    <?= $form->field($model, 'productPrice')->label("Product Price (Baht - ฿)") ?>

    <?= $form->field($model, 'productImage[0]')->label("ImageUrl 1") ?>

    <?= $form->field($model, 'productImage[1]')->label("ImageUrl 2") ?>

    <?= $form->field($model, 'productImage[2]')->label("ImageUrl 3") ?>

    <?= $form->field($model, 'productDescrip')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'inStock')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'status')->dropDownList(
        ["1" => "Active", "2" => "Inactive"],
        ['prompt' => 'Select Status']
    ) ?>

    <?php $type_items = ArrayHelper::map(Type::find()->where(['status' => '1'])->all(), 'type_id', 'typeName'); ?>
    <?= $form->field($model, 'type_id')->dropDownList(
        $type_items,
        ['prompt' => 'Select Type']
    ) ?>

    <?php $brand_items = ArrayHelper::map(Brand::find()->where(['status' => '1'])->all(), 'brand_id', 'brandName'); ?>
    <?= $form->field($model, 'brand_id')->dropDownList(
        $brand_items,
        ['prompt' => 'Select Brand']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>