<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\Juntasgad;

/**
 * Este es el modelo para la clase "fd_operacion_planta_apscom".
 *
 * @property integer $id_operacionplanta
 * @property integer $manual_operacion
 * @property integer $operacion_planta
 * @property integer $personal_capacitado
 * @property integer $frecuencia_mantenimiento
 * @property integer $problemas
 * @property integer $id_conjunto_respuesta
 * @property integer $id_junta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 * @property integer $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property JuntasGad $idJunta
 */
class FdOperacionplantaApscom extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_operacion_planta_apscom';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['manual_operacion', 'operacion_planta', 'personal_capacitado', 'frecuencia_mantenimiento', 'problemas', 'id_conjunto_respuesta', 'id_junta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            //[['manual_operacion', 'operacion_planta','personal_capacitado'],'required'],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_junta'], 'exist', 'skipOnError' => true, 'targetClass' => JuntasGad::className(), 'targetAttribute' => ['id_junta' => 'id_junta']],
            [['especifique'],'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_operacionplanta' => 'Id Operacionplanta',
            'manual_operacion' => 'Dispone de manual de operacion',
            'operacion_planta' => 'Se realiza la operación de la planta',
            'personal_capacitado' => 'Existe personal Capacitado',
            'frecuencia_mantenimiento' => 'Frecuencia Mantenimiento',
            'problemas' => 'Problemas',
            'especifique'=>'Especifique',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_junta' => 'Id Junta',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
            'id_capitulo' => 'Id Capitulo',
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
    public function getIdPregunta()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdJunta()
    {
        return $this->hasOne(JuntasGad::className(), ['id_junta' => 'id_junta']);
    }
}
