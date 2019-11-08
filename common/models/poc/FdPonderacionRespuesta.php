<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_ponderacion_respuesta".
 *
 * @property integer $id_ponderacion_resp
 * @property integer $id_tpondera
 * @property string $descripcion_ponderacion
 * @property string $valor
 *
 * @property FdTipoValoracion $idTpondera
 */
class FdPonderacionRespuesta extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_ponderacion_respuesta';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tpondera'], 'integer'],
            [['valor'], 'number'],
            [['descripcion_ponderacion'], 'string', 'max' => 100],
            [['id_tpondera'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoValoracion::className(), 'targetAttribute' => ['id_tpondera' => 'id_tipo_valoracion']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_ponderacion_resp' => 'Id Ponderacion Resp',
            'id_tpondera' => 'Id Tpondera',
            'descripcion_ponderacion' => 'Descripcion Ponderacion',
            'valor' => 'Valor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTpondera()
    {
        return $this->hasOne(FdTipoValoracion::className(), ['id_tipo_valoracion' => 'id_tpondera']);
    }
}
