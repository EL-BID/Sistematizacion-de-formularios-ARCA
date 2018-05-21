<?php

namespace common\models\wiki;

use Yii;

/**
 * Este es el modelo para la clase "clientes".
 *
 * @property string $Id
 * @property string $name
 * @property string $lastname
 * @property string $birthdate
 * @property string $createdate
 * @property string $type
 *
 * @property Cometarios[] $cometarios
 */
class Clientesprueba extends \yii\db\ActiveRecord
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
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['name', 'lastname'], 'required'],
            [['birthdate', 'createdate'], 'date', 'format'=>'yyyy-MM-dd','message' => 'El campo debe ser una fecha'],//Fecha Validada en el CRUD no sale formato ni mensaje se debe agregar
            [['type'], 'string'],
            [['name', 'lastname'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'birthdate' => 'Birthdate',
            'createdate' => 'Createdate',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCometarios()
    {
        return $this->hasMany(Cometarios::className(), ['id_cliente' => 'Id']);
    }
}
