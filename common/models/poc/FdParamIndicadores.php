<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_param_indicadores".
 *
 * @property integer $id_indicador
 * @property string $tipo_indicador
 * @property integer $item
 * @property string $indicador
 * @property string $variable_a
 * @property string $variable_b
 * @property string $formula
 * @property string $detalle
 * @property string $consideracion
 */
class FdParamIndicadores extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_param_indicadores';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['item','periodo'], 'integer'],
            [['tipo_indicador', 'variable_a', 'variable_b', 'formula'], 'string', 'max' => 100],
            [['indicador', 'detalle', 'consideracion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_indicador' => 'Id Indicador',
            'tipo_indicador' => 'Tipo Indicador',
            'item' => 'Item',
            'indicador' => 'Indicador',
            'variable_a' => 'Variable A',
            'variable_b' => 'Variable B',
            'formula' => 'Formula',
            'detalle' => 'Detalle',
            'consideracion' => 'Consideracion',
        ];
    }
}
