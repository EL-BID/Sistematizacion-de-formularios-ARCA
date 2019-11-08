<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_clasificacion_pregunta".
 *
 * @property string $valor
 * @property integer $id_clasificacion
 * @property integer $id_pregunta
 *
 * @property FdClasificacion $idClasificacion
 * @property FdPregunta $idPregunta
 */
class FdClasificacionPregunta extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_clasificacion_pregunta';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_clasificacion', 'id_pregunta'], 'integer'],
            [['valor'], 'string', 'max' => 50],
            [['id_clasificacion'], 'exist', 'skipOnError' => true, 'targetClass' => FdClasificacion::className(), 'targetAttribute' => ['id_clasificacion' => 'id_clasificacion']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'valor' => 'Valor',
            'id_clasificacion' => 'Id Clasificacion',
            'id_pregunta' => 'Id Pregunta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdClasificacion()
    {
        return $this->hasOne(FdClasificacion::className(), ['id_clasificacion' => 'id_clasificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPregunta()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta']);
    }
}
