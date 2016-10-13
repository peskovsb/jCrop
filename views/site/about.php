<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\imgresize\imgresize;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$filePath = $_SERVER['DOCUMENT_ROOT'].'/web/imgresize/demo/img/4na3.jpg';
$rndNumber = rand(0, 1000);
$savePath = $_SERVER['DOCUMENT_ROOT'].'/web/imgresize/demo/out/'.$rndNumber.'.jpg';
$image = imgresize::widget();
$image = AcImage::createImage($filePath);
$x = 100;
$y = 50;

$width = 200;
$height = 150;

$image = AcImage::createImage($filePath);

$image
	->crop($x, $y, $width, $height)
	->save($savePath);

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>
<h3>Кроп</h3>
<img src="/web/imgresize/demo/out/<?=$rndNumber; ?>.jpg" />
    <code><?= __FILE__ ?></code>
</div>
