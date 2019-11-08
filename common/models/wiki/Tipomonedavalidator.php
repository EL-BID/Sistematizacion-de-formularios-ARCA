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

class Tipomonedavalidator extends model
{
    public $dato1;
	public $dato2;

    public function rules()
    {
        return [
            [['dato1','dato2'], 'required','message' => 'Campo requerido'], //Asignacion para campo requerido
			 ['dato1', 'number','numberPattern' => '/^[0-9]+(\.[0-9]{1,2})?$/', 'message'=>'El valor debe ser numerico - separar centavos con "." y solo debe tener 2 decimales'],
			 ['dato2', 'number','numberPattern' => '/^[0-9]+(\,[0-9]{1,2})?$/', 'message'=>'El valor debe ser numerico - separar centavos con ","'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'Moneda separador centavos "." ' => 'Dato 1',
			'Moneda separador centavos ","' => 'Dato 2',
	    ];
    }
}
