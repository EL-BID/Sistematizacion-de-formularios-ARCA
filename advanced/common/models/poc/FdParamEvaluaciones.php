<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_param_evaluaciones".
 *
 * @property integer $id_evaluacion
 * @property string $componente
 * @property string $criterio
 * @property integer $item
 * @property string $condicionante
 * @property integer $id_pregunta
 * @property integer $tipo_valoracion
 * @property integer $porcentaje_ponderacion
 * @property string $puntuacion
 * @property integer $formato
 * @property string $detalle
 *
 * @property FdPregunta $idPregunta
 * @property FdTipoValoracion $tipoValoracion
 */
class FdParamEvaluaciones extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_param_evaluaciones';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['item', 'id_pregunta', 'tipo_valoracion', 'porcentaje_ponderacion', 'formato','periodo'], 'integer'],
            [['puntuacion'], 'number'],
            [['componente'], 'string', 'max' => 100],
            [['criterio'], 'string', 'max' => 1000],
            [['condicionante', 'detalle'], 'string', 'max' => 500],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['tipo_valoracion'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoValoracion::className(), 'targetAttribute' => ['tipo_valoracion' => 'id_tipo_valoracion']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_evaluacion' => 'Id Evaluacion',
            'componente' => 'Componente',
            'criterio' => 'Criterio',
            'item' => 'Item',
            'condicionante' => 'Condicionante',
            'id_pregunta' => 'Id Pregunta',
            'tipo_valoracion' => 'Tipo Valoracion',
            'porcentaje_ponderacion' => 'Porcentaje Ponderacion',
            'puntuacion' => 'Puntuacion',
            'formato' => 'Formato',
            'detalle' => 'Detalle',
        ];
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
    public function getTipoValoracion()
    {
        return $this->hasOne(FdTipoValoracion::className(), ['id_tipo_valoracion' => 'tipo_valoracion']);
    }
}
