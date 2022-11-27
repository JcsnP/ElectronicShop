<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CouponsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupons-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'coupon_id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'minimum_price') ?>

    <?= $form->field($model, 'discount_amount') ?>

    <?php // echo $form->field($model, 'discount_type') 
    ?>

    <?php // echo $form->field($model, 'status') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>