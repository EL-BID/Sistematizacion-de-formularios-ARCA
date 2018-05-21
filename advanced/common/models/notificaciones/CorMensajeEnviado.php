<?php

namespace common\models\notificaciones;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cor_mensaje_enviado".
 *
 * @property integer $id_mensaje_enviado
 * @property string $cor_parametro
 * @property string $cor_destinatario
 * @property string $asunto
 * @property integer $id_correo
 *
 * @property CorCorreo $idCorreo
 */
class CorMensajeEnviado extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cor_mensaje_enviado';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_mensaje_enviado', 'cor_parametro', 'cor_destinatario', 'asunto', 'id_correo'], 'required'],
            [['id_mensaje_enviado', 'id_correo'], 'integer'],
            [['cor_parametro', 'cor_destinatario', 'asunto'], 'string'],
            [['id_correo'], 'exist', 'skipOnError' => true, 'targetClass' => CorCorreo::className(), 'targetAttribute' => ['id_correo' => 'id_correo']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_mensaje_enviado' => 'Id Mensaje Enviado',
            'cor_parametro' => 'Parametro',
            'cor_destinatario' => 'Destinatario',
            'asunto' => 'Asunto',
            'id_correo' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCorreo()
    {
        return $this->hasOne(CorCorreo::className(), ['id_correo' => 'id_correo']);
    }
}
