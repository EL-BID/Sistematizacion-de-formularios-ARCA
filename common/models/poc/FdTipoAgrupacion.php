<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_tipo_agrupacion".
 *
 * @property integer $id_tagrupacion
 * @property string $nom_tagrupacion
 *
 * @property FdAgrupacion[] $fdAgrupacions
 */
class FdTipoAgrupacion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tipo_agrupacion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tagrupacion', 'nom_tagrupacion'], 'required'],
            [['id_tagrupacion'], 'integer'],
            [['nom_tagrupacion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tagrupacion' => 'Id Tagrupacion',
            'nom_tagrupacion' => 'Nom Tagrupacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdAgrupacions()
    {
        return $this->hasMany(FdAgrupacion::className(), ['id_tagrupacion' => 'id_tagrupacion']);
    }
}
