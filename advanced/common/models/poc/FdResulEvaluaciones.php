<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_resul_evaluaciones".
 *
 * @property integer $id_resul_evaluaciones
 * @property integer $id_evaluacion
 * @property string $puntaje
 * @property integer $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdParamEvaluaciones $idEvaluacion
 */
class FdResulEvaluaciones extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_resul_evaluaciones';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_evaluacion', 'id_conjunto_respuesta','periodo'], 'integer'],
            [['puntaje'], 'number'],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_evaluacion'], 'exist', 'skipOnError' => true, 'targetClass' => FdParamEvaluaciones::className(), 'targetAttribute' => ['id_evaluacion' => 'id_evaluacion']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_resul_evaluaciones' => 'Id Resul Evaluaciones',
            'id_evaluacion' => 'Id Evaluacion',
            'puntaje' => 'Puntaje',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdConjuntoRespuesta()
    {
        return $this->hasOne(FdConjuntoRespuesta::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdEvaluacion()
    {
        return $this->hasOne(FdParamEvaluaciones::className(), ['id_evaluacion' => 'id_evaluacion']);
    }
}
