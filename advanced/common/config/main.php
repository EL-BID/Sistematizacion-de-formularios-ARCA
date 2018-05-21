<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
        'class' => 'yii\i18n\Formatter',
        'nullDisplay' => '',
        ],
    ],
    'modules' => [
        'redactor' => [
           'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/uploadfolder',
            'uploadUrl' => '@web/uploadfolder',
            'imageAllowExtensions'=>['jpg','png','gif']
        ],
        
        //Agregando nuevo CRUD =================================================
        'gii' => [
           'class'=>'yii\gii\Module',
           'generators' => [
                'crud' => [
                    'class' => 'yii\gii\generators\crudARCA\Generator',
                    'templates' => ['arcaCrud' => '@vendor/yiisoft/yii2-gii/generators/crudARCA/default']
                 ],
                'model' => [
                    'class' => 'yii\gii\generators\modelARCA\Generator',
                    'templates' => ['arcaModel' => '@vendor/yiisoft/yii2-gii/generators/modelARCA/default/']
                ]
            ],
        ],
    ],
];
