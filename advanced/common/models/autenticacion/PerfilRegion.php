<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "perfil_region".
 *
 * @property string $estado_per_reg
 * @property string $id_usuario
 * @property string $cod_rol
 * @property string $cod_region
 *
 * @property Perfiles $idUsuario
 * @property Region $codRegion
 */
class PerfilRegion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil_region';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['estado_per_reg', 'id_usuario', 'cod_rol', 'cod_region'], 'required'],
            [['id_usuario'], 'number'],
            [['estado_per_reg'], 'string', 'max' => 1],
            [['cod_rol', 'cod_region'], 'string', 'max' => 10],
            [['id_usuario', 'cod_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Perfiles::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario', 'cod_rol' => 'cod_rol']],
            [['cod_region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['cod_region' => 'cod_region']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'estado_per_reg' => 'Estado Per Reg',
            'id_usuario' => 'Id Usuario',
            'cod_rol' => 'Cod Rol',
            'cod_region' => 'Cod Region',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Perfiles::className(), ['id_usuario' => 'id_usuario', 'cod_rol' => 'cod_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodRegion()
    {
        return $this->hasOne(Region::className(), ['cod_region' => 'cod_region']);
    }
}
