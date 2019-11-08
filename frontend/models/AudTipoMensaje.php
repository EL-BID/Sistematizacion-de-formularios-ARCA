<?php

namespace frontend\models;

use Yii;

/**
 * Este es el modelo para la clase "aud_tipo_mensaje".
 *
 * @property string $id
 * @property string $usuario_digitador
 * @property string $fecha_digitacion
 * @property string $nom_tmensaje
 *
 * @property AudAuditoria[] $audAuditorias
 */
class AudTipoMensaje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aud_tipo_mensaje';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_digitacion'], 'safe'],
            [['usuario_digitador', 'nom_tmensaje'], 'string', 'max' => 50],
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
            'nom_tmensaje' => 'Nom Tmensaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getAudAuditorias()
    {
        return $this->hasMany(AudAuditoria::className(), ['id_tmensaje' => 'id']);
    }
}
