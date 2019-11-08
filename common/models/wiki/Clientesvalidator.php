<?php

namespace common\models\wiki;			//Se asigna la carpeta de trabajo "frontend o backend" y "models";

use Yii;
use yii\base\Model;

/**
 * Modelo para validar los datos del formulario /views/clientev/create.php
 */

class Clientesvalidator extends model
{
    public $name;
	public $lastname;


    public function rules()
    {
        return [
            [['name', 'lastname'], 'required','message' => 'Campo requerido'],		//Asignación de campo Requerido
        ];
    }


    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'birthdate' => 'Birthdate',
            'createdate' => 'Createdate',
        ];
    }
}
