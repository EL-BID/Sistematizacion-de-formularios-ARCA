<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_tipo_actividad".
 *
 * @property integer $id_tactividad
 * @property string $nom_tactividad
 *
 * @property PsActividad[] $psActividads
 */
class PsTipoActividad extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_tipo_actividad';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tactividad', 'nom_tactividad'], 'required'],
            [['id_tactividad'], 'integer'],
            [['nom_tactividad'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tactividad' => 'Id Tactividad',
            'nom_tactividad' => 'Nom Tactividad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsActividads()
    {
        return $this->hasMany(PsActividad::className(), ['id_tactividad' => 'id_tactividad']);
    }
}
