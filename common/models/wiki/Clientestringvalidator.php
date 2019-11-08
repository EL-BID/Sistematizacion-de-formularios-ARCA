<?php

namespace common\models\wiki;			//Se asigna la carpeta de trabajo "frontend o backend" y "models";

use Yii;
use yii\base\Model;

/**
 * Modelo para validar los datos del formulario /views/clientev/create.php
 */

class Clientestringvalidator extends model
{
    public $name;
	public $lastname;


    public function rules()
    {
        return [
            [['lastname'], 'required','message' => 'Campo requerido'], //Asignacion para campo requerido
			 ['name', 'match', 'pattern' => "/^[0-9a-zA-Z\\s]+$/", 'message' => 'Sólo se aceptan letras, numeros y espacios'],
			 //Asignacion para solo letras mediante expresion regular
			 ['lastname', 'match', 'pattern' => "/^[^a\\s]+$/", 'message' => 'Cadena No permite Espacios ni la letra a'],
			 //Asignacion para no permitir el caracter a ni los espacios permite cualquier otro tipo "Validación de cadena valida"

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
