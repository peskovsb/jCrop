<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ResizeImg;
use yii\web\ForbiddenHttpException;
use app\models\Post;

class SiteController extends Controller
{


   /* public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                throw new ForbiddenHttpException('Access denied');
                }, 
                'only' => ['about'],
                'rules' => [ 
                    [
                        'actions' => ['about'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ], 
                ],
            ],
        ];
    }*/

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $im = new ResizeImg(\Yii::getAlias("@app/web").'/img/chalenger.jpg');
        $model = new \app\models\UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFiles = \yii\web\UploadedFile::getInstances($model, 'imageFiles');
echo '<pre>';print_r($model->imageFiles); echo '</pre>';
            foreach($model->imageFiles as $value){
                echo $value->extension.'<br />';
            }

            /*if ($model->upload()) {
                return;
            }*/
        }
        $centreX = round($im->getWidth() / 2);
        $centreY = round($im->getHeight() / 2);

        $getSquare = round($im->getHeight() / 2);

        $x1 = $centreX - $centreY;
        $y1 = $centreY - $centreY;

        $x2 = $centreX + $centreY;
        $y2 = $centreY + $centreY;

        /*$x1 = $getSquare - $getSquare;
        $x2 = $getSquare - $getSquare;
        $y1 = $getSquare - $getSquare;
        $y2 = $getSquare - $getSquare;*/

        $im->crop($x1, $y1, $x2, $y2);
        $im->save(\Yii::getAlias("@app/web").'/img/cropped/somefile'.rand(10,1000).'.jpg');

        print_r(Yii::$app->user->identity);
        return $this->render('index',[
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
         /*   if (Yii::$app->user->can('UpdateOwnPost', ['post' => 2])) {
                return $this->render('about');
         }else{
            throw new ForbiddenHttpException('Access denied');
         }*/
         return $this->render('about');
    }
}
