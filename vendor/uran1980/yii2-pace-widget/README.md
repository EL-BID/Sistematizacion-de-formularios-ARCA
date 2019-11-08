# Yii2 Pace Widget

An Yii2 widget for automatic web page progress bar based on
**[Pace](https://github.com/HubSpot/pace)** javascript library.


## What Pace do?
Pace will automatically monitor your ajax requests, event loop lag,
document ready state, and elements on your page to decide the progress.

On ajax navigation it will begin again!

For more info see: **[github.hubspot.com/pace](http://github.hubspot.com/pace/).**


## Installation


### Composer

The preferred way to install this extension is through [Composer](http://getcomposer.org/).

Either run

```
php composer.phar require uran1980/yii2-pace-widget "dev-master"
```

or add

```
"uran1980/yii2-pace-widget": "dev-master"
```

to the require section of your ```composer.json```


## Usage

To activate this widget add this line to you view or layout:

```php
<?php echo uran1980\yii\widgets\pace\Pace::widget(); ?>
```

Available options: **color**, **theme** and **paceOptions**, for example:

```php
<?php echo uran1980\yii\widgets\pace\Pace::widget([
    'color' => 'green',
    'theme' => 'flash',
]); ?>
```

or with paceOptions (**@see** [pace documentation](http://github.hubspot.com/pace/) for mor info):

```
<?php echo uran1980\yii\widgets\pace\Pace::widget([
    'color' => 'blue',
    'theme' => 'flash',
    'paceOptions' => [
        'ajax'      => false,
        'document'  => false,
    ],
]); ?>
```


## Author

[Ivan Yakovlev](https://github.com/uran1980/), e-mail: [uran1980@gmail.com](mailto:uran1980@gmail.com)
