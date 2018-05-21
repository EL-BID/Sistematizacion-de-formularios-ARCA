<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_respuesta".
 *
 * @property integer $id_respuesta
 * @property string $ra_fecha
 * @property string $ra_check
 * @property string $ra_descripcion
 * @property integer $ra_entero
 * @property string $ra_decimal
 * @property string $ra_porcentaje
 * @property integer $id_conjunto_respuesta
 * @property string $ra_moneda
 * @property integer $id_pregunta
 * @property integer $id_opcion_select
 * @property integer $id_tpregunta
 * @property integer $id_capitulo
 * @property integer $id_formato
 * @property integer $id_conjunto_pregunta
 * @property integer $id_version
 * @property integer $cantidad_registros
 *
 * @property FdCoordenada[] $fdCoordenadas
 * @property FdInvolucrado[] $fdInvolucrados
 * @property FdCapitulo $idCapitulo
 * @property FdConjuntoPregunta $idConjuntoPregunta
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdFormato $idFormato
 * @property FdOpcionSelect $idOpcionSelect
 * @property FdPregunta $idPregunta
 * @property FdTipoPregunta $idTpregunta
 * @property FdVersion $idVersion
 * @property FdRespuestaXMes[] $fdRespuestaXMes
 * @property FdUbicacion[] $fdUbicacions
 * @property SopSoportes[] $sopSoportes
 */
class FdRespuesta extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_respuesta';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['ra_entero', 'id_conjunto_respuesta', 'id_pregunta', 'id_opcion_select', 'id_tpregunta', 'id_capitulo', 'id_formato', 'id_conjunto_pregunta', 'id_version', 'cantidad_registros'], 'integer'],
            [['ra_fecha'], 'date'],
            [['ra_descripcion'], 'string'],
            [['ra_decimal', 'ra_porcentaje', 'ra_moneda'], 'number'],
            [['ra_check'], 'string', 'max' => 1],
            [['id_capitulo'], 'exist', 'skipOnError' => true, 'targetClass' => FdCapitulo::className(), 'targetAttribute' => ['id_capitulo' => 'id_capitulo']],
            [['id_conjunto_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoPregunta::className(), 'targetAttribute' => ['id_conjunto_pregunta' => 'id_conjunto_pregunta']],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_formato'], 'exist', 'skipOnError' => true, 'targetClass' => FdFormato::className(), 'targetAttribute' => ['id_formato' => 'id_formato']],
            [['id_opcion_select'], 'exist', 'skipOnError' => true, 'targetClass' => FdOpcionSelect::className(), 'targetAttribute' => ['id_opcion_select' => 'id_opcion_select']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_tpregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoPregunta::className(), 'targetAttribute' => ['id_tpregunta' => 'id_tpregunta']],
            [['id_version'], 'exist', 'skipOnError' => true, 'targetClass' => FdVersion::className(), 'targetAttribute' => ['id_version' => 'id_version']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'ra_fecha' => 'Ra Fecha',
            'ra_check' => 'Ra Check',
            'ra_descripcion' => 'Ra Descripcion',
            'ra_entero' => 'Ra Entero',
            'ra_decimal' => 'Ra Decimal',
            'ra_porcentaje' => 'Ra Porcentaje',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'ra_moneda' => 'Ra Moneda',
            'id_pregunta' => 'Id Pregunta',
            'id_opcion_select' => 'Id Opcion Select',
            'id_tpregunta' => 'Id Tpregunta',
            'id_capitulo' => 'Id Capitulo',
            'id_formato' => 'Id Formato',
            'id_conjunto_pregunta' => 'Id Conjunto Pregunta',
            'id_version' => 'Id Version',
            'cantidad_registros' => 'Cantidad Registros',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCoordenadas()
    {
        return $this->hasMany(FdCoordenada::className(), ['id_respuesta' => 'id_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdInvolucrados()
    {
        return $this->hasMany(FdInvolucrado::className(), ['id_respuesta' => 'id_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCapitulo()
    {
        return $this->hasOne(FdCapitulo::className(), ['id_capitulo' => 'id_capitulo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdConjuntoPregunta()
    {
        return $this->hasOne(FdConjuntoPregunta::className(), ['id_conjunto_pregunta' => 'id_conjunto_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdConjuntoRespuesta()
    {
        return $this->hasOne(FdConjuntoRespuesta::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdFormato()
    {
        return $this->hasOne(FdFormato::className(), ['id_formato' => 'id_formato']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdOpcionSelect()
    {
        return $this->hasOne(FdOpcionSelect::className(), ['id_opcion_select' => 'id_opcion_select']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPregunta()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTpregunta()
    {
        return $this->hasOne(FdTipoPregunta::className(), ['id_tpregunta' => 'id_tpregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdVersion()
    {
        return $this->hasOne(FdVersion::className(), ['id_version' => 'id_version']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestaXMes()
    {
        return $this->hasMany(FdRespuestaXMes::className(), ['id_respuesta' => 'id_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdUbicacions()
    {
        return $this->hasMany(FdUbicacion::className(), ['id_respuesta' => 'id_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getSopSoportes()
    {
        return $this->hasMany(SopSoportes::className(), ['id_respuesta' => 'id_respuesta']);
    }
}
