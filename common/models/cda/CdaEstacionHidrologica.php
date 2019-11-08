<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_estacion_hidrologica".
 *
 * @property string $id_ehidrografica
 * @property string $nom_ehidrografica
 *
 * @property CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos
 */
class CdaEstacionHidrologica extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_estacion_hidrologica';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_ehidrografica', 'nom_ehidrografica'], 'required'],
            [['id_ehidrografica', 'nom_ehidrografica'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_ehidrografica' => 'Id Ehidrografica',
            'nom_ehidrografica' => 'Nom Ehidrografica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaAnalisisHidrologicos()
    {
        return $this->hasMany(CdaAnalisisHidrologico::className(), ['id_ehidrografica' => 'id_ehidrografica']);
    }
}
