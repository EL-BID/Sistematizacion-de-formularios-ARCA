<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_tipo_view_cap".
 *
 * @property integer $id_tview_cap
 * @property string $nom_tview_cap
 *
 * @property FdCapitulo[] $fdCapitulos
 */
class FdTipoViewCap extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tipo_view_cap';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tview_cap', 'nom_tview_cap'], 'required'],
            [['id_tview_cap'], 'integer'],
            [['nom_tview_cap'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tview_cap' => 'Id Tview Cap',
            'nom_tview_cap' => 'Nom Tview Cap',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCapitulos()
    {
        return $this->hasMany(FdCapitulo::className(), ['id_tview_cap' => 'id_tview_cap']);
    }
}
