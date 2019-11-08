<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "tr_tipo_periodo".
 *
 * @property integer $id_tperiodo
 * @property string $nom_tperiodo
 *
 * @property TrPeriodo[] $trPeriodos
 */
class TrTipoPeriodo extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_tipo_periodo';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tperiodo'], 'required'],
            [['id_tperiodo'], 'integer'],
            [['nom_tperiodo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tperiodo' => 'Id Tperiodo',
            'nom_tperiodo' => 'Nom Tperiodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getTrPeriodos()
    {
        return $this->hasMany(TrPeriodo::className(), ['id_tperiodo' => 'id_tperiodo']);
    }
}
