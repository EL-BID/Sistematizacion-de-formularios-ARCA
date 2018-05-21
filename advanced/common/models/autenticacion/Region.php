<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "region".
 *
 * @property string $cod_region
 * @property string $nombre_region
 *
 * @property PerfilRegion[] $perfilRegions
 * @property Regionentidades[] $regionentidades
 * @property Entidades[] $idEntidads
 */
class Region extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['cod_region', 'nombre_region'], 'required'],
            [['cod_region'], 'string', 'max' => 10],
            [['nombre_region'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'cod_region' => 'Cod Region',
            'nombre_region' => 'Nombre Region',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPerfilRegions()
    {
        return $this->hasMany(PerfilRegion::className(), ['cod_region' => 'cod_region']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getRegionentidades()
    {
        return $this->hasMany(Regionentidades::className(), ['cod_region' => 'cod_region']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdEntidads()
    {
        return $this->hasMany(Entidades::className(), ['id_entidad' => 'id_entidad'])->viaTable('regionentidades', ['cod_region' => 'cod_region']);
    }
}
