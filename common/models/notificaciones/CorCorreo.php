<?php

namespace common\models\notificaciones;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cor_correo".
 *
 * @property integer $id_correo
 * @property string $nom_correo
 * @property string $asunto
 * @property string $cuerpo
 * @property integer $id_tarea_programada
 *
 * @property TarTareaProgramada $idTareaProgramada
 * @property CorDestinatario[] $corDestinatarios
 * @property CorMensajeEnviado[] $corMensajeEnviados
 * @property CorParametro[] $corParametros
 */
class CorCorreo extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cor_correo';
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
            [['nom_correo', 'asunto', 'cuerpo', 'id_tarea_programada'], 'required', 'message'=>'Campo debe diligenciarse, Valor obligatorio'],
            [['id_correo', 'id_tarea_programada'], 'integer','message'=>'Valor debe ser numérico'],
            [['cuerpo'], 'string'],
            [['nom_correo'], 'string', 'max' => 50,'message'=>'Máximo 50 caracteres'],
            [['asunto'], 'string', 'max' => 300,'message'=>'Máximo 300 caracteres'],
            [['id_tarea_programada'], 'exist', 'skipOnError' => true, 'targetClass' => TarTareaProgramada::className(), 'targetAttribute' => ['id_tarea_programada' => 'id_tarea_programada']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_correo' => 'Id Correo',
            'nom_correo' => 'Nombre Correo',
            'asunto' => 'Asunto',
            'cuerpo' => 'Cuerpo',
            'id_tarea_programada' => 'Tarea Programada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTareaProgramada()
    {
        return $this->hasOne(TarTareaProgramada::className(), ['id_tarea_programada' => 'id_tarea_programada']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCorDestinatarios()
    {
        return $this->hasMany(CorDestinatario::className(), ['id_correo' => 'id_correo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCorMensajeEnviados()
    {
        return $this->hasMany(CorMensajeEnviado::className(), ['id_correo' => 'id_correo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCorParametros()
    {
        return $this->hasMany(CorParametro::className(), ['id_correo' => 'id_correo']);
    }
}
