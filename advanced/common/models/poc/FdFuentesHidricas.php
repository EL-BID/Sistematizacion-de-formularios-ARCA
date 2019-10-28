<?php

namespace common\models\poc;


use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_fuentes_hidricas".
 *
 * @property integer $id_fuentehidrica
 * @property string $nom_fuente
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 * @property integer $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 */
class FdFuentesHidricas extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_fuentes_hidricas';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['nom_fuente'],'required'],
            [['nom_fuente'], 'string', 'max' => 1000],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_fuentehidrica' => 'Id Fuentehidrica',
            'nom_fuente' => 'Nombre de la Fuente',
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
}
