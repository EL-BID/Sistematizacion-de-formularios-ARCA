<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "tr_tipo_documento".
 *
 * @property integer $id_tdocumento
 * @property string $nom_tdocumento
 *
 * @property FdDatosGenerales[] $fdDatosGenerales
 */
class TrTipoDocumento extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_tipo_documento';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tdocumento', 'nom_tdocumento'], 'required'],
            [['id_tdocumento'], 'integer'],
            [['nom_tdocumento'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tdocumento' => 'Id Tdocumento',
            'nom_tdocumento' => 'Nom Tdocumento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdDatosGenerales()
    {
        return $this->hasMany(FdDatosGenerales::className(), ['id_tdocumento' => 'id_tdocumento']);
    }
}
