<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_detalles_captacion".
 *
 * @property integer $id_detalles_captacion
 * @property string $nombre_captacion
 * @property integer $id_estruc_hidrau
 * @property integer $anio_construc
 * @property integer $id_material_estruc
 * @property integer $id_problema_capt
 * @property integer $id_estado_capt
 * @property integer $id_t_medicion
 * @property string $especifique_mat_estr
 * @property string $especifique_probl
 * @property string $especifique_t_med
 * @property string $observaciones
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 * @property integer $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdDetallesCaptacion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_detalles_captacion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_estruc_hidrau', 'id_material_estruc', 'id_problema_capt', 'id_estado_capt', 'id_t_medicion', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_junta'], 'integer'],
            [['nombre_captacion'], 'string', 'max' => 100],
            [['id_estruc_hidrau', 'nombre_captacion', 'id_t_medicion'],'required'],
            [['especifique_mat_estr', 'especifique_probl', 'especifique_t_med', 'observaciones'], 'string', 'max' => 200],
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
            'id_detalles_captacion' => 'Id Detalles Captacion',
            'nombre_captacion' => 'Nombre Captacion',
            'id_estruc_hidrau' => 'Id Estruc Hidrau',
            'id_material_estruc' => 'Id Material Estruc',
            'id_problema_capt' => 'Id Problema Capt',
            'id_estado_capt' => 'Id Estado Capt',
            'id_t_medicion' => 'Id T Medicion',
            'especifique_mat_estr' => 'Especifique Mat Estr',
            'especifique_probl' => 'Especifique Probl',
            'especifique_t_med' => 'Especifique T Med',
            'observaciones' => 'Observaciones',
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
}
