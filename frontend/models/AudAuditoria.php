<?php

namespace frontend\models;

use Yii;

/**
 * Este es el modelo para la clase "aud_auditoria".
 *
 * @property string $id
 * @property string $usuario
 * @property string $ip_origen
 * @property string $texto
 * @property string $json
 * @property integer $id_tevento
 * @property integer $id_tmensaje
 * @property integer $id_taccion
 * @property string $fecha_hora
 * @property string $id_pagina
 * @property string $status
 * @property string $pagina
 * @property string $modulo
 *
 * @property AudTipoAccion $idTaccion
 * @property AudTipoEvento $idTevento
 * @property AudTipoMensaje $idTmensaje
 * @property Pagina $idPagina
 */
class AudAuditoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aud_auditoria';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['texto', 'json'], 'string'],
            [['id_tevento', 'id_tmensaje', 'id_taccion'], 'integer'],
            [['fecha_hora'], 'safe'],
            [['id_pagina'], 'number'],
            [['usuario', 'ip_origen', 'pagina', 'modulo'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 30],
            [['id_taccion'], 'exist', 'skipOnError' => true, 'targetClass' => AudTipoAccion::className(), 'targetAttribute' => ['id_taccion' => 'id']],
            [['id_tevento'], 'exist', 'skipOnError' => true, 'targetClass' => AudTipoEvento::className(), 'targetAttribute' => ['id_tevento' => 'id']],
            [['id_tmensaje'], 'exist', 'skipOnError' => true, 'targetClass' => AudTipoMensaje::className(), 'targetAttribute' => ['id_tmensaje' => 'id']],
            [['id_pagina'], 'exist', 'skipOnError' => true, 'targetClass' => Pagina::className(), 'targetAttribute' => ['id_pagina' => 'id_pagina']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'ip_origen' => 'Ip Origen',
            'texto' => 'Texto',
            'json' => 'Json',
            'id_tevento' => 'Id Tevento',
            'id_tmensaje' => 'Id Tmensaje',
            'id_taccion' => 'Id Taccion',
            'fecha_hora' => 'Fecha Hora',
            'id_pagina' => 'Id Pagina',
            'status' => 'Status',
            'pagina' => 'Pagina',
            'modulo' => 'Modulo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTaccion()
    {
        return $this->hasOne(AudTipoAccion::className(), ['id' => 'id_taccion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTevento()
    {
        return $this->hasOne(AudTipoEvento::className(), ['id' => 'id_tevento']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTmensaje()
    {
        return $this->hasOne(AudTipoMensaje::className(), ['id' => 'id_tmensaje']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPagina()
    {
        return $this->hasOne(Pagina::className(), ['id_pagina' => 'id_pagina']);
    }
}
