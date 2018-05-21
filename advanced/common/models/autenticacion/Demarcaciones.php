<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "demarcaciones".
 *
 * @property string $id_demarcacion
 * @property string $cod_demarcacion
 * @property string $nombre_demarcacion
 *
 * @property Cantones[] $cantones
 */
class Demarcaciones extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'demarcaciones';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_demarcacion', 'cod_demarcacion', 'nombre_demarcacion'], 'required'],
            [['id_demarcacion'], 'number'],
            [['cod_demarcacion'], 'string', 'max' => 4],
            [['nombre_demarcacion'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_demarcacion' => 'Id Demarcacion',
            'cod_demarcacion' => 'Cod Demarcacion',
            'nombre_demarcacion' => 'Nombre Demarcacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCantones()
    {
        return $this->hasMany(Cantones::className(), ['id_demarcacion' => 'id_demarcacion']);
    }
}
