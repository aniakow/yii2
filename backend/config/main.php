<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'FirstComponent'=>[
            'class'=>'backend\components\FirstComponent',
        ],
        'assetManager' => [
            'converter' => [
                'class' => 'cakebake\lessphp\AssetConverter',
                'compress' => true, // Optional: You can tell less.php to remove comments and whitespace to generate minimized css files.
                'useCache' => true, // Optional: less.php will save serialized parser data for each .less file. Faster, but more memory-intense.
                //'cacheDir' => null, // Optional: is passed to the SetCacheDir() method. By default "cakebake\lessphp\runtime" is used.
                'cacheSuffix' => true, // Optional: Filename suffix to avoid the browser cache and force recompiling by configuration changes
            ],
        ],
    ],
    'params' => $params,
];
