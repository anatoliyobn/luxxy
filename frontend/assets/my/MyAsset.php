<?php
namespace frontend\assets\my;

use yii\web\AssetBundle;

/**
 * Asset bundle for main page
 */
class MyAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/my';
    public $css = [
    ];
    public $js = [
        'js/my.js'
    ];

    public $publishOptions = [
        'forceCopy' => true,
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];
}