<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CouponsType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupons-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'coupons_type_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'status')->dropDownList(
        ["1" => "Active", "2" => "Inactive"],
        ['prompt' => 'Select Status']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>