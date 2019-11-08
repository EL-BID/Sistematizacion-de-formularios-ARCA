<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_datos_generales_riego".
 *
 * @property integer $id_datos_generales_riego
 * @property string $nombres_prestador_servicio
 * @property string $direccion_oficinas
 * @property string $nombres_apellidos_replegal
 * @property integer $posee_convencional
 * @property integer $num_convencional
 * @property integer $num_celular
 * @property integer $num_celular_otro
 * @property integer $posee_email
 * @property string $correo_electronico
 * @property integer $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class FdDatosGeneralesRiego extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_datos_generales_riego';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['posee_convencional', 'num_celular', 'posee_email', 'nombres_prestador_servicio','direccion_oficinas','nombres_apellidos_replegal'], 'required'],
            [['posee_convencional', 'num_convencional', 'num_celular', 'num_celular_otro', 'posee_email', 'id_conjunto_respuesta'], 'integer'],
            [['nombres_prestador_servicio', 'direccion_oficinas', 'nombres_apellidos_replegal'], 'string', 'max' => 1000],
            [['correo_electronico'], 'string', 'max' => 500],            
            ['num_celular_otro', 'match', 'pattern' => '/^\d{10}$/', 'message' => 'Ingrese un mínimo de 10 dígitos'],        
            ['num_celular', 'match', 'pattern' => '/^\d{10}$/', 'message' => 'Ingrese un mínimo de 10 dígitos'],   
            ['num_convencional', 'match', 'pattern' => '/^\d{9}$/', 'message' => 'Ingrese un mínimo de 9 dígitos'],   
            ['correo_electronico', 'match', 'pattern' => '/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/','message' => 'Correo electrónico inválido'],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
        ];
    }
    

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_datos_generales_riego' => 'Id Datos Generales Riego',
            'nombres_prestador_servicio' => 'Nombres Prestador Servicio',
            'direccion_oficinas' => 'Dirección Oficinas',
            'nombres_apellidos_replegal' => 'Nombres Apellidos Representante Legal',
            'posee_convencional' => 'Posee Convencional',
            'num_convencional' => 'Número Convencional',
            'num_celular' => 'Número Celular',
            'num_celular_otro' => 'Número Celular Otro',
            'posee_email' => 'Posee Email',
            'correo_electronico' => 'Correo Electrónico',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
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
