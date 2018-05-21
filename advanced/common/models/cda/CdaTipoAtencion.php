<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_tipo_atencion".
 *
 * @property integer $id_tatencion
 * @property string $nom_tatencion
 *
 * @property CdaSolicitudInformacion[] $cdaSolicitudInformacions
 * @property CdaSolicitudInformacion[] $cdaSolicitudInformacions0
 */
class CdaTipoAtencion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_tipo_atencion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tatencion', 'nom_tatencion'], 'required'],
            [['id_tatencion'], 'integer'],
            [['nom_tatencion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tatencion' => 'Id Tatencion',
            'nom_tatencion' => 'Nom Tatencion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaSolicitudInformacions()
    {
        return $this->hasMany(CdaSolicitudInformacion::className(), ['id_tatencion' => 'id_tatencion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaSolicitudInformacions0()
    {
        return $this->hasMany(CdaSolicitudInformacion::className(), ['id_trespuesta' => 'id_tatencion']);
    }
}
