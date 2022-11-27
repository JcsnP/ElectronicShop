<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coupons */

$this->title = 'Update Coupons: ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->code, 'url' => ['view', '_id' => (string) $model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coupons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
