<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_proceso".
 *
 * @property integer $id_proceso
 * @property string $nom_proceso
 * @property integer $id_tproceso
 * @property integer $id_modulo
 * @property string $url_datos_basicos
 *
 * @property PsActividad[] $psActividads
 * @property PsCproceso[] $psCprocesos
 * @property PsEstadoProceso[] $psEstadoProcesos
 * @property FdModulo $idModulo
 * @property PsTipoProceso $idTproceso
 * @property PsTipoResponsabilidad[] $psTipoResponsabilidads
 */
class PsProceso extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_proceso';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_proceso', 'nom_proceso'], 'required'],
            [['id_proceso', 'id_tproceso', 'id_modulo'], 'integer'],
            [['nom_proceso', 'url_datos_basicos'], 'string', 'max' => 50],
            [['id_modulo'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\poc\FdModulo::className(), 'targetAttribute' => ['id_modulo' => 'id_modulo']],
            [['id_tproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsTipoProceso::className(), 'targetAttribute' => ['id_tproceso' => 'id_tproceso']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_proceso' => 'Id Proceso',
            'nom_proceso' => 'Nom Proceso',
            'id_tproceso' => 'Id Tproceso',
            'id_modulo' => 'Id Modulo',
            'url_datos_basicos' => 'Url Datos Basicos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsActividads()
    {
        return $this->hasMany(PsActividad::className(), ['id_proceso' => 'id_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsCprocesos()
    {
        return $this->hasMany(PsCproceso::className(), ['id_proceso' => 'id_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsEstadoProcesos()
    {
        return $this->hasMany(PsEstadoProceso::className(), ['id_proceso' => 'id_proceso']);
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
    public function getIdTproceso()
    {
        return $this->hasOne(PsTipoProceso::className(), ['id_tproceso' => 'id_tproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsTipoResponsabilidads()
    {
        return $this->hasMany(PsTipoResponsabilidad::className(), ['id_proceso' => 'id_proceso']);
    }
}
