<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "tipo_entidad".
 *
 * @property string $id_tipo_entidad
 * @property string $nombre_tipo_entidad
 *
 * @property Entidades[] $entidades
 */
class TipoEntidad extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_entidad';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tipo_entidad', 'nombre_tipo_entidad'], 'required'],
            [['id_tipo_entidad'], 'number'],
            [['nombre_tipo_entidad'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_entidad' => 'Id Tipo Entidad',
            'nombre_tipo_entidad' => 'Nombre Tipo Entidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getEntidades()
    {
        return $this->hasMany(Entidades::className(), ['id_tipo_entidad' => 'id_tipo_entidad']);
    }
}
