<?php

namespace common\models\wiki;			//Se asigna la carpeta de trabajo "frontend o backend" y "models";

use Yii;
use yii\base\Model;

/**
 * Modelo para validar los datos del formulario /views/clientev/create.php
   Propiedades para los mensajes:
	1. tooBig -> mensaje para valores maximos
	2. tooSmall-> mensaje para valores minimos
	3. mensaje-> mensaje para tipo de dato
 */

class Tiponumericovalidator extends model
{
    public $dato1;
	public $dato2;
	public $dato3;

    public function rules()
    {
        return [
            [['dato1','dato2','dato3'], 'required','message' => 'Campo requerido'], //Asignacion para campo requerido
			 ['dato1', 'number', 'min'=>10,'tooSmall' => 'El campo debe ser minimo 10','message'=>'El valor debe ser un numero'],
			 ['dato2', 'number', 'max'=>30,'tooBig' => 'El campo debe ser maximo 30','message'=>'El valor debe ser un numero'],
			 ['dato3', 'number', 'min'=>5,'max'=>10,'tooBig' => 'El campo debe ser maximo 10','tooSmall'=>'El campo debe ser minimo 5','message'=>'El valor debe ser un numero'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'dato1' => 'Dato 1',
			'dato2' => 'Dato 2',
			'dato3' => 'Dato 3',
        ];
    }
}
