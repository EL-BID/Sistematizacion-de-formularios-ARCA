<?php

namespace common\models\cda;

use common\models\modelpry\ModelPry;
use common\models\pqrs\Pqrs;

/**
 * Este es el modelo para la clase "ps_cproceso".
 *
 * @property int                     $id_cproceso
 * @property int                     $ult_id_eproceso
 * @property int                     $id_proceso
 * @property string                  $id_usuario
 * @property int                     $id_modulo
 * @property string                  $num_quipux
 * @property string                  $fecha_registro_quipux
 * @property string                  $asunto_quipux
 * @property string                  $tipo_documento_quipux
 * @property int                     $ult_id_actividad
 * @property string                  $ult_id_usuario
 * @property string                  $ult_fecha_actividad
 * @property string                  $ult_fecha_estado
 * @property string                  $numero
 * @property Cda[]                   $cdas
 * @property Cda[]                   $cdas0
 * @property Pqrs[]                  $pqrs
 * @property PsActividadQuipux[]     $psActividadQuipuxes
 * @property PsAlertaActividad[]     $psAlertaActividads
 * @property PsCactividadProceso[]   $psCactividadProcesos
 * @property FdModulo                $idModulo
 * @property PsActividad             $ultIdActividad
 * @property PsEstadoProceso         $ultIdEproceso
 * @property PsProceso               $idProceso
 * @property UsuariosAp              $idUsuario
 * @property UsuariosAp              $ultIdUsuario
 * @property PsHistoricoEstados[]    $psHistoricoEstados
 * @property PsResponsablesProceso[] $psResponsablesProcesos
 */
class PsCproceso extends ModelPry
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ps_cproceso';
    }

    /**
     * {@inheritdoc} Reglas de Validación
     */
    public function rules()
    {
        return [
            [['ult_id_eproceso', 'id_usuario', 'id_proceso', 'id_modulo', 'ult_id_actividad', 'ult_id_usuario','id_usuario'], 'integer','skipOnEmpty'=>true],
            [['fecha_registro_quipux', 'ult_fecha_actividad', 'ult_fecha_estado', 'fecha_solicitud'], 'string','skipOnEmpty'=>true],
            [['num_quipux'], 'string', 'max' => 500,'skipOnEmpty'=>true],
            [['asunto_quipux'], 'string', 'max' => 4000,'skipOnEmpty'=>true],
            [['tipo_documento_quipux'], 'string', 'max' => 50,'skipOnEmpty'=>true],
            [['numero'], 'string', 'max' => 100,'skipOnEmpty'=>true],
            [['id_modulo'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\poc\FdModulo::className(), 'targetAttribute' => ['id_modulo' => 'id_modulo']],
            [['ult_id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => PsActividad::className(), 'targetAttribute' => ['ult_id_actividad' => 'id_actividad']],
            [['ult_id_eproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsEstadoProceso::className(), 'targetAttribute' => ['ult_id_eproceso' => 'id_eproceso']],
            [['id_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsProceso::className(), 'targetAttribute' => ['id_proceso' => 'id_proceso']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\UsuariosAp::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
            [['ult_id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\UsuariosAp::className(), 'targetAttribute' => ['ult_id_usuario' => 'id_usuario']],
            [['num_quipux'], 'required', 'on' => 'pscprocesoarca'],
            [['num_quipux'], 'required', 'on' => 'pscprocesoseagua'],
            [['num_quipux', 'fecha_registro_quipux', 'asunto_quipux', 'numero', 'fecha_solicitud'], 'required', 'on' => 'datosbasicospqr'],
        ];
    }

    /**
     * {@inheritdoc} Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        switch ($this->scenario) {
            case 'pscprocesoarca':
                return [
                    'id_cproceso' => 'Id Cproceso',
                    'ult_id_eproceso' => 'Estado',
                    'id_proceso' => 'Proceso',
                    'id_usuario' => 'Usuario',
                    'id_modulo' => 'Id Modulo',
                    'num_quipux' => 'Número Quipux Arca',
                    'fecha_registro_quipux' => 'Fecha Registro Quipux',
                    'asunto_quipux' => 'Asunto Quipux',
                    'tipo_documento_quipux' => 'Tipo Documento Quipux',
                    'ult_id_actividad' => 'Actividad',
                    'ult_id_usuario' => 'Responsable ',
                    'ult_fecha_actividad' => 'Fecha Actividad',
                    'ult_fecha_estado' => 'Fecha Estado',
                    'numero' => 'Número de Solicitud',
                    'fecha_solicitud' => 'Fecha Solicitud',
                ];

            break;

            case 'pscprocesoseagua':
                return [
                    'id_cproceso' => 'Id Cproceso',
                    'ult_id_eproceso' => 'Estado',
                    'id_proceso' => 'Id Proceso',
                    'id_usuario' => 'Id Usuario',
                    'id_modulo' => 'Id Modulo',
                    'num_quipux' => 'Número Quipux SENAGUA',
                    'fecha_registro_quipux' => 'Fecha Registro Quipux',
                    'asunto_quipux' => 'Asunto Quipux',
                    'tipo_documento_quipux' => 'Tipo Documento Quipux',
                    'ult_id_actividad' => 'Ult Id Actividad',
                    'ult_id_usuario' => 'Responsable: ',
                    'ult_fecha_actividad' => 'Ult Fecha Actividad',
                    'ult_fecha_estado' => 'Ult Fecha Estado',
                    'numero' => 'Numero de Solicitud',
                    'fecha_solicitud' => 'Fecha Solicitud',
                ];

            break;

            case 'datosbasicospqr':
                return [
                    'num_quipux' => 'Número Quipux',
                    'fecha_registro_quipux' => 'Fecha Registro Quipux',
                    'asunto_quipux' => 'Asunto Quipux',
                    'numero' => 'Numero',
                    'fecha_solicitud' => 'Fecha Solicitud',
                    'ult_id_eproceso' => 'Estado',
                ];

            break;

            default:
                return [
                    'id_cproceso' => 'Id Cproceso',
                    'ult_id_eproceso' => 'Ult Id Eproceso',
                    'id_proceso' => 'Id Proceso',
                    'id_usuario' => 'Id Usuario',
                    'id_modulo' => 'Id Modulo',
                    'num_quipux' => 'Num Quipux',
                    'fecha_registro_quipux' => 'Fecha Registro Quipux',
                    'asunto_quipux' => 'Asunto Quipux',
                    'tipo_documento_quipux' => 'Tipo Documento Quipux',
                    'ult_id_actividad' => 'Ult Id Actividad',
                    'ult_id_usuario' => 'Ult Id Usuario',
                    'ult_fecha_actividad' => 'Ult Fecha Actividad',
                    'ult_fecha_estado' => 'Ult Fecha Estado',
                    'numero' => 'Numero',
                    'fecha_solicitud' => 'Fecha Solicitud',
                ];

            break;
        }
    }

    /**
     * Declarando Escenario para el oblitario de numero y num_quipux.
     */

    /*Aplicando scenarios*/
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['pscprocesoarca'] = [
                                            'id_cproceso',
                                            'ult_id_eproceso',
                                            'id_proceso',
                                            'id_usuario',
                                            'id_modulo',
                                            'num_quipux',
                                            'fecha_registro_quipux',
                                            'asunto_quipux',
                                            'tipo_documento_quipux',
                                            'ult_id_actividad',
                                            'ult_id_usuario',
                                            'ult_fecha_actividad',
                                            'ult_fecha_estado',
                                            'numero',
                                            'fecha_solicitud',
                                        ];
        $scenarios['pscprocesoseagua'] = [
                                            'id_cproceso', 'ult_id_eproceso', 'id_proceso',
                                            'id_usuario',
                                            'id_modulo',
                                            'num_quipux',
                                            'fecha_registro_quipux',
                                            'asunto_quipux',
                                            'tipo_documento_quipux',
                                            'ult_id_actividad',
                                            'ult_id_usuario',
                                            'ult_fecha_actividad',
                                            'ult_fecha_estado',
                                            'numero',
                                            'fecha_solicitud',
                                        ];

        $scenarios['datosbasicospqr'] = [
                                            'num_quipux',
                                            'fecha_registro_quipux',
                                            'asunto_quipux',
                                            'numero',
                                            'fecha_solicitud',
                                         ];

        return $scenarios;
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdas()
    {
        return $this->hasMany(CdaSolicitud::className(), ['id_cproceso_arca' => 'id_cproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdas0()
    {
        return $this->hasMany(CdaSolicitud::className(), ['id_cproceso_senagua' => 'id_cproceso']);
    }
    
    /*
     * return valores del tramite
     */
    public function getTramite(){
        return $this->hasMany(CdaTramite::className(), ['id_cproceso' => 'id_cproceso']);
    }
            
    

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPqrs()
    {
        return $this->hasMany(Pqrs::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsActividadQuipuxes()
    {
        return $this->hasMany(PsActividadQuipux::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsAlertaActividads()
    {
        return $this->hasMany(PsAlertaActividad::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsCactividadProcesos()
    {
        return $this->hasMany(PsCactividadProceso::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdModulo()
    {
        return $this->hasOne(FdModulo::className(), ['id_modulo' => 'id_modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getUltIdActividad()
    {
        return $this->hasOne(PsActividad::className(), ['id_actividad' => 'ult_id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getUltIdEproceso()
    {
        return $this->hasOne(PsEstadoProceso::className(), ['id_eproceso' => 'ult_id_eproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdProceso()
    {
        return $this->hasOne(PsProceso::className(), ['id_proceso' => 'id_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsuario()
    {
        return $this->hasOne(UsuariosAp::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getUltIdUsuario()
    {
        return $this->hasOne(UsuariosAp::className(), ['id_usuario' => 'ult_id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsHistoricoEstados()
    {
        return $this->hasMany(PsHistoricoEstados::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsResponsablesProcesos()
    {
        return $this->hasMany(PsResponsablesProceso::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /*
     * retorna la ultima actividad cproceso relaciona a un cproceso
     */

    public function getObtenerultidcactividaproceso()
    {
        return $this->hasOne(PsCactividadProceso::className(), ['id_cproceso' => 'id_cproceso'])->orderBy(['ps_cactividad_proceso.fecha_creacion' => SORT_DESC]);
    }
}
