<?php
return [
    'bootstrap' => ['log'],
    'components' => [
        'log' =>[
            //'flushInterval' => 1,
            'targets' =>[           //ERRORES ==================================
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning','info'],
                    //'exportInterval' => 1, // <-- and here
                ],
                [   
                    //DEPURACION================================
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['trace'],
                    'categories' => ['DEBUG'],
                    'logFile' => '@app/runtime/logs/debug.log', //Aqui se guardan las depuraciones
                ],
            ]
        ],
         'db4' => [
            'class' => 'yii\db\Connection',
            //'dsn' => 'pgsql:host=192.168.10.114;port=5432;dbname=integrada_114',
            //'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=pruebas1_formulario',            
	    'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=integrada_pruebas',            
            'username' => 'postgres',
            'password' => 'clave123',
            'charset' => 'utf8',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            //'dsn' => 'pgsql:host=192.168.10.114;port=5432;dbname=integrada_114',            
            'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=integrada_pruebas',                    
            'username' => 'postgres',
            'password' => 'clave123',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class'         => 'Swift_SmtpTransport',
                    'host'          => 'smtp.gmail.com',
                    'username'      => 'huygvtfr654@gmail.com',
                    'password'      => '7kjhgf65',
                    'port'          => '587',
                    'encryption'    => 'tls', 
                'streamOptions' => [
                    'ssl' => [
                        'verify_peer' => false,
                        'allow_self_signed' => true
                    ],
                ],
            ],
        ],
	],
];
