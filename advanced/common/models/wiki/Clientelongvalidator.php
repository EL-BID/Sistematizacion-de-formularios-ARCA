<?php

namespace common\models\wiki;			//Se asigna la carpeta de trabajo "frontend o backend" y "models";

use Yii;
use yii\base\Model;

/**
 * Modelo para validar los datos del formulario /views/clientev/create.php
 */

class Clientelongvalidator extends model
{
    public $name;
	public $lastname;


    public function rules()
    {
        return [
            [['name','lastname'], 'required','message' => 'Campo requerido'],
            ['name', 'match', 'pattern' => "/^.{10,50}$/", 'message' => 'Mínimo 10 y máximo 50 caracteres'], //Asignacion para longitud maxima  y minima
        ];
    }


    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
        ];
    }
}
