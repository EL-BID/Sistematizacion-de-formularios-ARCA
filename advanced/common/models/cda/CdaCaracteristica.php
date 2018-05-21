<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_caracteristica".
 *
 * @property integer $id_caracteristica
 * @property string $nom_caracteristica
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaCaracteristica extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_caracteristica';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_caracteristica', 'nom_caracteristica'], 'required'],
            [['id_caracteristica'], 'integer'],
            [['nom_caracteristica'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_caracteristica' => 'Id Caracteristica',
            'nom_caracteristica' => 'Nom Caracteristica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_caracteristica' => 'id_caracteristica']);
    }
}
