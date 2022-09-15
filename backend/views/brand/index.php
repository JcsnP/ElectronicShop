<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Brand', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // '_id',
            'brand_id',
            'brandName',
            [
                'attribute' => 'brandImage',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'img-fluid text-center'],
                'format' => ['image', ['width' => '80px']],
                'value' => function ($model) {
                    return ($model->brandImage);
                }
            ],
            // 'brandImage',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    $text = "";
                    if ($model->status == "1") {
                        $text = "Active";
                    } else {
                        $text = "Inactive";
                    }
                    return "<i>" . $text . "</i>";
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, '_id' => (string) $model->_id]);
                 }
            ],
        ],
    ]); ?>


</div>
