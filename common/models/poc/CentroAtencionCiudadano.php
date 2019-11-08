<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "centro_atencion_ciudadano".
 *
 * @property integer $cod_centro_atencion_ciudadano
 * @property string $nom_centro_atencion_ciudadano
 *
 * @property FdUbicacion[] $fdUbicacions
 */
class CentroAtencionCiudadano extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'centro_atencion_ciudadano';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['cod_centro_atencion_ciudadano', 'nom_centro_atencion_ciudadano'], 'required'],
            [['cod_centro_atencion_ciudadano'], 'integer'],
            [['nom_centro_atencion_ciudadano'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'cod_centro_atencion_ciudadano' => 'Cod Centro Atencion Ciudadano',
            'nom_centro_atencion_ciudadano' => 'Nom Centro Atencion Ciudadano',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdUbicacions()
    {
        return $this->hasMany(FdUbicacion::className(), ['cod_centro_atencion_ciudadano' => 'cod_centro_atencion_ciudadano']);
    }
}
