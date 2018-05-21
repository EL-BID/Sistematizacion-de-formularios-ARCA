<?php

namespace common\models\wiki;

use Yii;

/**
 * Este es el modelo para la clase "ciudadesproyectos".
 *
 * @property string $Id
 * @property string $ciudad_id
 * @property string $proyecto_id
 *
 * @property CiudadesP $ciudad
 * @property Proyectos $proyecto
 */
class CiudadesproyectosPry extends \yii\db\ActiveRecord
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
        return 'ciudadesproyectos';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['ciudad_id', 'proyecto_id'], 'number'],
            [['ciudad_id'], 'exist', 'skipOnError' => true, 'targetClass' => CiudadesP::className(), 'targetAttribute' => ['ciudad_id' => 'Id']],
            [['proyecto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['proyecto_id' => 'Id']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'ciudad_id' => 'Ciudad ID',
            'proyecto_id' => 'Proyecto ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCiudad()
    {
        return $this->hasOne(CiudadesP::className(), ['Id' => 'ciudad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getProyecto()
    {
        return $this->hasOne(Proyectos::className(), ['Id' => 'proyecto_id']);
    }



}
