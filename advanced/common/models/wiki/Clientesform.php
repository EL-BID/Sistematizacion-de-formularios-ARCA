<?php

namespace common\models\wiki;

use Yii;

/**
 * Este es el modelo basico para la tabla clientes creado por el CRUD.
 *
 * @property string $Id
 * @property string $name
 * @property string $lastname
 * @property string $birthdate
 * @property string $createdate
 * @property string $type
 */
class Clientesform extends \yii\db\ActiveRecord
{
    
    public static function getDb()
    {
        return Yii::$app->get('db4');
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname','birthdate'], 'required'],
            ['birthdate', 'date', 'format'=>'yyyy/MM/dd','message' => 'El campo debe ser una fecha'],
            [['type'], 'string'],
            [['name', 'lastname'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'birthdate' => 'Birthdate',
			'createdate' => 'Create Date',
            'type' => 'Type',
        ];
    }
}
