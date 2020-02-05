<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'name' => 'Admin panel',
    'homeUrl' => '/admin',
    'defaultRoute' => 'books/index',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'errorAction' => 'books/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'books/view/<id:\d+>' => 'books/view',
                'books/update/<id:\d+>' => 'books/update',
                'books/delete/<id:\d+>' => 'books/delete',
                'authors/view/<id:\d+>' => 'authors/view',
                'authors/update/<id:\d+>' => 'authors/update',
                'authors/delete/<id:\d+>' => 'authors/delete',
                'book-relation-author/index/<id_book:\d+>' => 'book-relation-author/index',
                'book-relation-author/create/<id_book:\d+>' => 'book-relation-author/create',
            ],
        ],
    ],
    'params' => $params,
];
