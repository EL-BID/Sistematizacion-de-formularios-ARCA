<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_resul_indicadores".
 *
 * @property integer $id_resul_indicadores
 * @property integer $id_indicador
 * @property string $resultado
 * @property string $recomendacion
 * @property integer $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdParamIndicadores $idIndicador
 */
class FdResulIndicadores extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_resul_indicadores';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_indicador', 'id_conjunto_respuesta','periodo'], 'integer'],
            [['resultado'], 'number'],
            [['recomendacion'], 'string', 'max' => 500],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_indicador'], 'exist', 'skipOnError' => true, 'targetClass' => FdParamIndicadores::className(), 'targetAttribute' => ['id_indicador' => 'id_indicador']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_resul_indicadores' => 'Id Resul Indicadores',
            'id_indicador' => 'Id Indicador',
            'resultado' => 'Resultado',
            'recomendacion' => 'Recomendacion',
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
    public function getIdIndicador()
    {
        return $this->hasOne(FdParamIndicadores::className(), ['id_indicador' => 'id_indicador']);
    }
}
