<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_bombas_captacion".
 *
 * @property integer $id_bombas_captacion
 * @property string $nombre_bomba
 * @property integer $id_material_caseta
 * @property integer $id_estado_infrestructura
 * @property integer $potencia_bomba
 * @property integer $anio_instalacion
 * @property integer $id_problema_bomba
 * @property string $especifique_material_caseta
 * @property string $especifique_problema_bomba
 * @property string $observaciones
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 * @property integer $id_capitulo
 * @property integer $id_material_tuberia 
 * @property integer $id_estado_tuberia
 * @property integer $id_frec_mantenimiento
 * @property integer $id_junta
 * 
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */





class FdBombasCaptacion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_bombas_captacion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_material_caseta', 'id_estado_infrestructura', 'potencia_bomba', 'anio_instalacion', 'id_problema_bomba', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_material_tuberia', 'id_estado_tuberia', 'id_frec_mantenimiento', 'id_junta'], 'integer'],
            [['nombre_bomba'], 'string', 'max' => 100],
            [['nombre_bomba'],'required'],
            [['especifique_material_caseta', 'especifique_problema_bomba'], 'string', 'max' => 200],
            [['observaciones'], 'string', 'max' => 1000],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdRespuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
            ['anio_instalacion', 'match', 'pattern' => '/^\d{4}$/', 'message' => 'Valor de año inválido'],     
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_bombas_captacion' => 'Id Bombas Captacion',
            'nombre_bomba' => 'Nombre Bomba',
            'id_material_caseta' => 'Id Material Caseta',
            'id_estado_infrestructura' => 'Id Estado Infrestructura',
            'potencia_bomba' => 'Potencia Bomba',
            'anio_instalacion' => 'Anio Instalacion',
            'id_problema_bomba' => 'Id Problema Bomba',
            'especifique_material_caseta' => 'Especifique Material Caseta',
            'especifique_problema_bomba' => 'Especifique Problema Bomba',
            'observaciones' => 'Observaciones',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
            'id_capitulo' => 'Id Capitulo',
            'id_material_tuberia' => 'Id Material Tuberia',
            'id_estado_tuberia'=> 'Id Estado Tuberia',
            'id_frec_mantenimiento'=> 'Id Frec Mantenimiento',
            'id_junta'=> 'Id Junta',
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
