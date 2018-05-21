<?php

namespace frontend\models;

use Yii;

/**
 * Este es el modelo para la clase "aud_tipo_evento".
 *
 * @property string $id
 * @property string $usuario_digitador
 * @property string $fecha_digitacion
 * @property string $nom_tevento
 *
 * @property AudAuditoria[] $audAuditorias
 */
class AudTipoEvento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aud_tipo_evento';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_digitacion'], 'safe'],
            [['usuario_digitador', 'nom_tevento'], 'string', 'max' => 50],
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
            'nom_tevento' => 'Nom Tevento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getAudAuditorias()
    {
        return $this->hasMany(AudAuditoria::className(), ['id_tevento' => 'id']);
    }
}
