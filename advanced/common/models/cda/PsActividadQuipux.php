<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_actividad_quipux".
 *
 * @property integer $id_actividad_quipux
 * @property string $fecha_actividad_quipux
 * @property string $usuario_actual_quipux
 * @property string $accion_realizada
 * @property string $descripcion
 * @property string $estado_actual
 * @property string $numero_referencia
 * @property string $usuario_origen_quipux
 * @property string $usuario_destino_quipux
 * @property string $respondido_a
 * @property string $fecha_carga
 * @property integer $id_cproceso
 *
 * @property PsCproceso $idCproceso
 */
class PsActividadQuipux extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_actividad_quipux';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_actividad_quipux'], 'required'],
            [['id_actividad_quipux', 'id_cproceso'], 'integer'],
            [['fecha_actividad_quipux', 'fecha_carga'], 'date'],
            [['usuario_actual_quipux', 'accion_realizada', 'usuario_origen_quipux', 'usuario_destino_quipux', 'respondido_a'], 'string', 'max' => 500],
            [['descripcion'], 'string', 'max' => 4000],
            [['estado_actual'], 'string', 'max' => 1000],
            [['numero_referencia'], 'string', 'max' => 50],
            [['id_cproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso' => 'id_cproceso']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_actividad_quipux' => 'Id Actividad Quipux',
            'fecha_actividad_quipux' => 'Fecha Actividad Quipux',
            'usuario_actual_quipux' => 'Usuario Actual Quipux',
            'accion_realizada' => 'Accion Realizada',
            'descripcion' => 'Descripcion',
            'estado_actual' => 'Estado Actual',
            'numero_referencia' => 'Numero Referencia',
            'usuario_origen_quipux' => 'Usuario Origen Quipux',
            'usuario_destino_quipux' => 'Usuario Destino Quipux',
            'respondido_a' => 'Respondido A',
            'fecha_carga' => 'Fecha Carga',
            'id_cproceso' => 'Id Cproceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCproceso()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_cproceso']);
    }
}
