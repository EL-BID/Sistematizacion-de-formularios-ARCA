<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_involucrado".
 *
 * @property integer $id_involucrado
 * @property string $nombre
 * @property integer $telefono_convencional
 * @property integer $celular
 * @property string $correo_electronico
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdInvolucrado extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_involucrado';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['telefono_convencional', 'celular', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta'], 'integer'],
            [['nombre', 'correo_electronico'], 'string', 'max' => 50],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
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
            'id_involucrado' => 'Id Involucrado',
            'nombre' => 'Nombre',
            'telefono_convencional' => 'Telefono Convencional',
            'celular' => 'Celular',
            'correo_electronico' => 'Correo Electronico',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
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
