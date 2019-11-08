<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_cartografia".
 *
 * @property integer $id_cartografia
 * @property string $nom_cartografia
 *
 * @property CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos
 */
class CdaCartografia extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_cartografia';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_cartografia', 'nom_cartografia'], 'required'],
            [['id_cartografia'], 'integer'],
            [['nom_cartografia'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_cartografia' => 'Cartografia',
            'nom_cartografia' => 'Nom Cartografia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaAnalisisHidrologicos()
    {
        return $this->hasMany(CdaAnalisisHidrologico::className(), ['id_cartografia' => 'id_cartografia']);
    }
}
