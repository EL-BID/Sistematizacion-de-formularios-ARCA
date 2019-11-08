<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_tipo_condicion".
 *
 * @property integer $id_tcondicion
 * @property string $nom_tcondicion
 *
 * @property FdElementoCondicion[] $fdElementoCondicions
 */
class FdTipoCondicion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tipo_condicion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tcondicion', 'nom_tcondicion'], 'required'],
            [['id_tcondicion'], 'integer'],
            [['nom_tcondicion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tcondicion' => 'Id Tcondicion',
            'nom_tcondicion' => 'Nom Tcondicion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdElementoCondicions()
    {
        return $this->hasMany(FdElementoCondicion::className(), ['id_tcondicion' => 'id_tcondicion']);
    }
}
