<?php

namespace common\models\poc;

use common\models\modelpry\ModelPry;
use common\models\autenticacion\Parroquias;

/**
 * Este es el modelo para la clase "fd_datos_saneamiento_ambiental".
 *
 * @property integer $id_datos_saneamiento_ambiental
 * @property string $comunidad
 * @property integer $viviendas_existentes
 * @property integer $viviendas_conexiones
 * @property integer $viviendas_conex_fsept_letrinas
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 * @property integer $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdDatosSaneamientoAmbiental extends ModelPry
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fd_datos_saneamiento_ambiental';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['viviendas_existentes', 'viviendas_conexiones', 'viviendas_conex_fsept_letrinas', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['comunidad'], 'string', 'max' => 100],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdRespuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_datos_saneamiento_ambiental' => 'Id Datos Saneamiento Ambiental',
            'comunidad' => 'Comunidad',
            'viviendas_existentes' => 'Viviendas Existentes',
            'viviendas_conexiones' => 'Viviendas Conexiones',
            'viviendas_conex_fsept_letrinas' => 'Viviendas Conex Fsept Letrinas',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
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
    public function getIdRespuesta()
    {
        return $this->hasOne(FdRespuesta::className(), ['id_respuesta' => 'id_respuesta']);
    }

}
