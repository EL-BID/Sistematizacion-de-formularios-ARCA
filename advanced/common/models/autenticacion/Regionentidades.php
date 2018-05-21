<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "regionentidades".
 *
 * @property string $cod_region
 * @property string $id_entidad
 *
 * @property Entidades $idEntidad
 * @property Region $codRegion
 */
class Regionentidades extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regionentidades';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['cod_region', 'id_entidad'], 'required'],
            [['cod_region', 'id_entidad'], 'string', 'max' => 10],
            [['id_entidad'], 'exist', 'skipOnError' => true, 'targetClass' => Entidades::className(), 'targetAttribute' => ['id_entidad' => 'id_entidad']],
            [['cod_region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['cod_region' => 'cod_region']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'cod_region' => 'Cod Region',
            'id_entidad' => 'Id Entidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdEntidad()
    {
        return $this->hasOne(Entidades::className(), ['id_entidad' => 'id_entidad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodRegion()
    {
        return $this->hasOne(Region::className(), ['cod_region' => 'cod_region']);
    }
}
