<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_subdestino".
 *
 * @property integer $id_subdestino
 * @property string $nom_subdestino
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaSubdestino extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_subdestino';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_subdestino', 'nom_subdestino'], 'required'],
            [['id_subdestino'], 'integer'],
            [['nom_subdestino'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_subdestino' => 'Subdestino',
            'nom_subdestino' => 'Nombre Subdestino',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_subdestino' => 'id_subdestino']);
    }
}
