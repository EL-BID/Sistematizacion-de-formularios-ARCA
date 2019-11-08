<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\poc\CentroAtencionCiudadano;
use common\models\autenticacion\Demarcaciones;

/**
 * Este es el modelo para la clase "cda".
 *
 * @property integer $id_cda
 * @property string $fecha_ingreso_quipux
 * @property string $institucion_solicitante
 * @property string $solicitante
 * @property integer $cod_centro_atencion_ciudadano
 * @property string $id_demarcacion
 * @property string $cod_cda
 * @property integer $id_cda_tramite
 * @property integer $id_cda_solicitud
 * @property integer $id_cactividad_proceso
 *
 * @property CentroAtencionCiudadano $codCentroAtencionCiudadano
 * @property Demarcaciones $idDemarcacion
 * @property PsCactividadProceso $idCactividadProceso
 * @property CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos
 * @property CdaErrores[] $cdaErrores
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 * @property CdaSolicitudInformacion[] $cdaSolicitudInformacions
 */
class Cda extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_ingreso_quipux','fecha_ingreso_anexos_fisicos','fecha_oficio','fecha_recepcion_anexos'], 'safe'],
            [['cod_centro_atencion_ciudadano', 'id_cactividad_proceso'], 'integer'],
            [['id_demarcacion'], 'number'],
            [['especifique'], 'string', 'max' => 500,'skipOnEmpty'=>true],
            [['institucion_solicitante', 'solicitante'], 'string', 'max' => 500],
            [['cod_centro_atencion_ciudadano'], 'exist', 'skipOnError' => true, 'targetClass' => CentroAtencionCiudadano::className(), 'targetAttribute' => ['cod_centro_atencion_ciudadano' => 'cod_centro_atencion_ciudadano']],
            [['id_demarcacion'], 'exist', 'skipOnError' => true, 'targetClass' => Demarcaciones::className(), 'targetAttribute' => ['id_demarcacion' => 'id_demarcacion']],
            [['id_cactividad_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCactividadProceso::className(), 'targetAttribute' => ['id_cactividad_proceso' => 'id_cactividad_proceso']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_cda' => 'Id Cda',
            'fecha_ingreso_quipux' => 'Fecha Ingreso Quipux',
            'institucion_solicitante' => 'Institución Solicitante',
            'solicitante' => 'Solicitante',
            'cod_centro_atencion_ciudadano' => 'Centro Atención Ciudadano',
            'id_demarcacion' => 'Demarcación',
            'id_cactividad_proceso' => 'Id Cactividad Proceso',
            'especifique' => 'Especifique',
            'fecha_recepcion_anexos' => 'Fecha Recepcion Anexos Completos'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodCentroAtencionCiudadano()
    {
        return $this->hasOne(CentroAtencionCiudadano::className(), ['cod_centro_atencion_ciudadano' => 'cod_centro_atencion_ciudadano']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdDemarcacion()
    {
        return $this->hasOne(Demarcaciones::className(), ['id_demarcacion' => 'id_demarcacion']);
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
    public function getCdaAnalisisHidrologicos()
    {
        return $this->hasMany(CdaAnalisisHidrologico::className(), ['id_cda' => 'id_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaErrores()
    {
        return $this->hasMany(CdaErrores::className(), ['id_cda' => 'id_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_cda' => 'id_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaSolicitudInformacions()
    {
        return $this->hasMany(CdaSolicitudInformacion::className(), ['id_cda' => 'id_cda']);
    }
}
