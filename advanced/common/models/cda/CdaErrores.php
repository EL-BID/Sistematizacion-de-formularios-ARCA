<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_errores".
 *
 * @property integer $id_error
 * @property string $observaciones
 * @property integer $id_terror
 * @property integer $id_cda
 *
 * @property Cda $idCda
 * @property CdaTipoError $idTerror
 */
class CdaErrores extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_errores';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['observaciones'], 'required'],
            [['id_error', 'id_terror', 'id_cda'], 'integer'],
            [['observaciones'], 'string', 'max' => 50],
            [['id_cda'], 'exist', 'skipOnError' => true, 'targetClass' => Cda::className(), 'targetAttribute' => ['id_cda' => 'id_cda']],
            [['id_terror'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoError::className(), 'targetAttribute' => ['id_terror' => 'id_terror']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_error' => 'Id Error',
            'observaciones' => 'Observaciones',
            'id_terror' => 'Id Terror',
            'id_cda' => 'Id Cda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCda()
    {
        return $this->hasOne(Cda::className(), ['id_cda' => 'id_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTerror()
    {
        return $this->hasOne(CdaTipoError::className(), ['id_terror' => 'id_terror']);
    }
}
