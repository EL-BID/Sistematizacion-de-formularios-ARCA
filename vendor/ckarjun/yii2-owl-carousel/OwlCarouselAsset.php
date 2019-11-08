<?php
/**
 * @link      https://github.com/ckarjun/yii2-owlcarousel
 * @license   https://github.com/ckarjun/yii2-owlcarousel/blob/master/LICENSE.md
 */
namespace ckarjun\owlcarousel;

use yii\web\AssetBundle;

/**
 * Asset Bundle for Owl Carousel Widget
 * 
 * @author Arjun C K <ckarjun5@gmail.com>
 */
class OwlCarouselAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $css = [
        'css/owl.carousel.css',
        'css/owl.theme.css',
    ];
    
    /**
     * @inheritdoc
     */
    public $js = [
        'js/owl.carousel.js',
    ];
    
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
}
