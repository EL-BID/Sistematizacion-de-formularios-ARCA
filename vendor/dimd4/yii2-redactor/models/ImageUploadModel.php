<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\redactor\models;

use Yii;

/**
 * @author Dimd <dimd4@mail.ru>
 * @since 1.0
 */
class ImageUploadModel extends FileUploadModel
{
    public function rules()
    {
        return [
            ['file', 'file', 'extensions' => Yii::$app->controller->module->imageAllowExtensions]
        ];
    }

}