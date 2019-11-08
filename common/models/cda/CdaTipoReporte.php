<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_tipo_reporte".
 *
 * @property integer $id_treporte
 * @property string $nom_treporte
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 * @property CdaSolicitudInformacion[] $cdaSolicitudInformacions
 */
class CdaTipoReporte extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_tipo_reporte';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_treporte', 'nom_treporte'], 'required'],
            [['id_treporte'], 'integer'],
            [['nom_treporte'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_treporte' => 'Id Treporte',
            'nom_treporte' => 'Nom Treporte',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_treporte' => 'id_treporte']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaSolicitudInformacions()
    {
        return $this->hasMany(CdaSolicitudInformacion::className(), ['id_treporte' => 'id_treporte']);
    }
}
