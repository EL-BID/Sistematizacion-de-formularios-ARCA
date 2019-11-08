<?php

namespace common\models;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\poc\FdConjuntoRespuesta;

/**
 * Este es el modelo para la clase "informacion_prestadores".
 *
 * @property string $id_informacion_prestadores
 * @property string $posee_prestadores
 * @property integer $numero_prestadores
 * @property integer $numero_prestadores_legal
 * @property integer $numero_prestadores_economico
 * @property integer $numero_prestadores_tecnico
 * @property integer $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class Informacionprestadores extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'informacion_prestadores';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['numero_prestadores', 'numero_prestadores_legal', 'numero_prestadores_economico', 'numero_prestadores_tecnico', 'id_conjunto_respuesta'], 'integer'],
            [['posee_prestadores'], 'string', 'max' => 10],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['posee_prestadores','numero_prestadores'],'required']
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_informacion_prestadores' => 'Id Informacion Prestadores',
            'posee_prestadores' => 'Posee Prestadores',
            'numero_prestadores' => 'Numero Prestadores',
            'numero_prestadores_legal' => 'Numero Prestadores Legal',
            'numero_prestadores_economico' => 'Numero Prestadores Economico',
            'numero_prestadores_tecnico' => 'Numero Prestadores Tecnico',
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
