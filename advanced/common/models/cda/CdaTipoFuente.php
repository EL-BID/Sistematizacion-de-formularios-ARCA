<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_tipo_fuente".
 *
 * @property integer $id_tfuente
 * @property string $nom_tfuente
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaTipoFuente extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_tipo_fuente';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tfuente', 'nom_tfuente'], 'required'],
            [['id_tfuente'], 'integer'],
            [['nom_tfuente'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tfuente' => 'Id Tfuente',
            'nom_tfuente' => 'Nom Tfuente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_tfuente' => 'id_tfuente']);
    }
}
