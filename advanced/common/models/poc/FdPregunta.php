<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_pregunta".
 *
 * @property integer $id_pregunta
 * @property string $nom_pregunta
 * @property string $ayuda_pregunta
 * @property string $obligatorio
 * @property integer $max_largo
 * @property integer $min_largo
 * @property string $max_date
 * @property string $min_date
 * @property integer $orden
 * @property string $estado
 * @property string $ini_fecha
 * @property string $fin_fecha
 * @property integer $id_tpregunta
 * @property integer $id_capitulo
 * @property integer $id_seccion
 * @property integer $id_agrupacion
 * @property integer $id_tselect
 * @property string $caracteristica_preg
 * @property integer $id_conjunto_pregunta
 * @property string $visible
 * @property string $visible_desc_preg
 * @property integer $num_col_label
 * @property integer $num_col_input
 * @property string $stylecss
 * @property string $format
 * @property string $min_number
 * @property string $max_number
 * @property string $atributos
 * @property string $reg_exp
 * @property string $numerada
 *
 * @property FdClasificacionPregunta[] $fdClasificacionPreguntas
 * @property FdComandoPregunta[] $fdComandoPreguntas
 * @property TrComando[] $idComandos
 * @property FdCoordenada[] $fdCoordenadas
 * @property FdElementoCondicion[] $fdElementoCondicions
 * @property FdElementoCondicion[] $fdElementoCondicions0
 * @property FdInvolucrado[] $fdInvolucrados
 * @property FdAgrupacion $idAgrupacion
 * @property FdCapitulo $idCapitulo
 * @property FdConjuntoPregunta $idConjuntoPregunta
 * @property FdSeccion $idSeccion
 * @property FdTipoPregunta $idTpregunta
 * @property FdTipoSelect $idTselect
 * @property FdPreguntaDescendiente[] $fdPreguntaDescendientes
 * @property FdPreguntaDescendiente[] $fdPreguntaDescendientes0
 * @property FdRespuesta[] $fdRespuestas
 * @property FdRespuestaXMes[] $fdRespuestaXMes
 * @property FdUbicacion[] $fdUbicacions
 */
class FdPregunta extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_pregunta';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nom_pregunta', 'obligatorio', 'orden', 'estado'], 'required'],
            [['max_largo', 'min_largo', 'orden', 'id_tpregunta', 'id_capitulo', 'id_seccion', 'id_agrupacion', 'id_tselect', 'id_conjunto_pregunta', 'num_col_label', 'num_col_input'], 'integer'],
            [['max_date', 'min_date', 'ini_fecha', 'fin_fecha'], 'date'],
            [['min_number', 'max_number'], 'number'],
            [['nom_pregunta'], 'string', 'max' => 500],
            [['ayuda_pregunta', 'reg_exp'], 'string', 'max' => 1000],
            [['obligatorio', 'estado', 'caracteristica_preg', 'visible', 'visible_desc_preg', 'numerada'], 'string', 'max' => 1],
            [['stylecss', 'format', 'atributos'], 'string', 'max' => 50],
            [['id_agrupacion'], 'exist', 'skipOnError' => true, 'targetClass' => FdAgrupacion::className(), 'targetAttribute' => ['id_agrupacion' => 'id_agrupacion']],
            [['id_capitulo'], 'exist', 'skipOnError' => true, 'targetClass' => FdCapitulo::className(), 'targetAttribute' => ['id_capitulo' => 'id_capitulo']],
            [['id_conjunto_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoPregunta::className(), 'targetAttribute' => ['id_conjunto_pregunta' => 'id_conjunto_pregunta']],
            [['id_seccion'], 'exist', 'skipOnError' => true, 'targetClass' => FdSeccion::className(), 'targetAttribute' => ['id_seccion' => 'id_seccion']],
            [['id_tpregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoPregunta::className(), 'targetAttribute' => ['id_tpregunta' => 'id_tpregunta']],
            [['id_tselect'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoSelect::className(), 'targetAttribute' => ['id_tselect' => 'id_tselect']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_pregunta' => 'Id Pregunta',
            'nom_pregunta' => 'Nombre Pregunta',
            'ayuda_pregunta' => 'Ayuda Pregunta',
            'obligatorio' => 'Obligatorio',
            'max_largo' => 'Largo Maximo',
            'min_largo' => 'Largo Minimo',
            'max_date' => 'Max Date',
            'min_date' => 'Min Date',
            'orden' => 'Orden',
            'estado' => 'Estado',
            'ini_fecha' => 'Ini Fecha',
            'fin_fecha' => 'Fin Fecha',
            'id_tpregunta' => 'Id Tpregunta',
            'id_capitulo' => 'Id Capitulo',
            'id_seccion' => 'Id Seccion',
            'id_agrupacion' => 'Id Agrupacion',
            'id_tselect' => 'Id Tselect',
            'caracteristica_preg' => 'Caracteristica Preg',
            'id_conjunto_pregunta' => 'Id Conjunto Pregunta',
            'visible' => 'Visible',
            'visible_desc_preg' => 'Visible Descripcion Pregunta',
            'num_col_label' => 'Numero de Columnas Label',
            'num_col_input' => 'Numero de Columnas Input',
            'stylecss' => 'Stylecss',
            'format' => 'Format',
            'min_number' => 'Min Number',
            'max_number' => 'Max Number',
            'atributos' => 'Atributos',
            'reg_exp' => 'Reg Exp',
            'numerada' => 'Numerada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdClasificacionPreguntas()
    {
        return $this->hasMany(FdClasificacionPregunta::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdComandoPreguntas()
    {
        return $this->hasMany(FdComandoPregunta::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdComandos()
    {
        return $this->hasMany(TrComando::className(), ['id_comando' => 'id_comando'])->viaTable('fd_comando_pregunta', ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCoordenadas()
    {
        return $this->hasMany(FdCoordenada::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdElementoCondicions()
    {
        return $this->hasMany(FdElementoCondicion::className(), ['id_pregunta_habilitadora' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdElementoCondicions0()
    {
        return $this->hasMany(FdElementoCondicion::className(), ['id_pregunta_condicionada' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdInvolucrados()
    {
        return $this->hasMany(FdInvolucrado::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdAgrupacion()
    {
        return $this->hasOne(FdAgrupacion::className(), ['id_agrupacion' => 'id_agrupacion']);
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
    public function getIdSeccion()
    {
        return $this->hasOne(FdSeccion::className(), ['id_seccion' => 'id_seccion']);
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
    public function getIdTselect()
    {
        return $this->hasOne(FdTipoSelect::className(), ['id_tselect' => 'id_tselect']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntaDescendientes()
    {
        return $this->hasMany(FdPreguntaDescendiente::className(), ['id_pregunta_padre' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntaDescendientes0()
    {
        return $this->hasMany(FdPreguntaDescendiente::className(), ['id_pregunta_descendiente' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestas()
    {
        return $this->hasMany(FdRespuesta::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestaXMes()
    {
        return $this->hasMany(FdRespuestaXMes::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdUbicacions()
    {
        return $this->hasMany(FdUbicacion::className(), ['id_pregunta' => 'id_pregunta']);
    }
}
