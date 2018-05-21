<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_clasificacion".
 *
 * @property integer $id_clasificacion
 * @property string $nom_clasificacion
 *
 * @property FdClasificacionPregunta[] $fdClasificacionPreguntas
 */
class FdClasificacion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_clasificacion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_clasificacion', 'nom_clasificacion'], 'required'],
            [['id_clasificacion'], 'integer'],
            [['nom_clasificacion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_clasificacion' => 'Id Clasificacion',
            'nom_clasificacion' => 'Nom Clasificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdClasificacionPreguntas()
    {
        return $this->hasMany(FdClasificacionPregunta::className(), ['id_clasificacion' => 'id_clasificacion']);
    }
}
