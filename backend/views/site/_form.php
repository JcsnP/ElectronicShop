<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password_hash')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'role')->dropDownList(
        ["admin" => "Admin", "user" => "User"],
        ['prompt' => 'Select Role']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>