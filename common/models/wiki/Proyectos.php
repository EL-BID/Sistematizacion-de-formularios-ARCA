<?php

namespace common\models\wiki;

use Yii;

/**
 * Este es el modelo para la clase "proyectos".
 *
 * @property string $Id
 * @property string $nombre
 * @property string $fecha_inicio
 * @property string $fecha_fin
 */
class Proyectos extends \common\models\wiki\ProyectosPry
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
}
