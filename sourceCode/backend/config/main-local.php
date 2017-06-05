<?php

$config = [

    'controllerMap' => [
        'fm' => [
            'class' => 'mihaildev\elfinder\PathController',
            'root' => [
                'baseUrl'=>'/frontend/web/store',
                'basePath'=>'@store',
                'path' => 'media',
                'name' => 'Media',
                'options' => [
                ],
            ]
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '8wDN0TUGO4WvPUwQwKzeuZ2j3f7aMw9j',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
