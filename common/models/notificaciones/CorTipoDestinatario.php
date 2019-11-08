<?php

namespace common\models\notificaciones;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cor_tipo_destinatario".
 *
 * @property integer $id_tdestinatario
 * @property string $nom_tdestinatario
 *
 * @property CorDestinatario[] $corDestinatarios
 */
class CorTipoDestinatario extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cor_tipo_destinatario';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nom_tdestinatario'], 'required', 'message'=> 'Valor requerido'],
            [['id_tdestinatario'], 'integer'],
            [['nom_tdestinatario'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tdestinatario' => 'Id Tipo Destinatario',
            'nom_tdestinatario' => 'Nombre Tipo Destinatario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCorDestinatarios()
    {
        return $this->hasMany(CorDestinatario::className(), ['id_tdestinatario' => 'id_tdestinatario']);
    }
}
