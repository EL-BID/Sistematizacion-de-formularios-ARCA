<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "tr_tipo_coordenada".
 *
 * @property integer $id_tcoordenada
 * @property string $nom_tcoordenada
 *
 * @property FdCoordenada[] $fdCoordenadas
 */
class TrTipoCoordenada extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_tipo_coordenada';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tcoordenada', 'nom_tcoordenada'], 'required'],
            [['id_tcoordenada'], 'integer'],
            [['nom_tcoordenada'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tcoordenada' => 'Id Tcoordenada',
            'nom_tcoordenada' => 'Nom Tcoordenada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCoordenadas()
    {
        return $this->hasMany(FdCoordenada::className(), ['id_tcoordenada' => 'id_tcoordenada']);
    }
}
