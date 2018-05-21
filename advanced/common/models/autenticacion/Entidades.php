<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "entidades".
 *
 * @property string $id_entidad
 * @property string $nombre_entidad
 * @property string $cod_canton
 * @property string $cod_canton_p
 * @property string $cod_provincia
 * @property string $cod_provincia_p
 * @property string $cod_parroquia
 * @property string $id_tipo_entidad
 * @property string $identifiacion
 *
 * @property Cantones $codCanton
 * @property Parroquias $codCantonP
 * @property TipoEntidad $idTipoEntidad
 * @property Regionentidades[] $regionentidades
 * @property Region[] $codRegions
 */
class Entidades extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entidades';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nombre_entidad'], 'required'],
            [['id_tipo_entidad'], 'number'],
            [['id_entidad'], 'string', 'max' => 10],
            [['nombre_entidad'], 'string', 'max' => 100],
            [['cod_canton', 'cod_canton_p', 'cod_provincia', 'cod_provincia_p', 'cod_parroquia'], 'string', 'max' => 4],
            [['cod_canton', 'cod_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Cantones::className(), 'targetAttribute' => ['cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']],
            [['cod_canton_p', 'cod_provincia_p', 'cod_parroquia'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquias::className(), 'targetAttribute' => ['cod_canton_p' => 'cod_canton', 'cod_provincia_p' => 'cod_provincia', 'cod_parroquia' => 'cod_parroquia']],
            [['id_tipo_entidad'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEntidad::className(), 'targetAttribute' => ['id_tipo_entidad' => 'id_tipo_entidad']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_entidad' => 'Id Entidad',
            'nombre_entidad' => 'Nombre Entidad',
            'cod_canton' => 'Cod Canton',
            'cod_canton_p' => 'Cod Canton P',
            'cod_provincia' => 'Cod Provincia',
            'cod_provincia_p' => 'Cod Provincia P',
            'cod_parroquia' => 'Cod Parroquia',
            'id_tipo_entidad' => 'Id Tipo Entidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodCanton()
    {
        return $this->hasOne(Cantones::className(), ['cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodCantonP()
    {
        return $this->hasOne(Parroquias::className(), ['cod_canton' => 'cod_canton_p', 'cod_provincia' => 'cod_provincia_p', 'cod_parroquia' => 'cod_parroquia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTipoEntidad()
    {
        return $this->hasOne(TipoEntidad::className(), ['id_tipo_entidad' => 'id_tipo_entidad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getRegionentidades()
    {
        return $this->hasMany(Regionentidades::className(), ['id_entidad' => 'id_entidad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodRegions()
    {
        return $this->hasMany(Region::className(), ['cod_region' => 'cod_region'])->viaTable('regionentidades', ['id_entidad' => 'id_entidad']);
    }
}
