<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "tr_tipo_natu_juridica".
 *
 * @property integer $id_natu_juridica
 * @property string $nom_natu_juridica
 *
 * @property FdDatosGenerales[] $fdDatosGenerales
 */
class TrTipoNatuJuridica extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_tipo_natu_juridica';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_natu_juridica', 'nom_natu_juridica'], 'required'],
            [['id_natu_juridica'], 'integer'],
            [['nom_natu_juridica'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_natu_juridica' => 'Id Natu Juridica',
            'nom_natu_juridica' => 'Nom Natu Juridica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdDatosGenerales()
    {
        return $this->hasMany(FdDatosGenerales::className(), ['id_natu_juridica' => 'id_natu_juridica']);
    }
}
