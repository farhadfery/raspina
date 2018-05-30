<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

use \yii\web\Request;
$baseUrl = (new Request)->getBaseUrl();
return [
    'id' => 'app',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'home' => [
            'class' => 'app\modules\home\home',
        ],
        'user' => [
            'class' => 'app\modules\user\user',
        ],
        'post' => [
            'class' => 'app\modules\post\post',
        ],
    ],
    'components' => [
        'assetManager' => [
            'basePath' => '@webroot/web/assets',
            'baseUrl' => '@web/web/assets',
        ],
        'request' => [
            'baseUrl' => $baseUrl,
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'app\modules\user\models\dashboard\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/default/login'],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'pattern' => '<app>/<module>',
                    'route' => '<module>',
                ],
                [
                    'pattern' => '<app>/<module>/<controller>',
                    'route' => '<module>/<controller>',
                ],
                [
                    'pattern' => '<app>/<module>/<controller>/<action>',
                    'route' => '<module>/<controller>/<action>',
                ],
            ]
        ],
    ],
    'params' => $params,
];
