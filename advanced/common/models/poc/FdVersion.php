<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_version".
 *
 * @property integer $id_version
 * @property string $desc_version
 * @property string $num_version
 *
 * @property FdConjuntoPregunta[] $fdConjuntoPreguntas
 * @property FdFormato[] $fdFormatos
 * @property FdPreguntaDescendiente[] $fdPreguntaDescendientes
 * @property FdPreguntaDescendiente[] $fdPreguntaDescendientes0
 * @property FdRespuesta[] $fdRespuestas
 */
class FdVersion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_version';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_version', 'desc_version'], 'required'],
            [['id_version'], 'integer'],
            [['desc_version', 'num_version'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_version' => 'Id Version',
            'desc_version' => 'Desc Version',
            'num_version' => 'Num Version',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdConjuntoPreguntas()
    {
        return $this->hasMany(FdConjuntoPregunta::className(), ['id_version' => 'id_version']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdFormatos()
    {
        return $this->hasMany(FdFormato::className(), ['ult_id_version' => 'id_version']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntaDescendientes()
    {
        return $this->hasMany(FdPreguntaDescendiente::className(), ['id_version_descendiente' => 'id_version']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntaDescendientes0()
    {
        return $this->hasMany(FdPreguntaDescendiente::className(), ['id_version_padre' => 'id_version']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestas()
    {
        return $this->hasMany(FdRespuesta::className(), ['id_version' => 'id_version']);
    }
}
