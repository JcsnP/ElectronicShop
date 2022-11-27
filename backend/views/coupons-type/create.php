<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CouponsType */

$this->title = 'Create Coupons Type';
$this->params['breadcrumbs'][] = ['label' => 'Coupons Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupons-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
