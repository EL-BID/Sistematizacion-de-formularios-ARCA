<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_modulo".
 *
 * @property integer $id_modulo
 * @property string $nom_modulo
 *
 * @property FdAdmEstado[] $fdAdmEstados
 * @property FdFormato[] $fdFormatos
 */
class FdModulo extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_modulo';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_modulo', 'nom_modulo'], 'required'],
            [['id_modulo'], 'integer'],
            [['nom_modulo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_modulo' => 'Id Modulo',
            'nom_modulo' => 'Nom Modulo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdAdmEstados()
    {
        return $this->hasMany(FdAdmEstado::className(), ['id_modulo' => 'id_modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdFormatos()
    {
        return $this->hasMany(FdFormato::className(), ['id_modulo' => 'id_modulo']);
    }
}
