<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalInfo */

if (empty($model->fname)) {
    $this->title = 'Update Personal Info: ' . $model->_id;
} else {
    $this->title = 'Update Personal Info: ' . $model->fname;
}

$this->params['breadcrumbs'][] = ['label' => 'Personal Infos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', '_id' => (string) $model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
    <div class="personal-info-update">

        <h1>
            <?= Html::encode($this->title); ?>
        </h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>