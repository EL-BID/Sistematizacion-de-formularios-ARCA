<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_tipo_capitulo".
 *
 * @property integer $id_tcapitulo
 * @property string $nom_tcapitulo
 *
 * @property FdCapitulo[] $fdCapitulos
 */
class FdTipoCapitulo extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tipo_capitulo';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tcapitulo', 'nom_tcapitulo'], 'required'],
            [['id_tcapitulo'], 'integer'],
            [['nom_tcapitulo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tcapitulo' => 'Id Tcapitulo',
            'nom_tcapitulo' => 'Nom Tcapitulo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCapitulos()
    {
        return $this->hasMany(FdCapitulo::className(), ['id_tcapitulo' => 'id_tcapitulo']);
    }
}
