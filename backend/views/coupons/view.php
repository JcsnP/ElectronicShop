<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Coupons */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coupons-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', '_id' => (string) $model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', '_id' => (string) $model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'coupon_id',
            'code',
            'description',
            'minimum_price',
            'discount_amount',
            'discount_type',
            'status',
        ],
    ]) ?>

</div>
