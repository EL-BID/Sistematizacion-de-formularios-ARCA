<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_subtipo_fuente".
 *
 * @property integer $id_subtfuente
 * @property string $nom_subtfuente
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaSubtipoFuente extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_subtipo_fuente';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_subtfuente', 'nom_subtfuente'], 'required'],
            [['id_subtfuente'], 'integer'],
            [['nom_subtfuente'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_subtfuente' => 'Id Subtfuente',
            'nom_subtfuente' => 'Nom Subtfuente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_subtfuente' => 'id_subtfuente']);
    }
}
