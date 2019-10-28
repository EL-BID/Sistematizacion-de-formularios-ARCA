yii2-nav-sidebar
================

A bootstrap sidebar navigation for Yii2

How to install?
---------------

Get it via [composer](http://getcomposer.org/) by adding the package to your `composer.json`:

```json
{
  "require": {
    "leoshtika/yii2-nav-sidebar": "*"
  }
}
```

Alternatively just run `composer require leoshtika/yii2-nav-sidebar`.

You may also check the package information on [packagist](https://packagist.org/packages/leoshtika/yii2-nav-sidebar).

Usage
-----

```php
<?= leoshtika\bootstrap\NavSidebar::widget([
    'items' => [
        [
            'url' => ['site/index'],
            'label' => 'Home',
            'icon' => 'home' // This is a bootstrap icon name
        ],
        [
            'url' => ['site/about'],
            'label' => 'about',
            'icon' => 'info-sign' // This is a bootstrap icon name
        ],
    ],
]) ?>
```