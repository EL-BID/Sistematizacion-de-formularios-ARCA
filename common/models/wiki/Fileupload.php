<?php

namespace common\models\wiki;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\data\ArrayDataProvider;

class Fileupload extends model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $filename;
    public $folder;
    public $db;
    public $filtro;

    /*
     * validaciones : extension, maxsize (bytes)
     */
    public function rules()
    {
        return [
            [['filename'], 'string'],
            [['folder'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf, xlsx','maxSize'=>'51200','tooBig'=>"El maximo permitido son 50k"],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if($this->imageFile->saveAs('uploadfolder/files/' . $this->imageFile->baseName . '.' . $this->imageFile->extension)){

                $this->filename = $this->imageFile->baseName;
                $this->folder = "uploadfolder/files/".$this->imageFile->baseName;
                $this->savem($this->filename,$this->folder);
                return true;

            }

        }
    }

    public function savem($_filename,$_folder){

        $db=Yii::$app->db4->createCommand('INSERT INTO hoja_vida (filename,folder) VALUES (:file,:folder)', [
            ':file' => $_filename,
            ':folder' => $_folder,
        ])->execute();

    }


    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imageFile' => 'Archivo',
        ];
    }


    /*Funcion de busqueda se agrega aqui se puede tambien realizar el modelo con el CRUD y aplicar los cambios
     =====================*/

    public function search($params)
    {
        $this->load($params);
        $filtro="";
        $v_binds=array();

        /*Organizando la sentencia SQL ============================================================*/

        $_sql = 'SELECT * FROM hoja_vida ';

        if(!empty($this->filename) and empty($filtro)){

            $filtro.='WHERE filename LIKE :variable1 ';
            $v_binds[':variable1']='%'.$this->filename. '%';

        }else if(!empty($this->filename) and !empty($filtro)){

            $filtro.='AND filename LIKE :variable1 ';
            $v_binds[':variable1']='%'.$this->filename. '%';

        }

        if(!empty($this->folder) and empty($filtro)){

            $filtro.='WHERE folder LIKE :variable2 ';
            $v_binds[':variable2']='%'.$this->folder. '%';

        }else if(!empty($this->folder) and !empty($filtro)){

            $filtro.='AND filename LIKE :variable2 ';
            $v_binds[':variable2']='%'.$this->folder. '%';

        }

        $_sql=$_sql.$filtro;

        //Ejecutando la consulta a la tabla =======================================================//

        if (empty($v_binds)) { //Listado Completo

            $_arraysearch = Yii::$app->db4->createCommand($_sql)->queryAll();

        }else{    //Agregando Filtros==================================================================

            $_arraysearch = Yii::$app->db4->createCommand($_sql)->bindValues($v_binds)->queryAll();
        }



        //Regresando dataprovider para la grilla del index================================================
         $_arraydataprovider = new ArrayDataProvider([
                            'allModels' => $_arraysearch,
                            'pagination' => [
                                'pageSize' => 10,
                            ],
                            'sort' => [
                                'attributes' => ['nombre_entidad', 'nom_formato','nom_adm_estado'],
                            ],
                        ]);

         return $_arraydataprovider;
    }
}

?>
