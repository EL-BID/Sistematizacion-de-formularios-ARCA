<?php

namespace common\models\notificaciones;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "notificacion_usuario".
 *
 * @property string $id_usuario
 * @property string $password
 * @property string $fecha
 * @property integer $id_formato
 */
class NotificacionUsuario extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notificacion_usuario';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_usuario'], 'number'],
            [['fecha'], 'date'],
            [['id_formato'], 'integer'],
            [['password'], 'string', 'max' => 255],
        ];
    }

     public function behaviors()
    {
        return [
           // TimestampBehavior::className(),
            'timestamp' => [
                        'class' => 'yii\behaviors\TimestampBehavior',
                        'attributes' => [
                            \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['fecha'],
                            ],
                        'value' => new \yii\db\Expression('NOW()'), //utiliza la expresion now de postgres para obtener la hora senecesita yii\db\Expression;
                        ],
        ];
    }
    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'password' => 'Password',
            'fecha' => 'Fecha',
            'id_formato' => 'Id Formato',
        ];
    }
}
