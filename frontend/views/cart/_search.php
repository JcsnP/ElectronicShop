<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CartSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cart-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="input-group">
        <?= Html::activeTextInput($model, 'q', ['class' => 'form-control', 'placeholder' => 'ค้นหาข้อมูล...']) ?>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-default']) ?>
        </span>
    </div>

    <?php ActiveForm::end(); ?>

</div>