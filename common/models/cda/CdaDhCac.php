<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_dh_cac".
 *
 * @property integer $id_dh_cac
 * @property string $nom_dh_cac
 *
 * @property Cda[] $cdas
 */
class CdaDhCac extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_dh_cac';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_dh_cac'], 'required'],
            [['id_dh_cac'], 'integer'],
            [['nom_dh_cac'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_dh_cac' => 'Id Dh Cac',
            'nom_dh_cac' => 'Nom Dh Cac',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdas()
    {
        return $this->hasMany(Cda::className(), ['id_dh_cac' => 'id_dh_cac']);
    }
}
