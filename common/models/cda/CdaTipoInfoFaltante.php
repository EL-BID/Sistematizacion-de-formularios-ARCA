<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_tipo_info_faltante".
 *
 * @property integer $id_tinfo_faltante
 * @property string $nom_tinfo_faltante
 *
 * @property CdaSolicitudInformacion[] $cdaSolicitudInformacions
 */
class CdaTipoInfoFaltante extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_tipo_info_faltante';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tinfo_faltante', 'nom_tinfo_faltante'], 'required'],
            [['id_tinfo_faltante'], 'integer'],
            [['nom_tinfo_faltante'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tinfo_faltante' => 'Id Tinfo Faltante',
            'nom_tinfo_faltante' => 'Nom Tinfo Faltante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaSolicitudInformacions()
    {
        return $this->hasMany(CdaSolicitudInformacion::className(), ['id_tinfo_faltante' => 'id_tinfo_faltante']);
    }
}
