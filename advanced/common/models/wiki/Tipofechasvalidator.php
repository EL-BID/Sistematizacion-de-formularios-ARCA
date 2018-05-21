<?php

namespace common\models\wiki;			//Se asigna la carpeta de trabajo "frontend o backend" y "models";

use Yii;
use yii\base\Model;

/**
 * Modelo para validar los datos del formulario /views/clientev/create.php
 */

class Tipofechasvalidator extends model
{

	public $dato;
	public $dato2;
	public $dato3;


    public function rules()
    {
        return [
            [['dato'], 'required','message' => 'Campo requerido'], //Asignacion para campo requerido
			 ['dato', 'date', 'format'=>'dd/MM/yyyy','message' => 'El campo debe ser una fecha'],	//validando campo tipo fecha
			 ['dato2','date','format'=>'dd/MM/yyyy','min'=>'01/01/2017'],	//validando fecha minima 2017/01/01
			 ['dato3','date','max'=>'01/03/2017', 'format'=>'dd/MM/yyyy'],	//validando fecha maxima 2017/03/01
        ];
    }


    public function attributeLabels()
    {
        return [
			'dato'=> 'Captura de Fecha Requerida: ' ,
			'dato2'=>'Captura con Fecha Minima 01/01/2017: ' ,
			'dato3'=>'Captura con Fecha Maxima 01/03/2017: ' ,
        ];
    }
}
