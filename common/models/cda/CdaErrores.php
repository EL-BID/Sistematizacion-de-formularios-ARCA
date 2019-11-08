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
 * @property integer $id_reporte_informacion
 *
 * @property CdaReporteInformacion $idReporteInformacion
 * @property CdaTipoError $idTerror
 */
class CdaErrores extends ModelPry
{
    
    public $tipoerror;
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
            [['id_cod_cda','id_cactividad_proceso','id_actividad','id_tipo'], 'integer'],
            [['observaciones'], 'string', 'max' => 50],
            [['id_cod_cda'], 'exist', 'skipOnError' => true, 'targetClass' => PsCodCda::className(), 'targetAttribute' => ['id_cod_cda' => 'id_cod_cda']],
//            [['id_terror'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoError::className(), 'targetAttribute' => ['id_terror' => 'id_terror']],
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
//            'id_terror' => 'Tipo de Error',
            'id_cod_cda' => 'Código CDA',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsCodCda()
    {
        return $this->hasOne(PsCodCda::className(), ['id_cod_cda' => 'id_cod_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
//    public function getIdTerror()
//    {
//        return $this->hasOne(CdaTipoError::className(), ['id_terror' => 'id_terror']);
//    }
    
        
    
}
