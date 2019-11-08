<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_agrupacion".
 *
 * @property integer $id_agrupacion
 * @property string $nom_agrupacion
 * @property integer $id_tagrupacion
 * @property integer $num_col
 * @property integer $num_row
 *
 * @property FdTipoAgrupacion $idTagrupacion
 * @property FdPregunta[] $fdPreguntas
 */
class FdAgrupacion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_agrupacion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_agrupacion', 'nom_agrupacion'], 'required'],
            [['id_agrupacion', 'id_tagrupacion', 'num_col', 'num_row'], 'integer'],
            [['nom_agrupacion'], 'string', 'max' => 500],
            [['id_tagrupacion'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoAgrupacion::className(), 'targetAttribute' => ['id_tagrupacion' => 'id_tagrupacion']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_agrupacion' => 'Id Agrupación',
            'nom_agrupacion' => 'Nombre Agrupación',
            'id_tagrupacion' => 'Tipo agrupación',
            'num_col' => 'Número de Columnas',
            'num_row' => 'Número de Filas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTagrupacion()
    {
        return $this->hasOne(FdTipoAgrupacion::className(), ['id_tagrupacion' => 'id_tagrupacion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntas()
    {
        return $this->hasMany(FdPregunta::className(), ['id_agrupacion' => 'id_agrupacion']);
    }
}
