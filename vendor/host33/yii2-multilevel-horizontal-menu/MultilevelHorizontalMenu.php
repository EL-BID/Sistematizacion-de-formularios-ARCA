<?php

/**
 * @copyright Copyright &copy; Marc Oliveras Galvez, ho33.com, 2015
 * @package yii2-multilevel-horizontal-menu
 * @version 1.0  
 */

namespace host33\multilevelhorizontalmenu;

use Yii;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\base\InvalidConfigException;
use yii\base\Widget;

/**
 * A multilevel horizontal menu extension. SMenu based.
 * 
 * @see https://github.com/host33/yii2-multilevel-horizontal-menu
 * @author Marc Oliveras Galvez <moginn@gmail.com> http://www.ho33.com
 * @link http://www.dynamicdrive.com/style/csslibrary/item/jquery_multi_level_css_menu_2/
 * @since 1.0
 */
class MultilevelHorizontalMenu extends Widget {
	/**
	 * The menu items' data
	 * @var array
	 */
	private $_menu;

	/**
	 * The html output of the widget
	 * @var String
	 */
	private $_html;
	/**
	 * The assets url
	 * @var String
	 */
	private $_baseUrl;

	/**
	 * Gets the html output of the widget
	 * @return String
	 */
	public function getHtml() {
		return $this -> _html;
	}

	/**
	 * Sets the menu data
	 * @param array $menu
	 *
	 */
	public function setMenu($menu) {
		if (is_array($menu)) {
			$this -> _menu = $menu;
		} else {
			throw new CException('Menu must be an array');
		}
	}

	/**
	 * Execute the widget
	 */
	public function run() {
		if (empty($this->_menu) || !is_array($this->_menu)) {
			 throw new InvalidConfigException("Menu is not set or it's empty.");
		}
				
		$this -> registerClientScripts();
		$this -> createMarkup();
	}

	/**
	 * Registers the clientside widget files (css & js)
	 */
	public function registerClientScripts() {
		$resources = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'resources';
		$this -> _baseUrl = Yii::$app->getAssetManager()->publish($resources);
		$this->getView()->registerJsFile($this -> _baseUrl[1] . '/menu.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
		$this->getView()->registerJsFile($this -> _baseUrl[1] . '/selectnav.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

		$this->getView()->registerJs('
			selectnav(\'myslidemenu\',\'insertHere\');
		', View::POS_END, 'selectnavstart');
		$this->getView()->registerCssFile($this -> _baseUrl[1] . '/style.css', [], 'horizontal-menu-css');
	}

	/**
	 * Creates the html markup needed by the widget
	 */
	public function createMarkUp() {
		$this -> _html = '<div id="myslidemenu" class="jqueryslidemenu">';
		$this -> _html .= '<ul>';
		$this -> _createMenu($this -> _menu, 1);
		$this -> _html .= '</ul>';
		$this -> _html .= '</div>';

		echo $this -> _html;
	}

	/**
	 * Creates the menu unordered list
	 * @param array $menu : The menu array
	 * @param if we're on a sub menu or not $rec
	 */
	private function _createMenu($menu, $level) {
		if (is_array($menu)) {
			foreach ($menu as $data) {
				isset($data['disabled']) ? $disabled = true : $disabled = false;
				isset($data['url']['params']) ? $params = $data['url']['params'] : $params = array();
				isset($data['url']['htmlOptions']) ? $htmlOptions = $data['url']['htmlOptions'] : $htmlOptions = array();
				isset($data['label']) ? $label = $data['label'] : $label = '';
				if ($this -> _isMenuItem($data)) {
					$url = $this -> _createUrl($data);
					if (!$this -> hasChild($data)) {
						if(isset($data['url']['route']) && $this->isMenuItemActive($data['url']['route']))
							$this -> _html .= "<li id='menuitemactive'>";
						else
							$this -> _html .= "<li>";
						$htmlOptions['class'] = 'menulink hvr-sweep-to-top';
						$this -> _html .= Html::a($label, $url, $htmlOptions);
						$this -> _html .= "</li>\n";
					} else {
						if($level == 1)
							$this -> _html .= "<li class='has-sub'>";
						else 
							$this -> _html .= "<li class='has-sub2'>";
						
						$htmlOptions['class'] = 'menulink hvr-sweep-to-top';
						$this -> _html .= Html::a($label . '&nbsp;&nbsp;&nbsp;', $url, $htmlOptions);
						$this -> _html .= "<ul>\n";
						$this -> _html .= $this -> _createMenu($data, $level + 1);
						$this -> _html .= "</ul>\n";
					}
				}
			}
		}
	}

	/**
	 * Checks if a menu item is active.
	 * @param string $item
	 * @return true menu item is active
	 */
	private function isMenuItemActive($item)
	{
		if ($item == Yii::$app -> controller -> id . '/' . Yii::$app -> controller -> action -> id || 
			$item == '/' . Yii::$app -> controller -> id . '/' . Yii::$app -> controller -> action -> id || 
			(isset(Yii::$app->controller->module) && $item == Yii::$app->controller->module->id . '/' . Yii::$app -> controller -> id . '/' . Yii::$app -> controller -> action -> id) || 
			(isset(Yii::$app->controller->module) && $item == '/' . Yii::$app->controller->module->id . '/' . Yii::$app -> controller -> id . '/' . Yii::$app -> controller -> action -> id) 
		)
			return true;
		else
			return false;	
	}
	
	/**
	 * Checks if there's a menu item to display
	 * $data must be an array with a label key
	 * and if the key visible is set it must be true
	 * @param array $data
	 * @return true if there's a menu item
	 */
	private function _isMenuItem($data) {
		isset($data['label']) ? $label = $data['label'] : $label = '';
		if (is_array($data) && $label && (!isset($data['visible']) || $data['visible'])) {
			return true;
		}

		return false;
	}

	/**
	 * Create the url link
	 * @param array $data
	 */
	private function _createUrl($data) {
		isset($data['url']['route']) ? $route = $data['url']['route'] : $route = '';
		isset($data['disabled']) ? $disabled = $data['disabled'] : $disabled = '';
		isset($data['url']['params']) ? $params = $data['url']['params'] : $params = array();
		isset($data['url']['link']) ? $link = $data['url']['link'] : $link = '';
		if (($route != '' || $data['url'] != array()) && !$disabled) {
			if ($route) {
				$array = array();
				$array[] = $route;
				$url = Url::to(array_merge($array, $params));
			} else {
				$url = $link;
			}
		} else {
			$url = null;
		}

		return $url;
	}

	/**
	 * Checks if this menu array has a submenu
	 * @param array $arr
	 * @return true if there's a submenu
	 */
	private function hasChild($arr) {
		if (!is_array($arr)) {
			return false;
		}
		foreach ($arr as $title => $value) {
			if (!$title == 'url') {
				if (is_array($value)) {
					return true;
				}
			}
		}
		return false;
	}

	private function set($param) {
		isset($param) ? $param = $param : $param = '';
	}

}
