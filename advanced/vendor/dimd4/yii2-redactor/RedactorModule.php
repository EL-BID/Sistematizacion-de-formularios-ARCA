<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\redactor;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;
use yii\helpers\Url;

/**
 * @author Dimd4 <dimd4@mail.ru>
 * @since 1.0
 */
class RedactorModule extends \yii\base\Module
{
    public $controllerNamespace = 'yii\redactor\controllers';
    public $defaultRoute = 'upload';
    public $subfolderName = 'redactor'; // default folder
    public $uploadDir = '@webroot/uploads';
    public $uploadUrl = '@web/uploads';
    public $imageUploadRoute = ['/redactor/upload/image'];
    public $fileUploadRoute = ['/redactor/upload/file'];
    public $imageManagerJsonRoute = ['/redactor/upload/image-json'];
    public $fileManagerJsonRoute = ['/redactor/upload/file-json'];
    public $imageAllowExtensions = ['jpg', 'png', 'gif', 'bmp', 'svg'];
    public $fileAllowExtensions = null;
    public $widgetOptions=[];
    public $widgetClientOptions=[];


    public function getSubfolderPath()
    {
        $request = Yii::$app->request;
        $subfolder = $request->get('subfolder', $this->subfolderName);
        $subfolder = preg_replace('/[^a-zA-Z]/', '', $subfolder);
        if(!empty($subfolder))
            $subfolder = '/' . $subfolder;

        return $subfolder;
    }

    /**
     * @return string
     * @throws InvalidConfigException
     * @throws \yii\base\Exception
     */
    public function getSaveDir()
    {
        $path = Yii::getAlias($this->uploadDir) . $this->getSubfolderPath();
        if(!file_exists($path)){      
            if (!FileHelper::createDirectory($path, 0775, $recursive = true )) {
                throw new InvalidConfigException('$uploadDir does not exist and default path creation failed');
            }
        }
        return $path;
    }

    /**
     * @param $fileName
     * @return string
     * @throws InvalidConfigException
     */
    public function getFilePath($fileName)
    {
        return $this->getSaveDir() . DIRECTORY_SEPARATOR . $fileName;
    }

    /**
     * @param $fileName
     * @return string
     */
    public function getUrl($fileName)
    {
        return Url::to($this->uploadUrl . $this->getSubfolderPath() . '/' . $fileName);
    }
}
