<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_registro_error".
 *
 * @property integer $id_cda_registro_error
 * @property integer $id_tipo_error
 * @property integer $id_cda_error
 *
 * @property CdaErrores $idCdaError
 * @property CdaTipoError $idTipoError
 */
class CdaRegistroError extends ModelPry
{
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_registro_error';
    }
    
    public static function primaryKey()
    {
        return ["id_cda_registro_error"];
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tipo_error', 'id_cda_error'], 'integer'],
            [['id_cda_error'], 'exist', 'skipOnError' => true, 'targetClass' => CdaErrores::className(), 'targetAttribute' => ['id_cda_error' => 'id_error']],
            [['id_tipo_error'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoError::className(), 'targetAttribute' => ['id_tipo_error' => 'id_terror']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_cda_registro_error' => 'Id Cda Registro Error',
            'id_tipo_error' => 'Id Tipo Error',
            'id_cda_error' => 'Id Cda Error',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCdaError()
    {
        return $this->hasOne(CdaErrores::className(), ['id_error' => 'id_cda_error']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTipoError()
    {
        return $this->hasOne(CdaTipoError::className(), ['id_terror' => 'id_tipo_error']);
    }
}
