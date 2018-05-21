<?php

namespace frontend\models\wiki;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Fileupload extends model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;


    /*
     * validaciones : extension, maxsize (bytes)
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf, xlsx','maxSize'=>'51200','tooBig'=>"El maximo permitido son 50k"],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if($this->imageFile->saveAs('uploadfolder/files/' . $this->imageFile->baseName . '.' . $this->imageFile->extension)){
                return true;
            }

        }
    }


}

?>
