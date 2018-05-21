<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "rol".
 *
 * @property string $cod_rol
 * @property string $nombre_rol
 *
 * @property Accesos[] $accesos
 * @property Perfiles[] $perfiles
 * @property UsuariosAp[] $idUsuarios
 */
class Rol extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nombre_rol'], 'required'],
            [['nombre_rol'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'cod_rol' => 'Cod Rol',
            'nombre_rol' => 'Nombre Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getAccesos()
    {
        return $this->hasMany(Accesos::className(), ['cod_rol' => 'cod_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPerfiles()
    {
        return $this->hasMany(Perfiles::className(), ['cod_rol' => 'cod_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsuarios()
    {
        return $this->hasMany(UsuariosAp::className(), ['id_usuario' => 'id_usuario'])->viaTable('perfiles', ['cod_rol' => 'cod_rol']);
    }
}
