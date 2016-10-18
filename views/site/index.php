<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use app\helpers\ImgHelper;

//ImgHelper::cropImg('/img/ferrary.jpg','281','211');

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;




?>

<link rel="stylesheet" type="text/css" href="/web/ajaxtest/css/imgareaselect-default.css" />
<script type="text/javascript" src="/web/ajaxtest/scripts/jquery.imgareaselect.js"></script>

<div class="site-index">
<?php yii\widgets\Pjax::begin() ?>
    <?php
    if($model->imageFiles){
        foreach($model->imageFiles as $value){
            echo '<img width="150" src="/web/img/cropped/half_'.$value->name.'">';
        }
    }

    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','data-pjax' => true]]);
    echo $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*', 'onchange'=>'this.form.submit();']);
    echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary','style'=>'display:none;']);
    ActiveForm::end();
    ?>
<?php Pjax::end(); ?>
    <a id="Link1">Ajax1</a>
    <a id="Link2">Ajax2</a>
    <br />

    <!-- Кнопка, вызывающее модальное окно -->
    <!-- HTML-код модального окна -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Заголовок модального окна</h4>
                </div>
                <!-- Основное содержимое модального окна -->
                <div class="modal-body">
                    <div style="position:relative;" id="imParent">
                        <img id="imgcontainer" style="max-width:500px;" src="">
                    </div>
                </div>
                <!-- Футер модального окна -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>

<img src="crops/52346f315d919107d4083b8d5d49f881.jpg">
    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>

