<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_respuesta_x_mes".
 *
 * @property string $ene_decimal
 * @property string $feb_decimal
 * @property string $mar_decimal
 * @property string $abr_decimal
 * @property string $may_decimal
 * @property string $jun_decimal
 * @property string $jul_decimal
 * @property string $ago_decimal
 * @property string $sep_decimal
 * @property string $oct_decimal
 * @property string $nov_decimal
 * @property string $dic_decimal
 * @property integer $id_respuesta
 * @property integer $id_pregunta
 * @property string $descripcion
 * @property integer $id_opcion_select
 * @property integer $id_respuesta_x_mes
 *
 * @property FdOpcionSelect $idOpcionSelect
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdRespuestaXMes extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_respuesta_x_mes';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['ene_decimal', 'feb_decimal', 'mar_decimal', 'abr_decimal', 'may_decimal', 'jun_decimal', 'jul_decimal', 'ago_decimal', 'sep_decimal', 'oct_decimal', 'nov_decimal', 'dic_decimal'], 'number'],
            [['id_respuesta', 'id_pregunta', 'id_opcion_select', 'id_respuesta_x_mes'], 'integer'],
            [['descripcion'], 'string', 'max' => 500],
            [['id_opcion_select'], 'exist', 'skipOnError' => true, 'targetClass' => FdOpcionSelect::className(), 'targetAttribute' => ['id_opcion_select' => 'id_opcion_select']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdRespuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'ene_decimal' => 'Ene Decimal',
            'feb_decimal' => 'Feb Decimal',
            'mar_decimal' => 'Mar Decimal',
            'abr_decimal' => 'Abr Decimal',
            'may_decimal' => 'May Decimal',
            'jun_decimal' => 'Jun Decimal',
            'jul_decimal' => 'Jul Decimal',
            'ago_decimal' => 'Ago Decimal',
            'sep_decimal' => 'Sep Decimal',
            'oct_decimal' => 'Oct Decimal',
            'nov_decimal' => 'Nov Decimal',
            'dic_decimal' => 'Dic Decimal',
            'id_respuesta' => 'Id Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'descripcion' => 'Descripcion',
            'id_opcion_select' => 'Id Opcion Select',
            'id_respuesta_x_mes' => 'Id Respuesta X Mes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdOpcionSelect()
    {
        return $this->hasOne(FdOpcionSelect::className(), ['id_opcion_select' => 'id_opcion_select']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPregunta()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdRespuesta()
    {
        return $this->hasOne(FdRespuesta::className(), ['id_respuesta' => 'id_respuesta']);
    }
}
