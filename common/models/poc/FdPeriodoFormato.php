<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_periodo_formato".
 *
 * @property string $fecha_creacion
 * @property integer $id_formato
 * @property integer $id_periodo
 *
 * @property FdFormato $idFormato
 * @property TrPeriodo $idPeriodo
 */
class FdPeriodoFormato extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_periodo_formato';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_creacion'], 'date'],
            [['id_formato', 'id_periodo'], 'required'],
            [['id_formato', 'id_periodo'], 'integer'],
            [['id_formato'], 'exist', 'skipOnError' => true, 'targetClass' => FdFormato::className(), 'targetAttribute' => ['id_formato' => 'id_formato']],
            [['id_periodo'], 'exist', 'skipOnError' => true, 'targetClass' => TrPeriodo::className(), 'targetAttribute' => ['id_periodo' => 'id_periodo']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'fecha_creacion' => 'Fecha Creacion',
            'id_formato' => 'Id Formato',
            'id_periodo' => 'Id Periodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdFormato()
    {
        return $this->hasOne(FdFormato::className(), ['id_formato' => 'id_formato']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPeriodo()
    {
        return $this->hasOne(TrPeriodo::className(), ['id_periodo' => 'id_periodo']);
    }
}
