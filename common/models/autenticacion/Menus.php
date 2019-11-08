<?php

namespace common\models\autenticacion;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "menus".
 *
 * @property integer $id_menu
 * @property string $nom_menu
 * @property integer $nivel
 * @property string $id_pagina
 * @property string $parametros
 * @property integer $id_menu_padre
 * @property string $tipo_menu
 * @property integer $orden
 *
 * @property Menus $idMenuPadre
 * @property Menus[] $menuses
 * @property Pagina $idPagina
 */
class Menus extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menus';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nom_menu'], 'required'],
            [['nivel', 'id_menu_padre', 'orden'], 'integer'],
            [['id_pagina'], 'number'],
            [['nom_menu', 'parametros'], 'string', 'max' => 50],
            [['estilos'], 'string', 'max' => 255],
            [['tipo_menu'], 'string', 'max' => 1],
            [['id_menu_padre'], 'exist', 'skipOnError' => true, 'targetClass' => Menus::className(), 'targetAttribute' => ['id_menu_padre' => 'id_menu']],
            [['id_pagina'], 'exist', 'skipOnError' => true, 'targetClass' => Pagina::className(), 'targetAttribute' => ['id_pagina' => 'id_pagina']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'nom_menu' => 'Nom Menu',
            'nivel' => 'Nivel',
            'id_pagina' => 'Id Pagina',
            'parametros' => 'Parametros',
            'id_menu_padre' => 'Id Menu Padre',
            'tipo_menu' => 'Tipo Menu',
            'orden' => 'Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdMenuPadre()
    {
        return $this->hasOne(Menus::className(), ['id_menu' => 'id_menu_padre']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getMenuses()
    {
        return $this->hasMany(Menus::className(), ['id_menu_padre' => 'id_menu']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPagina()
    {
        return $this->hasOne(Pagina::className(), ['id_pagina' => 'id_pagina']);
    }
}
