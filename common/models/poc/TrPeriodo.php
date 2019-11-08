<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "tr_periodo".
 *
 * @property integer $id_periodo
 * @property string $nom_periodo
 * @property string $identificador
 * @property integer $vigencia
 * @property integer $id_tperiodo
 *
 * @property FdConjuntoRespuesta[] $fdConjuntoRespuestas
 * @property FdPeriodoFormato[] $fdPeriodoFormatos
 * @property FdFormato[] $idFormatos
 * @property TrTipoPeriodo $idTperiodo
 */
class TrPeriodo extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_periodo';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_periodo', 'nom_periodo'], 'required'],
            [['id_periodo', 'vigencia', 'id_tperiodo'], 'integer'],
            [['nom_periodo', 'identificador'], 'string', 'max' => 50],
            [['id_tperiodo'], 'exist', 'skipOnError' => true, 'targetClass' => TrTipoPeriodo::className(), 'targetAttribute' => ['id_tperiodo' => 'id_tperiodo']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_periodo' => 'Id Periodo',
            'nom_periodo' => 'Nom Periodo',
            'identificador' => 'Identificador',
            'vigencia' => 'Vigencia',
            'id_tperiodo' => 'Id Tperiodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdConjuntoRespuestas()
    {
        return $this->hasMany(FdConjuntoRespuesta::className(), ['id_periodo' => 'id_periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPeriodoFormatos()
    {
        return $this->hasMany(FdPeriodoFormato::className(), ['id_periodo' => 'id_periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdFormatos()
    {
        return $this->hasMany(FdFormato::className(), ['id_formato' => 'id_formato'])->viaTable('fd_periodo_formato', ['id_periodo' => 'id_periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTperiodo()
    {
        return $this->hasOne(TrTipoPeriodo::className(), ['id_tperiodo' => 'id_tperiodo']);
    }
}
