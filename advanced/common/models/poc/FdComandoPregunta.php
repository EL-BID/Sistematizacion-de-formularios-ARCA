<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_comando_pregunta".
 *
 * @property string $estado
 * @property integer $id_comando
 * @property integer $id_pregunta
 *
 * @property FdPregunta $idPregunta
 * @property TrComando $idComando
 */
class FdComandoPregunta extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_comando_pregunta';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['estado', 'id_comando', 'id_pregunta'], 'required'],
            [['id_comando', 'id_pregunta'], 'integer'],
            [['estado'], 'string', 'max' => 50],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_comando'], 'exist', 'skipOnError' => true, 'targetClass' => TrComando::className(), 'targetAttribute' => ['id_comando' => 'id_comando']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'estado' => 'Estado',
            'id_comando' => 'Id Comando',
            'id_pregunta' => 'Id Pregunta',
        ];
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
    public function getIdComando()
    {
        return $this->hasOne(TrComando::className(), ['id_comando' => 'id_comando']);
    }
}
