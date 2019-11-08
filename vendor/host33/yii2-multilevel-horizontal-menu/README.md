yii2-multilevel-horizontal-menu
=============================

This extension consists of a multilevel horizontal menu. It is based on the SMenu extension. The CSS code has been taken from this page: [http://tympanus.net/codrops/2013/04/19/responsive-multi-level-menu/](http://tympanus.net/codrops/2013/04/19/responsive-multi-level-menu/ "http://tympanus.net/codrops/2013/04/19/responsive-multi-level-menu/")

## Demo

[http://www.ho33.com/en/yiimultilevelhorizontalmenu](http://www.ho33.com/en/yiimultilevelhorizontalmenu "http://www.ho33.com/en/yiimultilevelhorizontalmenu")

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require host33/yii2-multilevel-horizontal-menu "dev-master"
```

or add

```
"host33/yii2-multilevel-horizontal-menu": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

First of all, you have to add this piece of code where you want your menu to appear:

```php
use host33\multilevelhorizontalmenu\MultilevelHorizontalMenu;
echo MultilevelHorizontalMenu::widget(
array(
"menu"=>array(
  array("url"=>array(),
               "label"=>"Products",
          array("url"=>array(
                       "route"=>"/product/create"),
                       "label"=>"Create product",),
          array("url"=>array(
                      "route"=>"/product/list"),
                      "label"=>"Product List",),
          array("url"=>array(),
                       "label"=>"View Products",
          array("url"=>array(
                       "route"=>"/product/show",
                       "params"=>array("id"=>3),
                       "htmlOptions"=>array("title"=>"title")),
                       "label"=>"Product 3"),
            array("url"=>array(),
                         "label"=>"Product 4",
                array("url"=>array(
                             "route"=>"/product/show",
                             "params"=>array("id"=>5)),
                             "label"=>"Product 5")))),
          array("url"=>array(
                       "route"=>"/event/create"),
                       "label"=>"Sales"),
          array("url"=>array(
                       "route"=>"/event/create"),
                       "label"=>"Extensions",
                       "visible"=>false),
          array("url"=>array(),
                       "label"=>"Documentation",
              array("url"=>array(
                           "link"=>"http://www.yiiframework.com",
                           "htmlOptions"=>array("target"=>"_BLANK")),
                           "label"=>"Yii Framework"),
          array("url"=>array(),
                       "label"=>"Clothes",
          array("url"=>array(
                       "route"=>"/product/men",
                       "params"=>array("id"=>3),
                       "htmlOptions"=>array("title"=>"title")),
                       "label"=>"Men"),
            array("url"=>array(),
                         "label"=>"Women",
                array("url"=>array(
                             "route"=>"/product/scarves",
                             "params"=>array("id"=>5)),
                             "label"=>"Scarves"))),
              array("url"=>array(
                           "route"=>"site/menuDoc"),
                           "label"=>"Disabled Link",
						   "disabled"=>true),
                )
          ),
)
);
```

Next, you have to add this other piece of code where you want the combobox menu to appear when the user shrink the window:

```php
&lt;span id="insertHere"&gt;&lt;/span&gt;
```

## License

**yii2-multilevel-horizontal-menu** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.