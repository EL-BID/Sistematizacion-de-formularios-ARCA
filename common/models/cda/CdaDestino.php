<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_destino".
 *
 * @property integer $id_destino
 * @property string $nom_destino
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaDestino extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_destino';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_destino', 'nom_destino'], 'required'],
            [['id_destino'], 'integer'],
            [['nom_destino'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_destino' => 'Id Destino',
            'nom_destino' => 'Nom Destino',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_destino' => 'id_destino']);
    }
}
