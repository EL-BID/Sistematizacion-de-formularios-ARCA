<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_tipo_error".
 *
 * @property integer $id_terror
 * @property string $nom_terror
 *
 * @property CdaErrores[] $cdaErrores
 */
class CdaTipoError extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_tipo_error';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_terror', 'nom_terror'], 'required'],
            [['id_terror'], 'integer'],
            [['nom_terror'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_terror' => 'Id Terror',
            'nom_terror' => 'Nom Terror',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaErrores()
    {
        return $this->hasMany(CdaErrores::className(), ['id_terror' => 'id_terror']);
    }
}
