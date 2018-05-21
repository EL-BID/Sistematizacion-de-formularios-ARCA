<?php

namespace common\models\wiki;			//Se asigna la carpeta de trabajo "frontend o backend" y "models";

use Yii;
use yii\base\Model;

/**
 * Modelo para validar los datos del formulario /views/clientev/create.php
 */

class Tipodatovalidator extends model
{
    public $dato;

    public function rules()
    {
        return [
            [['dato'], 'required','message' => 'Campo requerido'], //Asignacion para campo requerido
			 ['dato', 'integer','message' => 'El campo debe ser un entero'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'dato' => 'Dato',
        ];
    }
}
