<?php
use yii\grid\GridView;




yii\widgets\Pjax::begin();
//echo '<pre>';print_r($simpleFilterData); echo '</pre>';


  echo GridView::widget([
        'dataProvider' => $simpleFilterData,   
        //'filterModel' => $searchModel, 
        //'layout'=>"{sorter}",    
    ]); 

yii\widgets\Pjax::end();