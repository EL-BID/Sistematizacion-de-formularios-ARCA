<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_cod_cda".
 *
 * @property string $cod_cda
 * @property integer $id_cda
 * @property string $id_cod_cda
 *
 * @property Cda $idCda
 */
class PsCodCda extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_cod_cda';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['cod_cda', 'id_cda'], 'required'],
            [['id_cda'], 'integer'],
            [['cod_cda'], 'string', 'max' => 255],
            [['cod_cda'], 'unique'],
            [['id_cda'], 'exist', 'skipOnError' => true, 'targetClass' => Cda::className(), 'targetAttribute' => ['id_cda' => 'id_cda']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'cod_cda' => 'Código CDA',
            'id_cda' => 'Id Cda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCda()
    {
        return $this->hasOne(Cda::className(), ['id_cda' => 'id_cda']);
    }
}
