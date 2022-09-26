<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\PersonalInfo;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Personal Infos';
// $this->params['breadcrumbs'][] = $this->title;
?>

<head>
    <style>
        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .form-group {
            border-top: 1px solid #2e323c45;
        }

        .form-group p {
            font-weight: 600;
        }
    </style>
</head>

<div class="container">
    <?php foreach ($user as $model) :
        // var_dump($model);
        $personal = PersonalInfo::find()->where(["user_id" => (string)Yii::$app->user->identity->id])->one();
        if (empty($personal)) { ?>
            <!-- start -->
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="https://www.clipartmax.com/png/full/136-1367245_people-shrug-clipart.png" style="width: 180px;">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div class="jumbotron text-left bg-transparent mt-0 pt-0">
                        <h1 class="display-4">You don't have any personal information. !</h1>

                        <p><?php echo Html::a('Create Profile', ['create'], ['class' => 'btn btn-success btn-block']); ?></p>
                    </div>
                </div>
            </div>
            <!-- end -->
        <?php } else { ?>
            <!-- template content -->

            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <?php
                                        if (!empty($personal->picture)) { ?>
                                            <?= Html::img($personal->picture, ['class' => 'responsive', 'style' => 'width: 100%;']); ?>
                                        <?php } else { ?>
                                            <h3>You don't have a profile picture.</h3>
                                        <?php } ?>
                                    </div>
                                    <h5 class="user-name">
                                        <?= $personal->fname ?>
                                        <?= $personal->lname ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <p>Firstname</p>
                                        <?= $personal->fname ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <p>Lastname</p>
                                        <?= $personal->lname ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <p>Phone</p>
                                        <?= $personal->phone ?>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <p>Gender</p>
                                        <?= $personal->gender ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <p>House Number</p>
                                        <?= $personal->address[0] ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <p>City</p>
                                        <?= $personal->address[1] ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <p>State</p>
                                        <?= $personal->address[2] ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <p>Postal Code</p>
                                        <?= $personal->address[3] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">User profile</h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <p>Profile picture</p>
                                        <?php
                                        if (strlen($personal->picture) > 150)
                                            echo mb_substr($personal->picture, 0, 150, 'UTF-8') . "......";
                                        else
                                            echo $personal->picture;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <?= Html::a('Edit profile', ['update', '_id' => (string) $personal->_id], ['class' => 'btn btn-primary mb-3 btn-block']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php endforeach; ?>
</div>