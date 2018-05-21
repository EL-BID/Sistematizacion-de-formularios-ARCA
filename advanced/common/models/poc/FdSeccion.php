<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_seccion".
 *
 * @property integer $id_seccion
 * @property string $nom_seccion
 * @property integer $orden
 * @property integer $id_capitulo
 * @property integer $num_columnas
 * @property integer $num_col
 * @property string $stylecss
 *
 * @property FdPregunta[] $fdPreguntas
 * @property FdCapitulo $idCapitulo
 */
class FdSeccion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_seccion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_seccion', 'nom_seccion', 'orden'], 'required'],
            [['id_seccion', 'orden', 'id_capitulo', 'num_columnas', 'num_col'], 'integer'],
            [['nom_seccion'], 'string', 'max' => 500],
            [['stylecss'], 'string', 'max' => 50],
            [['id_capitulo'], 'exist', 'skipOnError' => true, 'targetClass' => FdCapitulo::className(), 'targetAttribute' => ['id_capitulo' => 'id_capitulo']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_seccion' => 'Id Seccion',
            'nom_seccion' => 'Nom Seccion',
            'orden' => 'Orden',
            'id_capitulo' => 'Id Capitulo',
            'num_columnas' => 'Num Columnas',
            'num_col' => 'Num Col',
            'stylecss' => 'Stylecss',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntas()
    {
        return $this->hasMany(FdPregunta::className(), ['id_seccion' => 'id_seccion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCapitulo()
    {
        return $this->hasOne(FdCapitulo::className(), ['id_capitulo' => 'id_capitulo']);
    }
}
