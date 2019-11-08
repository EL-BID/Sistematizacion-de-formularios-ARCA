<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_tipo_select".
 *
 * @property integer $id_tselect
 * @property string $nom_tselect
 *
 * @property PsActividad[] $psActividads
 * @property PsOpcTipoSelect[] $psOpcTipoSelects
 */
class PsTipoSelect extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_tipo_select';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tselect'], 'required'],
            [['id_tselect'], 'integer'],
            [['nom_tselect'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tselect' => 'Id Tselect',
            'nom_tselect' => 'Nom Tselect',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsActividads()
    {
        return $this->hasMany(PsActividad::className(), ['id_tselect' => 'id_tselect']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsOpcTipoSelects()
    {
        return $this->hasMany(PsOpcTipoSelect::className(), ['id_tselect' => 'id_tselect']);
    }
}
