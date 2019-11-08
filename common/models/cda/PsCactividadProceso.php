<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_cactividad_proceso".
 *
 * @property integer $id_cactividad_proceso
 * @property string $observacion
 * @property string $fecha_realizacion
 * @property string $fecha_prevista
 * @property string $numero_quipux
 * @property integer $id_cproceso
 * @property string $id_usuario
 * @property integer $id_actividad
 * @property string $fecha_creacion
 * @property string $diligenciado
 * @property integer $dias_pausa
 * @property integer $id_opc_tselect
 * @property string $otro_cuales
 * @property integer $id_clasif_actividad
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 * @property CdaSolicitudInformacion[] $cdaSolicitudInformacions
 * @property PsAlertaActividad[] $psAlertaActividads
 * @property PsActividad $idActividad
 * @property PsCproceso $idCproceso
 * @property PsOpcTipoSelect $idOpcTselect
 * @property UsuariosAp $idUsuario
 */
class PsCactividadProceso extends ModelPry
{
    
    public $nombreactividad;
    public $causas;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_cactividad_proceso';
    }

    /**
     * @inheritdoc Reglas de Validación -- se agrega secuencia a id_cactividad_proceso por tanto no se asigna como required
     */
    public function rules()
    {
        return [
            [['id_cproceso','id_actividad', 'dias_pausa', 'id_opc_tselect', 'id_clasif_actividad'], 'integer','skipOnEmpty'=>true],
            [['fecha_realizacion', 'fecha_prevista', 'fecha_creacion'], 'string','skipOnEmpty'=>true],
            [['id_usuario','tipo'], 'number','skipOnEmpty'=>true],
            [['observacion', 'otro_cuales','puntos'], 'string', 'max' => 1000,'skipOnEmpty'=>true],
            [['numero_quipux'], 'string', 'max' => 50,'skipOnEmpty'=>true],
            [['diligenciado'], 'string', 'max' => 1,'skipOnEmpty'=>true],
            [['otro_cuales'], 'string', 'max' => 100,'skipOnEmpty'=>true],
            [['id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => PsActividad::className(), 'targetAttribute' => ['id_actividad' => 'id_actividad']],
            [['id_cproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso' => 'id_cproceso']],
            [['id_opc_tselect'], 'exist', 'skipOnError' => true, 'targetClass' => PsOpcTipoSelect::className(), 'targetAttribute' => ['id_opc_tselect' => 'id_opc_tselect']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\UsuariosAp::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_cactividad_proceso' => 'Id Cactividad Proceso',
            'observacion' => 'Observación',
            'fecha_realizacion' => 'Fecha Realización',
            'fecha_prevista' => 'Fecha Prevista',
            'numero_quipux' => 'Número Quipux',
            'id_cproceso' => 'Id Cproceso',
            'id_usuario' => 'Usuario',
            'id_actividad' => 'Actividad',
            'fecha_creacion' => 'Fecha Creación',
            'diligenciado' => 'Diligenciado',
            'dias_pausa' => 'Días Pausa',
            'id_opc_tselect' => 'Causal de Pausa',
            'otro_cuales' => 'Especifique',
            'id_clasif_actividad' => 'Id Clasif Actividad',
            'puntos'=>'Puntos Solicitados',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_cactividad_proceso' => 'id_cactividad_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaSolicitudInformacions()
    {
        return $this->hasMany(CdaSolicitudInformacion::className(), ['id_cactividad_proceso' => 'id_cactividad_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsAlertaActividads()
    {
        return $this->hasMany(PsAlertaActividad::className(), ['id_cactividad_proceso' => 'id_cactividad_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdActividad()
    {
        return $this->hasOne(PsActividad::className(), ['id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCproceso()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdOpcTselect()
    {
        return $this->hasOne(PsOpcTipoSelect::className(), ['id_opc_tselect' => 'id_opc_tselect']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsuario()
    {
        return $this->hasOne(\common\models\autenticacion\UsuariosAp::className(), ['id_usuario' => 'id_usuario']);
    }
    
    public function getCda0(){
        return $this->hasOne(\common\models\cda\Cda::className(), ['id_cproceso_arca' => 'id_cproceso'])->via('idCproceso');
    }
    
    public function getUltIdActividad(){
        return $this->hasOne(\common\models\cda\PsActividad::className(), ['id_actividad' => 'ult_id_actividad'])->via('idCproceso');
    }
    
     public function getPqrs(){
        return $this->hasOne(\common\models\pqrs\Pqrs::className(), ['id_cproceso' => 'id_cproceso'])->via('idCproceso');
    }
}
