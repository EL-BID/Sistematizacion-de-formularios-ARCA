<?php

namespace common\models\notificaciones;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "tar_tarea_programada".
 *
 * @property integer $id_tarea_programada
 * @property string $nom_tarea_programada
 * @property string $fecha_inicio
 * @property string $fecha_termina
 * @property string $fecha_proxima_eje
 * @property integer $intervalo_ejecucion
 * @property integer $numero_ejecucion
 * @property string $usuario_digitador 
 * @property string $fecha_digitacion 
 * @property string $estado 
 * @property integer $id_ttarea 
 *
 * @property CorCorreo[] $corCorreos
 * @property PsArchivoCargue[] $psArchivoCargues 
 * @property TarTipoTarea $idTtarea 
 */
class TarTareaProgramada extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tar_tarea_programada';
    }

     public function behaviors()
    {
        return [
           // TimestampBehavior::className(),
            'timestamp' => [
                        'class' => 'yii\behaviors\TimestampBehavior',
                        'attributes' => [
                            \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['fecha_digitacion'],
                            ],
                        'value' => new \yii\db\Expression('NOW()'), //utiliza la expresion now de postgres para obtener la hora senecesita yii\db\Expression;
                        ],
        ];
    }
    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [[ 'nom_tarea_programada', 'fecha_inicio'], 'required', 'message'=>'Campo debe diligenciarse'],
            [[ 'intervalo_ejecucion', 'numero_ejecucion'], 'integer','message'=>'Valor debe ser numérico'],
            [['fecha_inicio', 'fecha_termina', 'fecha_proxima_eje'], 'date','format' => 'php:Y/m/d','message'=>'Valor debe ser una fecha valida'],
            [['nom_tarea_programada'], 'string', 'max' => 50,'message'=>'Máximo 50 caracteres'],
            [['id_ttarea'], 'exist', 'skipOnError' => true, 'targetClass' => TarTipoTarea::className(), 'targetAttribute' => ['id_ttarea' => 'id_ttarea']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tarea_programada' => 'Id Tarea Programada',
            'nom_tarea_programada' => 'Nombre Tarea Programada',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_termina' => 'Fecha Termina',
            'fecha_proxima_eje' => 'Fecha Proxima Ejecución',
            'intervalo_ejecucion' => 'Intervalo Ejecución en segundos',
            'numero_ejecucion' => 'Número Ejecución',
            'fecha_proxima_eje' => 'Fecha Proxima Eje',
            'usuario_digitador' => 'Usuario Digitador',
            'fecha_digitacion' => 'Fecha Digitacion',
            'estado' => 'Estado',
            'id_ttarea' => 'Tipo Tarea',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCorCorreos()
    {
        return $this->hasMany(CorCorreo::className(), ['id_tarea_programada' => 'id_tarea_programada']);
    }
    
    /** 
    * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla 
    */ 
    public function getPsArchivoCargues() 
    { 
       return $this->hasMany(PsArchivoCargue::className(), ['id_tarea_programada' => 'id_tarea_programada']); 
    } 

    /** 
    * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla 
    */ 
    public function getIdTtarea() 
    { 
       return $this->hasOne(TarTipoTarea::className(), ['id_ttarea' => 'id_ttarea']); 
    } 
}
