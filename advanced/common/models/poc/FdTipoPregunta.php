<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_tipo_pregunta".
 *
 * @property integer $id_tpregunta
 * @property string $nom_tpregunta
 * @property string $pantalla_lectura
 * @property string $url_subpantalla
 *
 * @property FdPregunta[] $fdPreguntas
 * @property FdRespuesta[] $fdRespuestas
 */
class FdTipoPregunta extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tipo_pregunta';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tpregunta', 'nom_tpregunta'], 'required'],
            [['id_tpregunta'], 'integer'],
            [['nom_tpregunta', 'url_subpantalla'], 'string', 'max' => 50],
            [['pantalla_lectura'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tpregunta' => 'Id Tpregunta',
            'nom_tpregunta' => 'Nom Tpregunta',
            'pantalla_lectura' => 'Pantalla Lectura',
            'url_subpantalla' => 'Url Subpantalla',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntas()
    {
        return $this->hasMany(FdPregunta::className(), ['id_tpregunta' => 'id_tpregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestas()
    {
        return $this->hasMany(FdRespuesta::className(), ['id_tpregunta' => 'id_tpregunta']);
    }
}
