<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_estado_proceso".
 *
 * @property integer $id_eproceso
 * @property string $nom_eproceso
 * @property integer $id_proceso
 *
 * @property PsActividadRuta[] $psActividadRutas
 * @property PsCproceso[] $psCprocesos
 * @property PsProceso $idProceso
 * @property PsHistoricoEstados[] $psHistoricoEstados
 */
class PsEstadoProceso extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_estado_proceso';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_eproceso', 'nom_eproceso'], 'required'],
            [['id_eproceso', 'id_proceso'], 'integer'],
            [['nom_eproceso'], 'string', 'max' => 50],
            [['id_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsProceso::className(), 'targetAttribute' => ['id_proceso' => 'id_proceso']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_eproceso' => 'Id Eproceso',
            'nom_eproceso' => 'Nom Eproceso',
            'id_proceso' => 'Id Proceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsActividadRutas()
    {
        return $this->hasMany(PsActividadRuta::className(), ['id_eproceso' => 'id_eproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsCprocesos()
    {
        return $this->hasMany(PsCproceso::className(), ['ult_id_eproceso' => 'id_eproceso']);
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
    public function getPsHistoricoEstados()
    {
        return $this->hasMany(PsHistoricoEstados::className(), ['id_eproceso' => 'id_eproceso']);
    }
}
