<?php
use yii\helpers\Html;
//print_r($model);

echo HTML::a($model->title,[
             'news/view' , 'id' => $model->id
        	]);