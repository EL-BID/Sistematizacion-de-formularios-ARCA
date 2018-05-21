<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_tipo_view_formato".
 *
 * @property integer $id_tipo_view_formato
 * @property string $nom_tipo_view_formato
 *
 * @property FdConjuntoPregunta[] $fdConjuntoPreguntas
 * @property FdFormato[] $fdFormatos
 */
class FdTipoViewFormato extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tipo_view_formato';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tipo_view_formato', 'nom_tipo_view_formato'], 'required'],
            [['id_tipo_view_formato'], 'integer'],
            [['nom_tipo_view_formato'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_view_formato' => 'Id Tipo View Formato',
            'nom_tipo_view_formato' => 'Nom Tipo View Formato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdConjuntoPreguntas()
    {
        return $this->hasMany(FdConjuntoPregunta::className(), ['id_tipo_view_formato' => 'id_tipo_view_formato']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdFormatos()
    {
        return $this->hasMany(FdFormato::className(), ['id_tipo_view_formato' => 'id_tipo_view_formato']);
    }
}
