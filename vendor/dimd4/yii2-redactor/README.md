yii2-redactor
=============
Extension redactor for Yii2 Framework.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dimd4/yii2-redactor "*"
```

 or
```
 "dimd4/yii2-redactor": "*"
```

to the require section of your composer.json.

Configure
-----------------

Add to config file (config/web.php or common\config\main.php) 

```
    'modules' => [
        'redactor' => 'yii\redactor\RedactorModule',
    ],
```
or if you want to change the upload directory.
to path/to/uploadfolder
default value `@webroot/uploads`

```
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/path/to/uploadfolder',
            'uploadUrl' => '@web/path/to/uploadfolder',
            'imageAllowExtensions'=>['jpg','png','gif']
        ],
    ],
```

note: You need to create uploads folder and chmod and set security for folder upload

Config view/form

```
<?= $form->field($model, 'body')->widget(\yii\redactor\widgets\Redactor::className()) ?>
```

or not use ActiveField

```
<?= \yii\redactor\widgets\Redactor::widget([
    'model' => $model,
    'attribute' => 'body'
]) ?>
```    
or config advanced redactor reference [Docs](http://imperavi.com/redactor/docs/)

```
<?= $form->field($model, 'body')->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions' => [
        'imageManagerJson' => ['/redactor/upload/image-json'],
        'imageUpload' => ['/redactor/upload/image'],
        'fileUpload' => ['/redactor/upload/file'],
        'lang' => 'zh_cn',
        'plugins' => ['clips', 'fontcolor','imagemanager']
    ]
])?>
```

change default subfolder - optional, name subfolder only [a-zA-Z]
```
<?= $form->field($model, 'body')->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions' => [
        'imageManagerJson' => ['/redactor/upload/image-json', 'subfolder' => 'news'], 
        'imageUpload' => ['/redactor/upload/image', 'subfolder' => 'news'],
        'fileUpload' => ['/redactor/upload/file', 'subfolder' => 'news'],
        'lang' => 'zh_cn',
        'plugins' => ['clips', 'fontcolor','imagemanager']
    ]
])?>
```

Thanks!
