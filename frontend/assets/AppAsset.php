<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css?v3',
	'css/basic.css?v4',
        '../web/css/alertify.min.css',
        '../web/css/themes/default.min.css',
    ];
     public $js = [
	'js/yiioverride.js?v=1',
         '../web/js/alertify.min.js',
         '../web/js/funcionesjs.js',
   ];
    public $depends = [
	'app\assets\SweetAlertAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
		
    ];

}
