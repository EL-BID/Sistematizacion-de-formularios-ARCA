<?php

namespace common\models\wiki;			//Se asigna la carpeta de trabajo "frontend" y "models";

use Yii;

/**
 * Este es el modelo para la tabla "clientes".
 *
 * @propiedad string $Id
 * @propiedad string $name
 * @propiedad string $lastname
 * @propiedad string $birthdate
 * @propiedad string $createdate
 */
class Clientes extends \yii\db\ActiveRecord
{

    
    public static function getDb()
    {
        return Yii::$app->get('db4');
    }
    
    public static function tableName()			//Nombre de la tabla de trabajo
    {
        return 'clientes';
    }


    public function rules()					//Se asignan las reglas
    {
        return [
            [['name', 'lastname'], 'string'],
            [['birthdate', 'createdate'], 'safe'],
        ];
    }


    public function attributeLabels()		//Labels para los atributos
    {
        return [
            'Id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'birthdate' => 'Birthdate',
            'createdate' => 'Createdate',
			'comentario' => 'Comentario',
        ];
    }
}
