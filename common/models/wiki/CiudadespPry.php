<?php

namespace common\models\wiki;

use Yii;

/**
 * Este es el modelo para la clase "ciudades_p".
 *
 * @property string $Id
 * @property string $nombre
 *
 * @property Ciudadesproyectos[] $ciudadesproyectos
 */
class CiudadespPry extends \yii\db\ActiveRecord
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
        return 'ciudades_p';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCiudadesproyectos()
    {
        return $this->hasMany(Ciudadesproyectos::className(), ['ciudad_id' => 'Id']);
    }
}
