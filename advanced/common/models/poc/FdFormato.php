<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_formato".
 *
 * @property integer $id_formato
 * @property string $nom_formato
 * @property string $num_formato
 * @property integer $id_tipo_view_formato
 * @property integer $id_modulo
 * @property integer $ult_id_version
 * @property integer $cod_rol
 * @property string $numeracion
 * @property string $sop_ruta
 * @property string $url_acceso
 * @property string $filtros_search
 *
 * @property FdConjuntoPregunta[] $fdConjuntoPreguntas
 * @property FdConjuntoRespuesta[] $fdConjuntoRespuestas
 * @property FdModulo $idModulo
 * @property FdTipoViewFormato $idTipoViewFormato
 * @property FdVersion $ultIdVersion
 * @property Rol $codRol
 * @property FdPeriodoFormato[] $fdPeriodoFormatos
 * @property TrPeriodo[] $idPeriodos
 * @property FdRespuesta[] $fdRespuestas
 */
class FdFormato extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_formato';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tipo_view_formato', 'id_modulo', 'ult_id_version', 'cod_rol'], 'integer'],
            [['nom_formato', 'num_formato'], 'string', 'max' => 50],
            [['numeracion', 'filtros_search'], 'string', 'max' => 1],
            [['sop_ruta', 'url_acceso'], 'string', 'max' => 100],
            [['id_modulo'], 'exist', 'skipOnError' => true, 'targetClass' => FdModulo::className(), 'targetAttribute' => ['id_modulo' => 'id_modulo']],
            [['id_tipo_view_formato'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoViewFormato::className(), 'targetAttribute' => ['id_tipo_view_formato' => 'id_tipo_view_formato']],
            [['ult_id_version'], 'exist', 'skipOnError' => true, 'targetClass' => FdVersion::className(), 'targetAttribute' => ['ult_id_version' => 'id_version']],
            [['cod_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['cod_rol' => 'cod_rol']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_formato' => 'Id Formato',
            'nom_formato' => 'Nom Formato',
            'num_formato' => 'Num Formato',
            'id_tipo_view_formato' => 'Id Tipo View Formato',
            'id_modulo' => 'Id Modulo',
            'ult_id_version' => 'Ult Id Version',
            'cod_rol' => 'Cod Rol',
            'numeracion' => 'Numeracion',
            'sop_ruta' => 'Sop Ruta',
            'url_acceso' => 'Url Acceso',
            'filtros_search' => 'Filtros Search',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdConjuntoPreguntas()
    {
        return $this->hasMany(FdConjuntoPregunta::className(), ['id_formato' => 'id_formato']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdConjuntoRespuestas()
    {
        return $this->hasMany(FdConjuntoRespuesta::className(), ['id_formato' => 'id_formato']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdModulo()
    {
        return $this->hasOne(FdModulo::className(), ['id_modulo' => 'id_modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTipoViewFormato()
    {
        return $this->hasOne(FdTipoViewFormato::className(), ['id_tipo_view_formato' => 'id_tipo_view_formato']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getUltIdVersion()
    {
        return $this->hasOne(FdVersion::className(), ['id_version' => 'ult_id_version']);
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
    public function getFdPeriodoFormatos()
    {
        return $this->hasMany(FdPeriodoFormato::className(), ['id_formato' => 'id_formato']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPeriodos()
    {
        return $this->hasMany(TrPeriodo::className(), ['id_periodo' => 'id_periodo'])->viaTable('fd_periodo_formato', ['id_formato' => 'id_formato']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestas()
    {
        return $this->hasMany(FdRespuesta::className(), ['id_formato' => 'id_formato']);
    }
}
