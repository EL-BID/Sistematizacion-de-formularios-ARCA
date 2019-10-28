<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_datos_generales_publicos".
 *
 * @property integer $id_datos_generales_publicos
 * @property string $pagina_web_prestador
 * @property string $correo_electronico_prestador
 * @property string $fecha_llenado_fichas
 * @property string $nombres_responsable_informacion
 * @property string $cargo_desempenia
 * @property string $correo_electronico
 * @property string $num_celular
 * @property integer $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class FdDatosGeneralesPublicos extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_datos_generales_publicos';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_llenado_fichas'], 'date'],            
            [['id_conjunto_respuesta'], 'integer'],
            [['pagina_web_prestador', 'nombres_responsable_informacion'], 'string', 'max' => 1000],
            [['correo_electronico_prestador', 'cargo_desempenia', 'correo_electronico'], 'string', 'max' => 100],
            [['num_celular'], 'string', 'max' => 10],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_datos_generales_publicos' => 'Id Datos Generales Publicos',
            'pagina_web_prestador' => 'Pagina Web Prestador',
            'correo_electronico_prestador' => 'Correo Electronico Prestador',
            'fecha_llenado_fichas' => 'Fecha Llenado Fichas',
            'nombres_responsable_informacion' => 'Nombres Responsable Informacion',
            'cargo_desempenia' => 'Cargo Desempenia',
            'correo_electronico' => 'Correo Electronico',
            'num_celular' => 'Num Celular',
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
