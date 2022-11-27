<?php

use yii\helpers\Html;
use common\models\User;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalInfo */
/* @var $form yii\widgets\ActiveForm */
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
    </style>
</head>

<div class=" personal-info-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form
        ->field($model, "user_id")
        ->hiddenInput(["value" => (string) Yii::$app->user->identity->id])
        ->label(false) ?>
    <!-- template -->
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <?php if (!empty($model->picture)) { ?>
                                        <?= Html::img($model->picture, [
                                            "class" => "responsive",
                                            "style" => "width: 100%;",
                                        ]) ?>
                                        <h5 class="text-muted">User profile</h5>
                                    <?php } else { ?>
                                        <h3>You don't have a profile picture.</h3>
                                    <?php } ?>
                                </div>
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
                                    <?= $form
                                        ->field($model, "fname")
                                        ->label("First Name") ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <?= $form
                                        ->field($model, "lname")
                                        ->label("Last Name") ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <?= $form->field($model, "phone") ?>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <?= $form
                                        ->field($model, "gender")
                                        ->radioList([
                                            "male" => "Male",
                                            "female" => "Female",
                                            "other" => "Other",
                                        ]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-3 mb-2 text-primary">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <?= $form
                                        ->field($model, "address[0]")
                                        ->label("House number") ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <?= $form
                                        ->field($model, "address[1]")
                                        ->label("City") ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <?= $form
                                        ->field($model, "address[2]")
                                        ->label("State") ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <?= $form
                                        ->field($model, "address[3]")
                                        ->label("Postal Code") ?>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-3 mb-2 text-primary">User profile</h6>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <?= $form
                                        ->field($model, "picture")
                                        ->label("Profile Picture") ?>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-3 text-primary">Google Map</h6>
                                <h6 class="mb-2 text-secondary">ปักหมุดสถานที่ที่คุณต้องการจัดส่ง</h6>
                                <?= $form
                                    ->field($model, "address[4]")
                                    ->hiddenInput(["id" => "user_cordinates"])
                                    ->label(false) ?>
                                <div class="input-group mb-3">
                                    <input id="place" class="form-control" type="textbox" placeholder="ค้นหาสถานที่สำคัญ เช่น วัด, ตำบล, อำเภอ" />
                                    <button id="findPlace" class="btn btn-sm btn-primary ml-2" type="button">
                                        ค้นหา
                                    </button>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div id="map" style="width: 100%; height: 400px"></div>
                            </div>
                            <script>
                                var myMarker;
                                var map;

                                function initMap() {
                                    var cordinates = {
                                        lat: 13.847860,
                                        lng: 100.604274
                                    };
                                    map = new google.maps.Map(document.getElementById('map'), {
                                        center: cordinates,
                                        zoom: 16
                                    });

                                    infoWindow = new google.maps.InfoWindow;

                                    var geocoder = new google.maps.Geocoder();
                                    document.getElementById('findPlace').addEventListener('click', function() {
                                        geocoderAddress(geocoder, map);
                                    });

                                    myMarker = new google.maps.Marker({
                                        position: new google.maps.LatLng(cordinates),
                                        map: map,
                                        draggable: true
                                    });

                                    // Try HTML5 geolocation.
                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(function(position) {
                                            var pos = {
                                                lat: position.coords.latitude,
                                                lng: position.coords.longitude
                                            };

                                            infoWindow.setPosition(pos);
                                            // infoWindow.setContent('Location found. lat: ' + position.coords.latitude + ', lng: ' + position.coords.longitude + ' ');
                                            infoWindow.setContent('ที่อยู่ปัจจุบันของคุณ');
                                            infoWindow.open(map);
                                            map.setCenter(pos);
                                            myMarker.setPosition(new google.maps.LatLng(pos));
                                        }, function() {
                                            handleLocationError(true, infoWindow, map.getCenter());
                                        });
                                    } else {
                                        // Browser doesn't support Geolocation
                                        handleLocationError(false, infoWindow, map.getCenter());
                                    }

                                    google.maps.event.addListener(myMarker, 'drag', function() {
                                        var markerPosition = myMarker.position.lat().toFixed(6) + ',' + myMarker.position.lng().toFixed(6);
                                        document.getElementById('user_cordinates').value = markerPosition;
                                    });
                                }


                                // searching place on google map
                                function geocoderAddress(geocoder) {
                                    var address = document.getElementById('place').value;
                                    geocoder.geocode({
                                        'address': address
                                    }, function(results, status) {
                                        if (status === 'OK') {
                                            let location = results[0].geometry.location;
                                            map.setCenter(location);
                                            myMarker.setPosition(location);
                                        } else {
                                            alert('ไม่พบสถานที่');
                                        }
                                    })
                                }

                                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                                    infoWindow.setPosition(pos);
                                    infoWindow.setContent(browserHasGeolocation ?
                                        'Error: The Geolocation service failed.' :
                                        'Error: Your browser doesn\'t support geolocation.');
                                    infoWindow.open(map);
                                }
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoL1uFq7AAYuW5qQNg1kZIxIWfdCBc81U&callback=initMap"></script>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                        </div>
                        <div class="row gutters mt-4">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <?= Html::submitButton("Save", [
                                        "class" => "btn btn-primary btn-block",
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end template -->
    <?php ActiveForm::end(); ?>
</div>