<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,   
        'filterModel' => $searchModel, 
        'layout'=>"{sorter}",    
    ]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list_item',['model' => $model]);
        },

        /*'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],*/
    ]); ?>
</div>
