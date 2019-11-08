<?php

namespace common\models\wiki;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Este es el modelo para la clase "proyectos".
 *
 * @property string $Id
 * @property string $nombre
 * @property string $fecha_inicio
 * @property string $fecha_fin
 */
class ProyectosPry extends \yii\db\ActiveRecord
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
        return 'proyectos';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_inicio', 'fecha_fin'], 'date','format'=>'dd/MM/yyyy','message' => 'El campo debe ser una fecha'],
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
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
        ];
    }

     public function getCiudadesDropdown()
    {
            $listCategory   = Ciudadesp::find()->all();
            $list   = ArrayHelper::map($listCategory,'Id','nombre');
            return $list;
    }
}
