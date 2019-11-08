<?php

namespace uran1980\yii\widgets\pace;

/**
 * Pace will automatically monitor your ajax requests, event loop lag,
 * document ready state, and elements on your page to decide the progress.
 * On ajax navigation it will begin again!
 *
 * @see http://github.hubspot.com/pace/
 */
class PaceAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/pace';
    public $css = [
        'themes/blue/pace-theme-flash.css',
    ];
    public $js = [
        'pace.min.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,
    ];
}
