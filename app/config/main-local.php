<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ljkN9MvX6Ibu-HzXQMLh5FobKkeIfXX7',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
//    $_config['bootstrap'][] = 'debug';
//    $_config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//        'allowedIPs' => ['127.0.0.1', '::1', '192.168.51.*']
//    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.51.*']
    ];
}

return $config;
