<?php

namespace common\models\wiki;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Este es el modelo para la clase "clientes".
 *
 * @property string $Id
 * @property string $name
 * @property string $lastname
 * @property string $birthdate
 * @property string $createdate
 * @property string $type
 * @property string $ciudad
 * @property integer $ciudad2_id
 *
 * @property Ciudades $ciudad2
 * @property Cometarios[] $cometarios
 */
class Clientesmultiple extends \yii\db\ActiveRecord
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
        return 'clientes';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['name', 'lastname'], 'required'],
             [['type'], 'string'],
            [['ciudad2_id'], 'integer'],
            [['name', 'lastname'], 'string', 'max' => 40],
            [['ciudad2_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudades::className(), 'targetAttribute' => ['ciudad2_id' => 'Id']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'type' => 'Type',
            'ciudad' => 'Ciudad',
            'ciudad2_id' => 'Ciudad2 ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCiudad2()
    {
        return $this->hasOne(Ciudades::className(), ['Id' => 'ciudad2_id']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCometarios()
    {
        return $this->hasMany(Cometarios::className(), ['id_cliente' => 'Id']);
    }

    public function getCiudadesDropdown()
    {
            $listCategory   = Ciudadesmultiple::find()->all();
            $list   = ArrayHelper::map($listCategory,'Id','ciudades');
            return $list;
    }
}
