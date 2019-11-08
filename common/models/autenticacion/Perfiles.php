<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "perfiles".
 *
 * @property string $estado_perfil
 * @property string $id_usuario
 * @property string $cod_rol
 *
 * @property PerfilRegion[] $perfilRegions
 * @property Region[] $codRegions
 * @property Rol $codRol
 * @property UsuariosAp $idUsuario
 */
class Perfiles extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfiles';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_usuario', 'cod_rol'], 'required'],
            [['id_usuario'], 'number'],
            [['estado_perfil'], 'string', 'max' => 1],
            [['cod_rol'], 'string', 'max' => 10],
            [['cod_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['cod_rol' => 'cod_rol']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => UsuariosAp::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'estado_perfil' => 'Estado Perfil',
            'id_usuario' => 'Id Usuario',
            'cod_rol' => 'Cod Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPerfilRegions()
    {
        return $this->hasMany(PerfilRegion::className(), ['id_usuario' => 'id_usuario', 'cod_rol' => 'cod_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodRegions()
    {
        return $this->hasMany(Region::className(), ['cod_region' => 'cod_region'])->viaTable('perfil_region', ['id_usuario' => 'id_usuario', 'cod_rol' => 'cod_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodRol()
    {
        return $this->hasOne(Rol::className(), ['cod_rol' => 'cod_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsuario()
    {
        return $this->hasOne(UsuariosAp::className(), ['id_usuario' => 'id_usuario']);
    }
}
