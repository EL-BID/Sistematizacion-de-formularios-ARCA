<?php

namespace common\models\cda;

use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_solicitud_informacion".
 *
 * @property int                 $id_solicitud_info
 * @property int                 $id_tinfo_faltante
 * @property int                 $id_treporte
 * @property int                 $id_cactividad_proceso
 * @property int                 $id_tatencion
 * @property string              $observaciones
 * @property string              $oficio_atencion
 * @property string              $fecha_atencion
 * @property int                 $id_cda
 * @property int                 $id_trespuesta
 * @property string              $observaciones_res
 * @property string              $oficio_respuesta
 * @property string              $fecha_respuesta
 * @property int                 $id_cactividad_proceso_res
 * @property Cda                 $idCda
 * @property CdaTipoAtencion     $idTatencion
 * @property CdaTipoAtencion     $idTrespuesta
 * @property CdaTipoInfoFaltante $idTinfoFaltante
 * @property CdaTipoReporte      $idTreporte
 * @property PsCactividadProceso $idCactividadProceso
 */
class CdaSolicitudInformacion extends ModelPry
{
    
        
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cda_solicitud_informacion';
    }

    /**
     * {@inheritdoc} Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tinfo_faltante', 'id_treporte', 'id_cactividad_proceso', 'id_tatencion', 'id_cda_tramite','id_cda_solicitud', 'id_trespuesta', 'id_cactividad_proceso_res'], 'integer','skipOnEmpty'=>true],
            [['fecha_atencion', 'fecha_respuesta','fecha_elaboracion_quipux','fecha_salida'], 'safe'],
            [['observaciones', 'observaciones_res'], 'string', 'max' => 1000,'skipOnEmpty'=>true],
            [['forma_atencion_cda','oficio_atencion', 'oficio_respuesta', 'causa_anulacion', 'causa_correccion', 'estado'], 'string', 'max' => 50,'skipOnEmpty'=>true],
            [['id_tatencion'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoAtencion::className(), 'targetAttribute' => ['id_tatencion' => 'id_tatencion']],
            [['id_cda_tramite'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTramite::className(), 'targetAttribute' => ['id_cda_tramite' => 'id_cda_tramite']],
            [['id_trespuesta'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoAtencion::className(), 'targetAttribute' => ['id_trespuesta' => 'id_tatencion']],
            [['id_tinfo_faltante'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoInfoFaltante::className(), 'targetAttribute' => ['id_tinfo_faltante' => 'id_tinfo_faltante']],
            [['id_treporte'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoReporte::className(), 'targetAttribute' => ['id_treporte' => 'id_treporte']],
            [['id_cactividad_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCactividadProceso::className(), 'targetAttribute' => ['id_cactividad_proceso' => 'id_cactividad_proceso']],
            [['id_cactividad_proceso','oficio_atencion','observaciones','fecha_atencion','fecha_elaboracion_quipux',
                'id_cda_tramite','tienecda','fecha_ingreso_quipux','id_demarcacion','cod_centro_atencion_ciudadano','fecha_oficio'
                ,'fecha_ingreso_anexos_fisicos','fecha_recepcion_anexos','beneficiario_representante',
                'beneficiario_razonsocial','mes_salida','no_tramite_administrativo'], 'string', 'on' => 'datossalida'],
            [['cod_provincia','cod_canton','id_uso_solicitado','id_destino','id_cod_cda','id_subdestino','puntos_solicitados','puntos_simplificados','puntos_devueltos'],'integer','skipOnEmpty'=>true,'on'=>'datossalida'],
            [['id_tinfo_faltante','id_treporte','id_tatencion','id_cda_solicitud','id_tinfo_faltante','id_cactividad_proceso_res'],'integer','skipOnEmpty'=>true,'on'=>'datossalida'],
            [['forma_atencion_cda','causa_anulacion','causa_correccion','fecha_salida'],'string','skipOnEmpty'=>true,'on'=>'datossalida'],
            [['estado'],'string','skipOnEmpty'=>true,'on'=>'datossalida'],
            [['q_solicitado'], 'number', 'numberPattern' => '/^[0-9]+(\.[0-9]{1,4})?$/','message'=>'El valor debe ser un numero decimal separado por punt "." Ej:2.9025','skipOnEmpty'=>true],
            [['oficio_atencion','observaciones','fecha_atencion','fecha_salida','fecha_elaboracion_quipux',
                'estado','id_cda_solicitud','tienecda','fecha_ingreso_quipux','id_demarcacion','cod_centro_atencion_ciudadano','fecha_oficio'
                ,'fecha_ingreso_anexos_fisicos','fecha_recepcion_anexos','puntos_solicitados','puntos_simplificados','puntos_devueltos','beneficiario_representante',
                'beneficiario_razonsocial','mes_salida','no_tramite_administrativo'],'string','on'=>'datossolicitud'],
            [['id_cactividad_proceso','cod_provincia','cod_canton','id_uso_solicitado','id_destino','id_cod_cda','id_subdestino'],'integer','on'=>'datossolicitud'],
            [['forma_atencion_cda','causa_anulacion','causa_correccion'],'string','on'=>'datossolicitud'],
        ];
    }

    /**
     * {@inheritdoc} Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_solicitud_info' => 'Id Solicitud Info',
            'id_tinfo_faltante' => 'Tipo de Información Faltante',
            'id_treporte' => 'Información Solicitada a',
            'id_cactividad_proceso' => 'Id Cactividad Proceso',
            'id_tatencion' => 'Tipo de Atención',
            'id_cda_tramite' => 'id Tramite',
            'observaciones' => 'Observaciones',
            'oficio_atencion' => 'Oficio Atención',
            'fecha_atencion' => 'Fecha Atención',
            'id_trespuesta' => 'Tipo de Respuesta',
            'observaciones_res' => 'Observaciones Res',
            'oficio_respuesta' => 'Oficio Respuesta',
            'fecha_respuesta' => 'Fecha Respuesta',
            'id_cactividad_proceso_res' => 'Id Cactividad Proceso Res',
            'causa_correccion' => 'Causa Corrección',
            'id_cod_cda' => 'Código CDA',
            'forma_atencion_cda' => 'Forma de atención CDA',
            'fecha_elaboracion_quipux' => 'Fecha de Elaboración Quipux',
            'fecha_salida' => 'Fecha de salida',
            'id_subdestino' => 'Subdestino',
            'tienecda' => 'Tiene CDA',
            'id_demarcacion' => 'Demarcación',
            'cod_centro_atencion_ciudadano' => 'Centro Atención Ciudadano',
            'beneficiario_representante' => 'Beneficiario Representante',
            'beneficiario_razonsocial' => 'Beneficiario Razón Social',
            'cod_provincia' =>'Provincia',
            'cod_canton'=>'Canton',
            'id_uso_solicitado'=>'Uso Solicitado',
            'id_destino' =>'Destino',
        ];
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
