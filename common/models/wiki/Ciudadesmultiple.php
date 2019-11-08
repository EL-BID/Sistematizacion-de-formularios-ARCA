<?php

namespace common\models\wiki;

use Yii;

/**
 * Este es el modelo para la clase "ciudades".
 *
 * @property integer $Id
 * @property string $ciudades
 *
 * @property Clientes[] $clientes
 */
class Ciudadesmultiple extends \yii\db\ActiveRecord
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
        return 'ciudades';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['Id'], 'required'],
            [['Id'], 'integer'],
            [['ciudades'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'ciudades' => 'Ciudades',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getClientes()
    {
        return $this->hasMany(Clientes::className(), ['ciudad2_id' => 'Id']);
    }
}
