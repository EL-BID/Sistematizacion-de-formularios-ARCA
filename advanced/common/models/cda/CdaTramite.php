<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\autenticacion\UsuariosAp;

/**
 * Este es el modelo para la clase "cda_tramite".
 *
 * @property integer $id_cda_tramite
 * @property integer $id_cda_solicitud
 * @property string $num_tramite
 * @property string $cod_solicitud_tecnico
 * @property integer $id_usuario
 * @property string $fecha_solicitud
 * @property integer $puntos_solicitados
 *
 * @property CdaSolicitud $idCdaSolicitud
 * @property UsuariosAp $idUsuario
 */
class CdaTramite extends ModelPry
{
    
    public $usuario;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_tramite';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_cda_solicitud', 'id_usuario','id_cproceso','devolver'], 'integer'],
            [['puntos_solicitados'],'integer','skipOnEmpty'=>true],
            [['fecha_solicitud'], 'safe'],
            [['num_tramite', 'cod_solicitud_tecnico','observacion'], 'string', 'max' => 100],
            [['id_cda_solicitud'], 'exist', 'skipOnError' => true, 'targetClass' => CdaSolicitud::className(), 'targetAttribute' => ['id_cda_solicitud' => 'id_cda_solicitud']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => UsuariosAp::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_cda_tramite' => 'Id Cda Tramite',
            'id_cda_solicitud' => 'Id Cda Solicitud',
            'num_tramite' => 'Número Trámite',
            'cod_solicitud_tecnico' => 'Código de Solicitud',
            'id_usuario' => 'Asignar Técnico',
            'fecha_solicitud' => 'Fecha Solicitud',
            'puntos_solicitados' => 'Puntos Solicitados',
            'observacion' => 'Observación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCdaSolicitud()
    {
        return $this->hasOne(CdaSolicitud::className(), ['id_cda_solicitud' => 'id_cda_solicitud']);
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
    public function getIdCproceso()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /*
     * Trayendo nombre de actividad de la tabla ic_cproceso
     */
    public function getIdActividad(){
        return $this->hasOne(PsActividad::className(), ['id_actividad' => 'ult_id_actividad'])->viaTable('ps_cproceso', ['id_cproceso' => 'id_cproceso']);
    }

    /*
     *
     */
}
