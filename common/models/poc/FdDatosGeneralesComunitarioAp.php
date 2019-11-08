<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_datos_generales_comunitario_ap".
 *
 * @property integer $id_datos_generales_cumunitario_ap
 * @property string $nombres_prestador
 * @property string $nombre_comunidad
 * @property integer $numero_viviendas
 * @property integer $telefono_prestador
 * @property string $correo_prestador
 * @property string $direccion_prestador
 * @property integer $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class FdDatosGeneralesComunitarioAp extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_datos_generales_comunitario_ap';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['numero_personas_servicio', 'tipo_prestador_comunitario', 'id_conjunto_respuesta','id_junta'], 'integer'],
            [['nombres_prestador'], 'string', 'max' => 1000],
            [['nombre_comunidad','especifique'], 'string', 'max' => 250], 
            [['nombres_prestador', 'nombre_comunidad', 'tipo_prestador_comunitario'],'required'],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_datos_generales_cumunitario_ap' => 'Id Datos Generales Cumunitario Ap',
            'nombres_prestador' => 'Nombres Prestador',
            'nombre_comunidad' => 'Nombre Comunidad',
            'numero_personas_servicio' => 'Numero personas servicio',
            'tipo_prestador_comunitario' => 'Tipo prestador comunitario',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'especifique'=>'Especifique',
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
}
