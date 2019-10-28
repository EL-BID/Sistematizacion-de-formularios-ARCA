<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_tipo_valoracion".
 *
 * @property integer $id_tipo_valoracion
 * @property string $descripcion_valoracion
 *
 * @property FdParamEvaluaciones[] $fdParamEvaluaciones
 * @property FdPonderacionRespuesta[] $fdPonderacionRespuestas
 */
class FdTipoValoracion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tipo_valoracion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['descripcion_valoracion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_valoracion' => 'Id Tipo Valoracion',
            'descripcion_valoracion' => 'Descripcion Valoracion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdParamEvaluaciones()
    {
        return $this->hasMany(FdParamEvaluaciones::className(), ['tipo_valoracion' => 'id_tipo_valoracion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPonderacionRespuestas()
    {
        return $this->hasMany(FdPonderacionRespuesta::className(), ['id_tpondera' => 'id_tipo_valoracion']);
    }
}
