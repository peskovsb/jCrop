<?php
namespace app\components\imgresize;

use yii\helpers\HtmlPurifier;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use Yii;
use yii\helpers\Url;
use app\models\Review;


class imgresize extends Widget
{
    public $reviews;

    public function init()
    {
        //parent::init();

        $filePath = '/web/imgresize/demo/img/4na3.jpg';
        require_once 'AcImage.php';
    }
}