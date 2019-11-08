<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\Juntasgad;


/**
 * Este es el modelo para la clase "fd_potabiliz_plantatra_apscom".
 *
 * @property integer $id_potab_plantatr_apscom
 * @property string $ubicacion_lug_ptratamiento
 * @property integer $tipo_planta_tratatmiento
 * @property string $especifique_tplantat
 * @property integer $metodo_desinfeccion_planta
 * @property string $especifique_metdesinfeccionp
 * @property integer $midicion_agua_tratplanta
 * @property integer $estado_planta
 * @property integer $problemas_identificados
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 * @property integer $id_capitulo
 * @property integer $id_junta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 * @property JuntasGad $idJunta
 */
class FdPotabilizPlantatraApscom extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_potabiliz_plantatra_apscom';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['tipo_planta_tratatmiento', 'metodo_desinfeccion_planta', 'midicion_agua_tratplanta', 'estado_planta',  'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_junta'], 'integer'],
            [['ubicacion_lug_ptratamiento'], 'string', 'max' => 1000],
            [['especifique_tplantat', 'especifique_metdesinfeccionp','problemas_identificados'], 'string', 'max' => 200],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdRespuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
            [['id_junta'], 'exist', 'skipOnError' => true, 'targetClass' => JuntasGad::className(), 'targetAttribute' => ['id_junta' => 'id_junta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_potab_plantatr_apscom' => 'Id Potab Plantatr Apscom',
            'ubicacion_lug_ptratamiento' => 'Ubicacion Lug Ptratamiento',
            'tipo_planta_tratatmiento' => 'Tipo Planta Tratatmiento',
            'especifique_tplantat' => 'Especifique Tplantat',
            'metodo_desinfeccion_planta' => 'Metodo Desinfeccion Planta',
            'especifique_metdesinfeccionp' => 'Especifique Metdesinfeccionp',
            'midicion_agua_tratplanta' => 'Midicion Agua Tratplanta',
            'estado_planta' => 'Estado Planta',
            'problemas_identificados' => 'Problemas Identificados',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
            'id_capitulo' => 'Id Capitulo',
            'id_junta' => 'Id Junta',
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

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdJunta()
    {
        return $this->hasOne(JuntasGad::className(), ['id_junta' => 'id_junta']);
    }
}
