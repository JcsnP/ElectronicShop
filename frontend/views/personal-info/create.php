<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalInfo */

$this->title = 'Create Profile';
// $this->params['breadcrumbs'][] = ['label' => 'Personal Infos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
 <div class="container mt-0 pt-0">
    <!-- <div class="personal-info-create"> -->

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    <!-- </div> -->
</div>
