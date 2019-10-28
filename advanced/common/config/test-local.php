<?php
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    require(__DIR__ . '/main-local.php'),
    require(__DIR__ . '/test.php'),
    [
        'components' => [
            'db' => [
               'class' => 'yii\db\Connection',
               'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=integrada_test',
               'username' => 'postgres',
               'password' => 'postgres',
               'charset' => 'utf8',
            ]
        ],
    ]
);

