<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_instituciones_apoyo".
 *
 * @property integer $Id
 * @property string $instituciones_apoyo
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaInstitucionesApoyo extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_instituciones_apoyo';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['Id'], 'required'],
            [['Id'], 'integer'],
            [['instituciones_apoyo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'instituciones_apoyo' => 'Instituciones Apoyo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_cda_institucion_apoyo' => 'Id']);
    }
}
