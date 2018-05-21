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
class Ciudadesproyectos extends \common\models\wiki\CiudadesproyectosPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return  parent::tableName();
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return  parent::rules();
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return  parent::attributeLabels();
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCiudad()
    {
        return parent::getCiudad();
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getProyecto()
    {
        return parent::getProyecto();
    }
}
