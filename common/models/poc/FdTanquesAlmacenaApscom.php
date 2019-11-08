<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\Juntasgad;

/**
 * Este es el modelo para la clase "fd_tanques_almacena_apscom".
 *
 * @property integer $id_tanquesalmacena
 * @property string $ubicacion_tanque
 * @property string $capacidad_tanque
 * @property integer $medicion_entrada
 * @property integer $material
 * @property integer $frecuencia_mantenimiento
 * @property integer $estado_tanque
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
class FdTanquesAlmacenaApscom extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tanques_almacena_apscom';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['capacidad_tanque'], 'number'],
            [['medicion_entrada', 'material', 'frecuencia_mantenimiento', 'estado_tanque', 'problemas', 'id_conjunto_respuesta', 'id_junta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['medicion_entrada'],'required'],
            [['ubicacion_tanque'], 'string', 'max' => 200],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_junta'], 'exist', 'skipOnError' => true, 'targetClass' => JuntasGad::className(), 'targetAttribute' => ['id_junta' => 'id_junta']],
            [['especifique'],'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tanquesalmacena' => 'Id Tanquesalmacena',
            'ubicacion_tanque' => 'Ubicacion Tanque',
            'capacidad_tanque' => 'Capacidad Tanque',
            'medicion_entrada' => 'Medición de entrada del tanque',
            'material' => 'Material',
            'especifique'=>'Especifique',
            'frecuencia_mantenimiento' => 'Frecuencia Mantenimiento',
            'estado_tanque' => 'Estado Tanque',
            'problemas' => 'Problemas',
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
