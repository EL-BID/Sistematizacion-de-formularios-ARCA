<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_analisis_hidrologico".
 *
 * @property integer $id_analisis_hidrologico
 * @property integer $id_cartografia
 * @property string $id_ehidrografica
 * @property string $id_emeteorologica
 * @property integer $id_metodologia
 * @property integer $id_cod_cda
 * @property string $informe_utilizado
 * @property string $probabilidad
 * @property string $observacion
 * @property integer $id_cactividad_proceso
 *
 * @property CdaCartografia $idCartografia
 * @property CdaEstacionHidrologica $idEhidrografica
 * @property CdaEstacionMeteorologica $idEmeteorologica
 * @property CdaMetodologia $idMetodologia
 * @property PsCactividadProceso $idCactividadProceso
 * @property PsCodCda $idCodCda
 */
class CdaAnalisisHidrologico extends ModelPry
{
    
    public $nom_ehidrografica;
    public $nom_emeteorologica;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_analisis_hidrologico';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_cartografia', 'id_metodologia', 'id_cod_cda', 'id_cactividad_proceso','id_tipo','id_actividad'], 'integer'],
            [['id_ehidrografica'], 'string', 'max' => 50],
            [['id_emeteorologica'], 'string', 'max' => 10],
            [['informe_utilizado', 'probabilidad', 'observacion'], 'string', 'max' => 500],
            [['id_cartografia'], 'exist', 'skipOnError' => true, 'targetClass' => CdaCartografia::className(), 'targetAttribute' => ['id_cartografia' => 'id_cartografia']],
            [['id_ehidrografica'], 'exist', 'skipOnError' => true, 'targetClass' => CdaEstacionHidrologica::className(), 'targetAttribute' => ['id_ehidrografica' => 'id_ehidrografica']],
            [['id_emeteorologica'], 'exist', 'skipOnError' => true, 'targetClass' => CdaEstacionMeteorologica::className(), 'targetAttribute' => ['id_emeteorologica' => 'id_emeteorologica']],
            [['id_metodologia'], 'exist', 'skipOnError' => true, 'targetClass' => CdaMetodologia::className(), 'targetAttribute' => ['id_metodologia' => 'id_metodologia']],
            [['id_cactividad_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCactividadProceso::className(), 'targetAttribute' => ['id_cactividad_proceso' => 'id_cactividad_proceso']],
            [['id_cod_cda'], 'exist', 'skipOnError' => true, 'targetClass' => PsCodCda::className(), 'targetAttribute' => ['id_cod_cda' => 'id_cod_cda']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_analisis_hidrologico' => 'Id Analisis Hidrologico',
            'id_cartografia' => 'Cartografia',
            'id_ehidrografica' => 'Codigo Estación Hidrológica',
            'id_emeteorologica' => 'Codigo Estación Meteorológica',
            'nom_ehidrografica' => 'Nombre Estación Hidrológica',
            'nom_emeteorologica' => 'Nombre Estación Meteorológica',
            'id_metodologia' => 'Metodología',
            'id_cod_cda' => 'Código CDA',
            'informe_utilizado' => 'Informe Utilizado',
            'probabilidad' => 'Probabilidad',
            'observacion' => 'Observación',
            'id_cactividad_proceso' => 'Id Cactividad Proceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCartografia()
    {
        return $this->hasOne(CdaCartografia::className(), ['id_cartografia' => 'id_cartografia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdEhidrografica()
    {
        return $this->hasOne(CdaEstacionHidrologica::className(), ['id_ehidrografica' => 'id_ehidrografica']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdEmeteorologica()
    {
        return $this->hasOne(CdaEstacionMeteorologica::className(), ['id_emeteorologica' => 'id_emeteorologica']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdMetodologia()
    {
        return $this->hasOne(CdaMetodologia::className(), ['id_metodologia' => 'id_metodologia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCactividadProceso()
    {
        return $this->hasOne(PsCactividadProceso::className(), ['id_cactividad_proceso' => 'id_cactividad_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCodCda()
    {
        return $this->hasOne(PsCodCda::className(), ['id_cod_cda' => 'id_cod_cda']);
    }
}
