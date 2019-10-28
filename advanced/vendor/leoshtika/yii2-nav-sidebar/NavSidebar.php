<?php

namespace leoshtika\bootstrap;

use yii\base\Widget;
use yii\helpers\Url;

/**
 * A custom bootstrap sidebar nav menu
 *
 * @author: Leonard Shtika <leonard@shtika.info>
 */
class NavSidebar extends Widget
{
    public $items = [];

    public function init()
    {
        parent::init();
        //  Any code that normalizes the widget properties
    }
    
    public function run()
    {
        $navHtml = '<ul class="nav nav-sidebar">';
        
        foreach ($this->items as $item) {
            if (\Yii::$app->controller->route == trim($item['url'][0], '/')) {
                $activeMenu = ' active';
            } else {
                $activeMenu = '';
            }
            
            $navHtml .= '<li class="item'.$activeMenu.'"><a href = "'.Url::to($item['url']).'">';
            $navHtml .= '<i data-toggle="tooltip" data-placement="right" title="'.$item['label'].'" class="glyphicon glyphicon-'.$item['icon'].'"></i>';
            $navHtml .= '<span class="nav_label hidden-sm">'.$item['label'].'</span>';
            if (isset($item['badge'])) {
                $navHtml .= '<span class="badge">'.$item['badge'].'</span>';
            }
            $navHtml .= '</a>';
            $navHtml .= '</li>';
        }
    
        $navHtml .= '</ul>';
        
        // Register AssetBundle
        NavSidebarAsset::register($this->getView());
        return $navHtml;
    }
}
