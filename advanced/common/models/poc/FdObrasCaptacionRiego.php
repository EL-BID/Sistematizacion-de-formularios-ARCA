<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_obras_captacion_riego".
 *
 * @property integer $id_obracaptacion
 * @property integer $numero_obras
 * @property integer $tipo_obra
 * @property string $especifique
 * @property integer $estado_obra
 * @property integer $ubicacion_obra
 * @property string $especifique_ubicacion
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 * @property integer $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdOpcionSelect $tipoObra
 * @property FdOpcionSelect $estadoObra
 * @property FdOpcionSelect $ubicacionObra
 * @property FdPregunta $idPregunta
 */
class FdObrasCaptacionRiego extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_obras_captacion_riego';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['numero_obras', 'tipo_obra', 'estado_obra', 'ubicacion_obra', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
	    [['numero_obras', 'tipo_obra', 'estado_obra','ubicacion_obra'], 'required'],
            [['especifique', 'especifique_ubicacion'], 'string', 'max' => 200],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['tipo_obra'], 'exist', 'skipOnError' => true, 'targetClass' => FdOpcionSelect::className(), 'targetAttribute' => ['tipo_obra' => 'id_opcion_select']],
            [['estado_obra'], 'exist', 'skipOnError' => true, 'targetClass' => FdOpcionSelect::className(), 'targetAttribute' => ['estado_obra' => 'id_opcion_select']],
            [['ubicacion_obra'], 'exist', 'skipOnError' => true, 'targetClass' => FdOpcionSelect::className(), 'targetAttribute' => ['ubicacion_obra' => 'id_opcion_select']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_obracaptacion' => 'Id Obracaptacion',
            'numero_obras' => 'Numero Obras',
            'tipo_obra' => 'Tipo Obra',
            'especifique' => 'Especifique',
            'estado_obra' => 'Estado Obra',
            'ubicacion_obra' => 'Ubicacion Obra',
            'especifique_ubicacion' => 'Especifique Ubicacion',
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
    public function getTipoObra()
    {
        return $this->hasOne(FdOpcionSelect::className(), ['id_opcion_select' => 'tipo_obra']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getEstadoObra()
    {
        return $this->hasOne(FdOpcionSelect::className(), ['id_opcion_select' => 'estado_obra']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getUbicacionObra()
    {
        return $this->hasOne(FdOpcionSelect::className(), ['id_opcion_select' => 'ubicacion_obra']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPregunta()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta']);
    }
}
