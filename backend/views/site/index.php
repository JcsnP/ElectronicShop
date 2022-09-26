<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\DetailView;
/** @var yii\web\View $this */

$this->title = 'AdminPanel';
?>
<div class="site-index">
    

    <!-- <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Welcom to AdminPanel For Manage Website!</h1>
    </div> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // '_id',
            'username',
            // 'password_hash',
            'email',
            'role',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    // var_dump($model->role);
                    return Url::toRoute([$action, '_id' => (string) $model->_id]);
                    
                 }
            ],
        ],
    ]); ?>

    
</div>
