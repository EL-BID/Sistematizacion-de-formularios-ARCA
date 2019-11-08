<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_rol".
 *
 * @property integer $id_cda_rol
 * @property string $nom_cda_rol
 *
 * @property Cda[] $cdas
 */
class CdaRol extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_rol';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_cda_rol'], 'required'],
            [['id_cda_rol'], 'integer'],
            [['nom_cda_rol'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_cda_rol' => 'Id Cda Rol',
            'nom_cda_rol' => 'Nom Cda Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdas()
    {
        return $this->hasMany(Cda::className(), ['id_cda_rol' => 'id_cda_rol']);
    }
}
