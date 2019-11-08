<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_tipo_gestion".
 *
 * @property integer $id_tgestion
 * @property string $nom_tgestion
 *
 * @property PsHistoricoEstados[] $psHistoricoEstados
 */
class PsTipoGestion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_tipo_gestion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tgestion', 'nom_tgestion'], 'required'],
            [['id_tgestion'], 'integer'],
            [['nom_tgestion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tgestion' => 'Id Tgestion',
            'nom_tgestion' => 'Nom Tgestion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsHistoricoEstados()
    {
        return $this->hasMany(PsHistoricoEstados::className(), ['id_tgestion' => 'id_tgestion']);
    }
}
