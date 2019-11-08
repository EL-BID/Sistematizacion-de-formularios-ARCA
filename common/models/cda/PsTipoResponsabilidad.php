<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_tipo_responsabilidad".
 *
 * @property integer $id_tresponsabilidad
 * @property string $nom_responsabilidad
 * @property integer $id_proceso
 *
 * @property PsResponsablesProceso[] $psResponsablesProcesos
 * @property PsProceso $idProceso
 */
class PsTipoResponsabilidad extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_tipo_responsabilidad';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tresponsabilidad', 'nom_responsabilidad'], 'required'],
            [['id_tresponsabilidad', 'id_proceso'], 'integer'],
            [['nom_responsabilidad'], 'string', 'max' => 50],
            [['id_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsProceso::className(), 'targetAttribute' => ['id_proceso' => 'id_proceso']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tresponsabilidad' => 'Id Tresponsabilidad',
            'nom_responsabilidad' => 'Nom Responsabilidad',
            'id_proceso' => 'Id Proceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsResponsablesProcesos()
    {
        return $this->hasMany(PsResponsablesProceso::className(), ['id_tresponsabilidad' => 'id_tresponsabilidad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdProceso()
    {
        return $this->hasOne(PsProceso::className(), ['id_proceso' => 'id_proceso']);
    }
}
