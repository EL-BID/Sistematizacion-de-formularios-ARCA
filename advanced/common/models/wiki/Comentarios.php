<?php

namespace common\models\wiki;

use Yii;

/**
 * This is the model class for table "cometarios".
 *
 * @property string $id_cliente
 * @property string $comentario
 *
 * @property Clientes $idCliente
 */
class Comentarios extends \yii\db\ActiveRecord
{
    
    public static function getDb()
    {
        return Yii::$app->get('db4');
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cometarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente'], 'required'],
            [['id_cliente'], 'number'],
            [['comentario'], 'string', 'max' => 255],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['id_cliente' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'comentario' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Clientes::className(), ['Id' => 'id_cliente']);
    }
}
