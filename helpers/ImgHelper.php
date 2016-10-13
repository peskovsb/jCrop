<?php

namespace app\helpers;

use Yii;
use yii\helpers\Url;
use Imagine\Image\Point;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\helpers\BaseFileHelper;



class ImgHelper extends BaseFileHelper
{

    private static $nativeWidth;
    private static $nativeHeight;
    private static $cropName;

    /**
     *
     * Проверяет наличия .crop файла картинки с переданными высотой и шириной,
     * если соответствующая картинка присутствует в web/crops, то возвращает к ней путь,
     * если нет то запускает ее создание.
     *
     * @author Maxim Shablinskiy
     * @date 30.09.2016
     * @param string $path путь к картинке
     * @param int $height Требуемая высота картинки
     * @param int $width Требуемая ширина картинки
     * @param string $alt Путь к альтернативной картинке
     * @return boolean
     */
    public static function cropImg($path, $width, $height, $alt = '')
    {

        ImgHelper::createDirectory(Yii::getAlias("@app/web/crops/"));
        self::$cropName = md5($width.$height.$path);
        if(is_file(Yii::getAlias("@app/web/crops/".self::$cropName.'.crop'))) {
            return Yii::getAlias("@web/crops/".self::$cropName.'.crop');
        } else {

            if(Url::isRelative($path)) {
                if(is_file(Yii::getAlias('@app/web'.$path))) {
                    $path = Yii::getAlias('@app/web'.$path);
                }else {
                    return $alt;
                }
            }else {
                $urlHeaders = @get_headers($path);
                if(!(strpos($urlHeaders[0], '200') and strpos($urlHeaders[3], 'image'))) {
                    return $alt;
                    //$path = Yii::getAlias('@app/web/images/711logo.jpg');
                }
            }

            $size = getimagesize($path);
            self::$nativeWidth = $size[0];
            self::$nativeHeight = $size[1];

            return self::changeProportion($path, $height, $width);

        }

    }

    /**
     *
     * Учитывая требования к размерам картинки и размеры самой картинки, производит обрезку сторон для достижения
     * пропорциональности с требуемым размером.
     *
     * @author Maxim Shablinskiy
     * @date 30.09.2016
     * @param string $path путь к картинке
     * @param int $height Требуемая высота картинки
     * @param int $width Требуемая ширина картинки
     * @return boolean
     */
    private static function changeProportion($path, $height, $width) {
        $prHeight = $height/($width/self::$nativeWidth);
        $prWidth = $width/($height/self::$nativeHeight);
        if ($prHeight < self::$nativeHeight) {
            $prWidth = self::$nativeWidth;
            $pointX = 0;
            $pointY = abs($prHeight-self::$nativeHeight)/2;
        } elseif($prWidth < self::$nativeWidth) {
            $prHeight = self::$nativeHeight;
            $pointX = abs($prWidth-self::$nativeWidth)/2;
            $pointY = 0;
        }

        //return $prWidth.'<br>'.$prHeight.'<br>'.$pointX.'<br>'.$pointY;
        $imgObj = Image::getImagine()->open($path);
        $imgObj->crop(new Point($pointX, $pointY), new Box($prWidth, $prHeight));
        if(self::$nativeWidth > $width and self::$nativeHeight > $height) $imgObj->resize(new Box($width, $height));
        $imgObj->save(Yii::getAlias("@app/web/crops/".self::$cropName.'.jpg'), ['quality' => 100]);
        return Yii::getAlias("@web/crops/".self::$cropName.'.crop');
    }



}