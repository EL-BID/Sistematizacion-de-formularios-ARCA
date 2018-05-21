<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "accesos".
 *
 * @property string $id__acceso
 * @property string $nombre_acceso
 * @property string $id_pagina
 * @property string $id_tipo_acceso
 * @property string $cod_rol
 *
 * @property Pagina $idPagina
 * @property Rol $codRol
 * @property TipoAcceso $idTipoAcceso
 */
class Accesos extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accesos';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id__acceso', 'nombre_acceso'], 'required'],
            [['id__acceso', 'id_pagina', 'id_tipo_acceso'], 'number'],
            [['nombre_acceso'], 'string', 'max' => 50],
            [['cod_rol'], 'string', 'max' => 10],
            [['id_pagina'], 'exist', 'skipOnError' => true, 'targetClass' => Pagina::className(), 'targetAttribute' => ['id_pagina' => 'id_pagina']],
            [['cod_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['cod_rol' => 'cod_rol']],
            [['id_tipo_acceso'], 'exist', 'skipOnError' => true, 'targetClass' => TipoAcceso::className(), 'targetAttribute' => ['id_tipo_acceso' => 'id_tipo_acceso']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id__acceso' => 'Id  Acceso',
            'nombre_acceso' => 'Nombre Acceso',
            'id_pagina' => 'Id Pagina',
            'id_tipo_acceso' => 'Id Tipo Acceso',
            'cod_rol' => 'Cod Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPagina()
    {
        return $this->hasOne(Pagina::className(), ['id_pagina' => 'id_pagina']);
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
    public function getIdTipoAcceso()
    {
        return $this->hasOne(TipoAcceso::className(), ['id_tipo_acceso' => 'id_tipo_acceso']);
    }
}
