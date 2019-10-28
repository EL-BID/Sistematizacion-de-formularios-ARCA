<?php

namespace uran1980\yii\widgets\pace;

use yii\helpers\Json;

class Pace extends \yii\base\Widget
{
    public $color       = 'blue';
    public $theme       = 'flash';
    public $paceOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ( !empty($this->paceOptions) ) {
            $this->view->registerJs('window.paceOptions = ' . Json::encode($this->paceOptions), \yii\web\View::POS_HEAD);
        }

        $bundle = PaceAsset::register($this->view);
        $bundle->css = [
            "themes/{$this->color}/pace-theme-{$this->theme}.css",
        ];
    }
}
