<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "cantones".
 *
 * @property string $cod_canton
 * @property string $nombre_canton
 * @property string $cod_provincia
 * @property string $id_demarcacion
 *
 * @property Demarcaciones $idDemarcacion
 * @property Provincias $codProvincia
 * @property Entidades[] $entidades
 * @property Parroquias[] $parroquias
 */
class Cantones extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cantones';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['cod_canton', 'nombre_canton', 'cod_provincia'], 'required'],
            [['id_demarcacion'], 'number'],
            [['cod_canton', 'cod_provincia'], 'string', 'max' => 4],
            [['nombre_canton'], 'string', 'max' => 80],
            [['id_demarcacion'], 'exist', 'skipOnError' => true, 'targetClass' => Demarcaciones::className(), 'targetAttribute' => ['id_demarcacion' => 'id_demarcacion']],
            [['cod_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincias::className(), 'targetAttribute' => ['cod_provincia' => 'cod_provincia']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'cod_canton' => 'Cod Canton',
            'nombre_canton' => 'Nombre Canton',
            'cod_provincia' => 'Cod Provincia',
            'id_demarcacion' => 'Id Demarcacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdDemarcacion()
    {
        return $this->hasOne(Demarcaciones::className(), ['id_demarcacion' => 'id_demarcacion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodProvincia()
    {
        return $this->hasOne(Provincias::className(), ['cod_provincia' => 'cod_provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getEntidades()
    {
        return $this->hasMany(Entidades::className(), ['cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getParroquias()
    {
        return $this->hasMany(Parroquias::className(), ['cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']);
    }
}
