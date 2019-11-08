<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "tipo_acceso".
 *
 * @property string $id_tipo_acceso
 * @property string $nombre_acceso
 *
 * @property Accesos[] $accesos
 */
class TipoAcceso extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_acceso';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tipo_acceso', 'nombre_acceso'], 'required'],
            [['id_tipo_acceso'], 'number'],
            [['nombre_acceso'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_acceso' => 'Id Tipo Acceso',
            'nombre_acceso' => 'Nombre Acceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getAccesos()
    {
        return $this->hasMany(Accesos::className(), ['id_tipo_acceso' => 'id_tipo_acceso']);
    }
}
