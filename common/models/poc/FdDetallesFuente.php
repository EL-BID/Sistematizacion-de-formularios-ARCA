<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;
use \frontend\helpers\formatnumber;

/**
 * Este es el modelo para la clase "fd_detalles_fuente".
 *
 * @property integer $id_detalles_fuente
 * @property string $nombre_fuente
 * @property integer $id_t_fuente
 * @property integer $coor_x
 * @property integer $coor_y
 * @property integer $coor_z
 * @property integer $caudal_captado
 * @property integer $caudal_autorizado
 * @property integer $id_problema_fuente
 * @property string $especifique
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 * @property integer $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdDetallesFuente extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_detalles_fuente';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_t_fuente','caudal_captado', 'id_problema_fuente', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo','autorizacion_senagua','id_junta'], 'integer'],
            [['nombre_fuente'], 'string', 'max' => 100],
            [['autorizacion_senagua', 'nombre_fuente', 'id_t_fuente'],'required'],
            [['especifique'], 'string', 'max' => 200],
            [['caudal_autorizado', 'coor_x', 'coor_y', 'coor_z'], 'number'],
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
            'id_detalles_fuente' => 'Id Detalles Fuente',
            'nombre_fuente' => 'Nombre Fuente',
            'id_t_fuente' => 'Id T Fuente',
            'coor_x' => 'Coor X',
            'coor_y' => 'Coor Y',
            'coor_z' => 'Coor Z',
            'caudal_captado' => 'Caudal Captado',
            'caudal_autorizado' => 'Caudal Autorizado',
            'id_problema_fuente' => 'Id Problema Fuente',
            'especifique' => 'Especifique',
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
