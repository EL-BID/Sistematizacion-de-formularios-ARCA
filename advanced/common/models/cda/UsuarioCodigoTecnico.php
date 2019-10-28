<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "usuario_codigo_tecnico".
 *
 * @property integer $id_usuario_codigo_tec
 * @property integer $id_usuario_ap
 * @property string $codigo_tecnico_rh
 *
 * @property UsuariosAp $idUsuarioAp
 */
class UsuarioCodigoTecnico extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_codigo_tecnico';
    }
    
    
    public static function primaryKey()
    {
        return "id_usuario_codigo_tec";
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_usuario_codigo_tec', 'id_usuario_ap', 'codigo_tecnico_rh'], 'required'],
            [['id_usuario_codigo_tec', 'id_usuario_ap'], 'integer'],
            [['codigo_tecnico_rh'], 'string', 'max' => 4],
            [['id_usuario_ap'], 'exist', 'skipOnError' => true, 'targetClass' => UsuariosAp::className(), 'targetAttribute' => ['id_usuario_ap' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_usuario_codigo_tec' => 'Id Usuario Codigo Tec',
            'id_usuario_ap' => 'Id Usuario Ap',
            'codigo_tecnico_rh' => 'Codigo Tecnico Rh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsuarioAp()
    {
        return $this->hasOne(UsuariosAp::className(), ['id_usuario' => 'id_usuario_ap']);
    }
}
