<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CouponsTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coupons Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupons-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Coupons Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'coupons_type_id',
            'title',
            'description',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, '_id' => (string) $model->_id]);
                 }
            ],
        ],
    ]); ?>


</div>
