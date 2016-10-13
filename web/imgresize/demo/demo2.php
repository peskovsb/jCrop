<?php

/**
 * Квадратный кроп
 */

require_once '../AcImage.php';

//$filePath = 'img/4na3.jpg';
$savePath = 'out/'.rand(0, 1000).'.jpg';
$filePath = 'http://sadovod-proskurina.ru/assets/images/products/290/2202-(4).jpg';


$size = getimagesize ($filePath);

$x = $size[0];
$y = (int)round(465/(1200/$size[0]));

echo $x.'<br>';
echo $y;

//print_r
$image = AcImage::createImage($filePath);

$image
	->cropCenter($x, $y)
	->save($savePath);

?>

<h3>Оригинал</h3>
<img src="<?=$filePath; ?>" />

<h3>1200 x 465px</h3>
<img style="width:1200px;height:465px;" src="<?=$savePath; ?>" />