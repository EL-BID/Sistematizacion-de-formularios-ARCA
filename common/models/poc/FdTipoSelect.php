<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_tipo_select".
 *
 * @property integer $id_tselect
 * @property string $nom_tselect
 *
 * @property FdOpcionSelect[] $fdOpcionSelects
 * @property FdPregunta[] $fdPreguntas
 */
class FdTipoSelect extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tipo_select';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tselect', 'nom_tselect'], 'required'],
            [['id_tselect'], 'integer'],
            [['nom_tselect'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
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
    public function getFdOpcionSelects()
    {
        return $this->hasMany(FdOpcionSelect::className(), ['id_tselect' => 'id_tselect']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntas()
    {
        return $this->hasMany(FdPregunta::className(), ['id_tselect' => 'id_tselect']);
    }
}
