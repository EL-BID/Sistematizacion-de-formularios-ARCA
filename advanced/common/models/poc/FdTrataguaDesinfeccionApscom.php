<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\Juntasgad;

/**
 * Este es el modelo para la clase "fd_tratagua_desinfeccion_apscom".
 *
 * @property integer $id_trat_aguadesinf_apscom
 * @property string $ubicacion_lug_tratamiento
 * @property integer $realiza_desinfeccion
 * @property integer $metodo_desinfeccion
 * @property string $especifique_otro_metdesinf
 * @property integer $mide_salida_desinfeccion
 * @property integer $estado_func_sistema
 * @property integer $problemas_identificados
 * @property string $especifique_otros_problemas
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
class FdTrataguaDesinfeccionApscom extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_tratagua_desinfeccion_apscom';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['realiza_desinfeccion', 'metodo_desinfeccion', 'mide_salida_desinfeccion', 'estado_func_sistema', 'problemas_identificados', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_junta'], 'integer'],
            [['realiza_desinfeccion'],'required'],
            [['ubicacion_lug_tratamiento'], 'string', 'max' => 1000],
            [['especifique_otro_metdesinf', 'especifique_otros_problemas'], 'string', 'max' => 200],
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
            'id_trat_aguadesinf_apscom' => 'Id Trat Aguadesinf Apscom',
            'ubicacion_lug_tratamiento' => 'Ubicacion Lug Tratamiento',
            'realiza_desinfeccion' => 'Realiza Desinfeccion',
            'metodo_desinfeccion' => 'Metodo Desinfeccion',
            'especifique_otro_metdesinf' => 'Especifique Otro Metdesinf',
            'mide_salida_desinfeccion' => 'Mide Salida Desinfeccion',
            'estado_func_sistema' => 'Estado Func Sistema',
            'problemas_identificados' => 'Problemas Identificados',
            'especifique_otros_problemas' => 'Especifique Otros Problemas',
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
