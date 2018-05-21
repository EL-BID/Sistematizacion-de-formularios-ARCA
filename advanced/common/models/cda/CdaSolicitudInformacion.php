<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_solicitud_informacion".
 *
 * @property integer $id_solicitud_info
 * @property integer $id_tinfo_faltante
 * @property integer $id_treporte
 * @property integer $id_cactividad_proceso
 * @property integer $id_tatencion
 * @property string $observaciones
 * @property string $oficio_atencion
 * @property string $fecha_atencion
 * @property integer $id_cda
 * @property integer $id_trespuesta
 * @property string $observaciones_res
 * @property string $oficio_respuesta
 * @property string $fecha_respuesta
 * @property integer $id_cactividad_proceso_res
 *
 * @property Cda $idCda
 * @property CdaTipoAtencion $idTatencion
 * @property CdaTipoAtencion $idTrespuesta
 * @property CdaTipoInfoFaltante $idTinfoFaltante
 * @property CdaTipoReporte $idTreporte
 * @property PsCactividadProceso $idCactividadProceso
 */
class CdaSolicitudInformacion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_solicitud_informacion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tinfo_faltante', 'id_treporte', 'id_cactividad_proceso', 'id_tatencion', 'id_cda', 'id_trespuesta', 'id_cactividad_proceso_res'], 'integer'],
            [['fecha_atencion', 'fecha_respuesta'], 'string'],
            [['observaciones', 'observaciones_res'], 'string', 'max' => 1000],
            [['oficio_atencion', 'oficio_respuesta'], 'string', 'max' => 50],
            [['id_cda'], 'exist', 'skipOnError' => true, 'targetClass' => Cda::className(), 'targetAttribute' => ['id_cda' => 'id_cda']],
            [['id_tatencion'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoAtencion::className(), 'targetAttribute' => ['id_tatencion' => 'id_tatencion']],
            [['id_trespuesta'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoAtencion::className(), 'targetAttribute' => ['id_trespuesta' => 'id_tatencion']],
            [['id_tinfo_faltante'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoInfoFaltante::className(), 'targetAttribute' => ['id_tinfo_faltante' => 'id_tinfo_faltante']],
            [['id_treporte'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoReporte::className(), 'targetAttribute' => ['id_treporte' => 'id_treporte']],
            [['id_cactividad_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCactividadProceso::className(), 'targetAttribute' => ['id_cactividad_proceso' => 'id_cactividad_proceso']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_solicitud_info' => 'Id Solicitud Info',
            'id_tinfo_faltante' => 'Tipo de Informacion Faltante',
            'id_treporte' => 'Informacion Solicitada a',
            'id_cactividad_proceso' => 'Id Cactividad Proceso',
            'id_tatencion' => 'Tipo de Atencion',
            'observaciones' => 'Observaciones',
            'oficio_atencion' => 'Oficio Atencion',
            'fecha_atencion' => 'Fecha Atencion',
            'id_cda' => 'Id Cda',
            'id_trespuesta' => 'Id Trespuesta',
            'observaciones_res' => 'Observaciones Res',
            'oficio_respuesta' => 'Oficio Respuesta',
            'fecha_respuesta' => 'Fecha Respuesta',
            'id_cactividad_proceso_res' => 'Id Cactividad Proceso Res',
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
    public function getIdTatencion()
    {
        return $this->hasOne(CdaTipoAtencion::className(), ['id_tatencion' => 'id_tatencion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTrespuesta()
    {
        return $this->hasOne(CdaTipoAtencion::className(), ['id_tatencion' => 'id_trespuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTinfoFaltante()
    {
        return $this->hasOne(CdaTipoInfoFaltante::className(), ['id_tinfo_faltante' => 'id_tinfo_faltante']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTreporte()
    {
        return $this->hasOne(CdaTipoReporte::className(), ['id_treporte' => 'id_treporte']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCactividadProceso()
    {
        return $this->hasOne(PsCactividadProceso::className(), ['id_cactividad_proceso' => 'id_cactividad_proceso']);
    }
}
