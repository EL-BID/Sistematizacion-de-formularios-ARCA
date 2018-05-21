<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_estacion_meteorologica".
 *
 * @property string $id_emeteorologica
 * @property string $nom_emeteorologica
 *
 * @property CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos
 */
class CdaEstacionMeteorologica extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_estacion_meteorologica';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_emeteorologica', 'nom_emeteorologica'], 'required'],
            [['id_emeteorologica'], 'string', 'max' => 10],
            [['nom_emeteorologica'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_emeteorologica' => 'Id Emeteorologica',
            'nom_emeteorologica' => 'Nom Emeteorologica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaAnalisisHidrologicos()
    {
        return $this->hasMany(CdaAnalisisHidrologico::className(), ['id_emeteorologica' => 'id_emeteorologica']);
    }
}
