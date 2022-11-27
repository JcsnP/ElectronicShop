<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CouponsType */

$this->title = 'Update Coupons Type: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Coupons Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', '_id' => (string) $model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coupons-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
