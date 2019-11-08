<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_historico_estados".
 *
 * @property integer $id_hisotrico_cproceso
 * @property string $fecha_estado
 * @property string $observaciones
 * @property integer $id_eproceso
 * @property integer $id_cproceso
 * @property integer $id_usuario
 * @property integer $id_actividad
 * @property integer $id_tgestion
 *
 * @property PsActividad $idActividad
 * @property PsCproceso $idCproceso
 * @property PsEstadoProceso $idEproceso
 * @property PsTipoGestion $idTgestion
 * @property UsuariosAp $idUsuario
 */
class PsHistoricoEstados extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_historico_estados';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_estado'], 'required'],
            [['id_eproceso', 'id_cproceso', 'id_usuario', 'id_actividad', 'id_tgestion'], 'integer','skipOnEmpty'=>true],
            [['fecha_estado'], 'string'],
            [['observaciones'], 'string', 'max' => 1000,'skipOnEmpty'=>true],
            [['id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => PsActividad::className(), 'targetAttribute' => ['id_actividad' => 'id_actividad']],
            [['id_cproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso' => 'id_cproceso']],
            [['id_eproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsEstadoProceso::className(), 'targetAttribute' => ['id_eproceso' => 'id_eproceso']],
            [['id_tgestion'], 'exist', 'skipOnError' => true, 'targetClass' => PsTipoGestion::className(), 'targetAttribute' => ['id_tgestion' => 'id_tgestion']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\UsuariosAp::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_hisotrico_cproceso' => 'Id Hisotrico Cproceso',
            'fecha_estado' => 'Fecha Estado',
            'observaciones' => 'Observaciones',
            'id_eproceso' => 'Id Eproceso',
            'id_cproceso' => 'Id Cproceso',
            'id_usuario' => 'Id Usuario',
            'id_actividad' => 'Id Actividad',
            'id_tgestion' => 'Id Tgestion',
        ];
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
    public function getIdEproceso()
    {
        return $this->hasOne(PsEstadoProceso::className(), ['id_eproceso' => 'id_eproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTgestion()
    {
        return $this->hasOne(PsTipoGestion::className(), ['id_tgestion' => 'id_tgestion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsuario()
    {
        return $this->hasOne(\common\models\autenticacion\UsuariosAp::className(), ['id_usuario' => 'id_usuario']);
    }
}
