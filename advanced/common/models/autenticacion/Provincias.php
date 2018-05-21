<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "provincias".
 *
 * @property string $cod_provincia
 * @property string $nombre_provincia
 * @property string $cod_telefonico
 *
 * @property Cantones[] $cantones
 */
class Provincias extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provincias';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['cod_provincia'], 'unique'],
            [['cod_provincia'], 'required'],
            [['cod_provincia'], 'string', 'max' => 4],
            [['nombre_provincia'], 'string', 'max' => 60],
            [['cod_telefonico'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'cod_provincia' => 'Cod Provincia',
            'nombre_provincia' => 'Nombre Provincia',
            'cod_telefonico' => 'Cod Telefonico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCantones()
    {
        return $this->hasMany(Cantones::className(), ['cod_provincia' => 'cod_provincia']);
    }
}
