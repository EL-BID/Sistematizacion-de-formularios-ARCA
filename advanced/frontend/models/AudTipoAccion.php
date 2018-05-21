<?php

namespace frontend\models;

use Yii;

/**
 * Este es el modelo para la clase "aud_tipo_accion".
 *
 * @property string $id
 * @property string $usuario_digitador
 * @property string $fecha_digitacion
 * @property string $nom_accion
 * @property integer $id_tmensaje
 *
 * @property AudAuditoria[] $audAuditorias
 */
class AudTipoAccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aud_tipo_accion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_digitacion'], 'safe'],
            [['id_tmensaje'], 'integer'],
            [['usuario_digitador', 'nom_accion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_digitador' => 'Usuario Digitador',
            'fecha_digitacion' => 'Fecha Digitacion',
            'nom_accion' => 'Nom Accion',
            'id_tmensaje' => 'Id Tmensaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getAudAuditorias()
    {
        return $this->hasMany(AudAuditoria::className(), ['id_taccion' => 'id']);
    }
}
