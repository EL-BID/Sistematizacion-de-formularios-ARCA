<?php

namespace common\models\cda;

use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_actividad_ruta".
 *
 * @property string          $estado
 * @property int             $id_actividad_origen
 * @property int             $id_actividad_destino
 * @property string          $cod_rol
 * @property int             $id_eproceso
 * @property string          $obligatorio_diligenciamiento
 * @property string          $tipo_pantalla_ruta
 * @property int             $id_actividad_ruta
 * @property PsActividad     $idActividadOrigen
 * @property PsActividad     $idActividadDestino
 * @property PsEstadoProceso $idEproceso
 * @property Rol             $codRol
 */
class PsActividadRuta extends ModelPry
{
    public $diligenciado;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ps_actividad_ruta';
    }

    /**
     * {@inheritdoc} Reglas de Validación
     */
    public function rules()
    {
        return [
            [['estado', 'id_actividad_ruta'], 'required'],
            [['id_actividad_origen', 'id_actividad_destino', 'id_eproceso', 'id_actividad_ruta','salto_editar_origen'], 'integer'],
            [['estado', 'tipo_pantalla_ruta'], 'string', 'max' => 2],
            [['cod_rol'], 'string', 'max' => 10],
            [['obligatorio_diligenciamiento'], 'string', 'max' => 1],
            [['id_actividad_ruta'], 'unique'],
            [['id_actividad_origen'], 'exist', 'skipOnError' => true, 'targetClass' => PsActividad::className(), 'targetAttribute' => ['id_actividad_origen' => 'id_actividad']],
            [['id_actividad_destino'], 'exist', 'skipOnError' => true, 'targetClass' => PsActividad::className(), 'targetAttribute' => ['id_actividad_destino' => 'id_actividad']],
            [['id_eproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsEstadoProceso::className(), 'targetAttribute' => ['id_eproceso' => 'id_eproceso']],
            [['cod_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['cod_rol' => 'cod_rol']],
        ];
    }

    /**
     * {@inheritdoc} Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'estado' => 'Estado',
            'id_actividad_origen' => 'Id Actividad Origen',
            'id_actividad_destino' => 'Id Actividad Destino',
            'cod_rol' => 'Cod Rol',
            'id_eproceso' => 'Id Eproceso',
            'obligatorio_diligenciamiento' => 'Obligatorio Diligenciamiento',
            'tipo_pantalla_ruta' => 'Tipo Pantalla Ruta',
            'id_actividad_ruta' => 'Id Actividad Ruta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdActividadOrigen()
    {
        return $this->hasOne(PsActividad::className(), ['id_actividad' => 'id_actividad_origen']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdActividadDestino()
    {
        return $this->hasOne(PsActividad::className(), ['id_actividad' => 'id_actividad_destino']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdEproceso()
    {
        return $this->hasOne(PsEstadoProceso::className(), ['id_eproceso' => 'id_eproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodRol()
    {
        return $this->hasOne(Rol::className(), ['cod_rol' => 'cod_rol']);
    }
}
