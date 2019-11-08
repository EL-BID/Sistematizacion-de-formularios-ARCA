<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_uso_solicitado".
 *
 * @property integer $id_uso_solicitado
 * @property string $nom_uso_solicitado
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaUsoSolicitado extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_uso_solicitado';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_uso_solicitado'], 'required'],
            [['id_uso_solicitado'], 'integer'],
            [['nom_uso_solicitado'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_uso_solicitado' => 'Id Uso Solicitado',
            'nom_uso_solicitado' => 'Nom Uso Solicitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_uso_solicitado' => 'id_uso_solicitado']);
    }
}
