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
class Ciudadesp extends \common\models\wiki\CiudadespPry
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
    public function getCiudadesproyectos()
    {
        return parent::getCiudadesproyectos();
    }
}
