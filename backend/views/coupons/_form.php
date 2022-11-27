<?php

use app\models\CouponsType;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Coupons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'coupon_id')->label('Coupon ID (ct-xx)') ?>

    <?= $form->field($model, 'code')->label('Code (โค้ดส่วนลด)') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'minimum_price')->label('Minimum Price (ยอดรวมขั้นต่ำ)') ?>

    <?= $form->field($model, 'discount_amount')->label('Discount Amount (จำนวนที่ลด หากเป็นลดด้วยเปอร์เซ็นให้ใส่ 1-100)') ?>

    <?php $type_items = ArrayHelper::map(CouponsType::find()->where(['status' => '1'])->all(), 'coupons_type_id', 'title'); ?>
    <?= $form->field($model, 'discount_type')->dropDownList(
        $type_items,
        ['prompt' => 'Select Coupon Type']
    )->label('Discount Type (Percentage = ลดเป็นเปอร์เซ็น, Fixed Price = ลดด้วยราคา)') ?>

    <?= $form->field($model, 'status')->dropDownList(
        ["1" => "Active", "2" => "Inactive"],
        ['prompt' => 'Select Status']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>