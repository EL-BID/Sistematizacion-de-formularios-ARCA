<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_nivel_desempenio".
 *
 * @property integer $id_nivel
 * @property integer $intervalo_inicio
 * @property integer $intervalo_fin
 * @property string $nivel_desempenio
 * @property string $descripcion
 * @property integer $semaforizacion
 */
class FdNivelDesempenio extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_nivel_desempenio';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_nivel'], 'required'],
            [['id_nivel', 'intervalo_inicio', 'intervalo_fin', 'semaforizacion'], 'integer'],
            [['nivel_desempenio'], 'string', 'max' => 1000],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_nivel' => 'Id Nivel',
            'intervalo_inicio' => 'Intervalo Inicio',
            'intervalo_fin' => 'Intervalo Fin',
            'nivel_desempenio' => 'Nivel Desempenio',
            'descripcion' => 'Descripcion',
            'semaforizacion' => 'Semaforizacion',
        ];
    }
}
