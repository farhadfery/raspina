<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    private $_user;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
//            'captcha' => [
//                'class' => 'developit\captcha\CaptchaAction',
//                'type' => 'numbers',
//                'minLength' => 4,
//                'maxLength' => 4,
//            ],
            'login-captcha' => [
                'class' => 'developit\captcha\CaptchaAction',
                'type' => 'numbers',
//                'width' => '120',
//                'height' => '34',
                'backColor' => 0x5292c6,
                'foreColor' => 0xFFFFFF,
                'minLength' => 5,
                'maxLength' => 5,
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'error')
        {
            if (Yii::$app->user->isGuest)
            {
                return Yii::$app->getResponse()->redirect(Url::to(\Yii::$app->getUser()->loginUrl))->send();
            }
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
