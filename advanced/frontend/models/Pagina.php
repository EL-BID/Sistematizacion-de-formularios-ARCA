<?php

namespace frontend\models;

use Yii;

/**
 * Este es el modelo para la clase "pagina".
 *
 * @property string $id_pagina
 * @property string $nombre_pagina
 * @property string $modulo
 *
 * @property AudAuditoria[] $audAuditorias
 */
class Pagina extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pagina';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nombre_pagina'], 'required'],
            [['nombre_pagina', 'modulo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_pagina' => 'Id Pagina',
            'nombre_pagina' => 'Nombre Pagina',
            'modulo' => 'Modulo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getAudAuditorias()
    {
        return $this->hasMany(AudAuditoria::className(), ['id_pagina' => 'id_pagina']);
    }
}
