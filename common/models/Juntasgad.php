<?php

namespace common\models;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\poc\FdConjuntoRespuesta;

/**
 * Este es el modelo para la clase "juntas_gad".
 *
 * @property string $id_junta
 * @property string $nombre_junta
 * @property integer $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class Juntasgad extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'juntas_gad';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_conjunto_respuesta'], 'integer'],
            [['nombre_junta'], 'string', 'max' => 200],
            [['nombre_junta'],'required'],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],            
            ['nombre_junta', 'match', 'pattern' => '/^[0-9a-zA-Z\s\-\.\(\)\,\ñ\Ñ\á\é\í\ó\ú\Á\É\Í\Ó\Ú]+$/', 'message' => 'No puede ingresar caracteres especiales'],  
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_junta' => 'Id Junta',
            'nombre_junta' => 'Nombre Prestador',
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
