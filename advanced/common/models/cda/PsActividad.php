<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_actividad".
 *
 * @property integer $id_actividad
 * @property string $nom_actividad
 * @property integer $orden
 * @property integer $id_proceso
 * @property integer $id_tactividad
 * @property string $subpantalla
 * @property integer $id_tselect
 * @property integer $id_clasif_actividad
 * @property integer $plazo_alerta
 * @property string $campo_fecha_alerta
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 * @property PsProceso $idProceso
 * @property PsTipoActividad $idTactividad
 * @property PsTipoSelect $idTselect
 * @property PsActvidadRuta[] $psActvidadRutas
 * @property PsActvidadRuta[] $psActvidadRutas0
 * @property PsAlerta[] $psAlertas
 * @property PsAlertaActividad[] $psAlertaActividads
 * @property PsCactividadProceso[] $psCactividadProcesos
 * @property PsCproceso[] $psCprocesos
 * @property PsHistoricoEstados[] $psHistoricoEstados
 */
class PsActividad extends ModelPry
{
    
    public $diligenciado;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_actividad';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_actividad', 'nom_actividad', 'orden', 'id_clasif_actividad'], 'required'],
            [['id_actividad', 'orden', 'id_proceso', 'id_tactividad', 'id_tselect', 'id_clasif_actividad', 'plazo_alerta'], 'integer'],
            [['nom_actividad'], 'string', 'max' => 200],
            [['subpantalla', 'campo_fecha_alerta'], 'string', 'max' => 50],
            [['id_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsProceso::className(), 'targetAttribute' => ['id_proceso' => 'id_proceso']],
            [['id_tactividad'], 'exist', 'skipOnError' => true, 'targetClass' => PsTipoActividad::className(), 'targetAttribute' => ['id_tactividad' => 'id_tactividad']],
            [['id_tselect'], 'exist', 'skipOnError' => true, 'targetClass' => PsTipoSelect::className(), 'targetAttribute' => ['id_tselect' => 'id_tselect']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_actividad' => 'Id Actividad',
            'nom_actividad' => 'Nom Actividad',
            'orden' => 'Orden',
            'id_proceso' => 'Id Proceso',
            'id_tactividad' => 'Id Tactividad',
            'subpantalla' => 'Subpantalla',
            'id_tselect' => 'Id Tselect',
            'id_clasif_actividad' => 'Id Clasif Actividad',
            'plazo_alerta' => 'Plazo Alerta',
            'campo_fecha_alerta' => 'Campo Fecha Alerta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_actividad' => 'id_actividad']);
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
    public function getIdTactividad()
    {
        return $this->hasOne(PsTipoActividad::className(), ['id_tactividad' => 'id_tactividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTselect()
    {
        return $this->hasOne(PsTipoSelect::className(), ['id_tselect' => 'id_tselect']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsActvidadRutas()
    {
        return $this->hasMany(PsActvidadRuta::className(), ['id_actividad_origen' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsActvidadRutas0()
    {
        return $this->hasMany(PsActvidadRuta::className(), ['id_actividad_destino' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsAlertas()
    {
        return $this->hasMany(PsAlerta::className(), ['id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsAlertaActividads()
    {
        return $this->hasMany(PsAlertaActividad::className(), ['id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsCactividadProcesos()
    {
        return $this->hasMany(PsCactividadProceso::className(), ['id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsCprocesos()
    {
        return $this->hasMany(PsCproceso::className(), ['ult_id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsHistoricoEstados()
    {
        return $this->hasMany(PsHistoricoEstados::className(), ['id_actividad' => 'id_actividad']);
    }
}
