<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_capitulo".
 *
 * @property integer $id_capitulo
 * @property string $nom_capitulo
 * @property integer $orden
 * @property string $url
 * @property string $consulta
 * @property integer $id_tview_cap
 * @property integer $id_tcapitulo
 * @property string $icono
 * @property integer $id_conjunto_pregunta
 * @property integer $id_comando
 * @property integer $num_columnas
 * @property string $stylecss
 * @property string $numeracion
 *
 * @property FdConjuntoPregunta $idConjuntoPregunta
 * @property FdTipoCapitulo $idTcapitulo
 * @property FdTipoViewCap $idTviewCap
 * @property TrComando $idComando
 * @property FdElementoCondicion[] $fdElementoCondicions
 * @property FdPregunta[] $fdPreguntas
 * @property FdRespuesta[] $fdRespuestas
 * @property FdSeccion[] $fdSeccions
 */
class FdCapitulo extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_capitulo';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_capitulo', 'nom_capitulo', 'orden'], 'required'],
            [['id_capitulo', 'orden', 'id_tview_cap', 'id_tcapitulo', 'id_conjunto_pregunta', 'id_comando', 'num_columnas'], 'integer'],
            [['nom_capitulo', 'url'], 'string', 'max' => 500],
            [['consulta'], 'string', 'max' => 2000],
            [['icono'], 'string', 'max' => 1000],
            [['stylecss'], 'string', 'max' => 50],
            [['numeracion'], 'string', 'max' => 1],
            [['id_conjunto_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoPregunta::className(), 'targetAttribute' => ['id_conjunto_pregunta' => 'id_conjunto_pregunta']],
            [['id_tcapitulo'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoCapitulo::className(), 'targetAttribute' => ['id_tcapitulo' => 'id_tcapitulo']],
            [['id_tview_cap'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoViewCap::className(), 'targetAttribute' => ['id_tview_cap' => 'id_tview_cap']],
            [['id_comando'], 'exist', 'skipOnError' => true, 'targetClass' => TrComando::className(), 'targetAttribute' => ['id_comando' => 'id_comando']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_capitulo' => 'Id Capitulo',
            'nom_capitulo' => 'Nom Capitulo',
            'orden' => 'Orden',
            'url' => 'Url',
            'consulta' => 'Consulta',
            'id_tview_cap' => 'Id Tview Cap',
            'id_tcapitulo' => 'Id Tcapitulo',
            'icono' => 'Icono',
            'id_conjunto_pregunta' => 'Id Conjunto Pregunta',
            'id_comando' => 'Id Comando',
            'num_columnas' => 'Num Columnas',
            'stylecss' => 'Stylecss',
            'numeracion' => 'Numeracion',
        ];
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
    public function getIdTcapitulo()
    {
        return $this->hasOne(FdTipoCapitulo::className(), ['id_tcapitulo' => 'id_tcapitulo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTviewCap()
    {
        return $this->hasOne(FdTipoViewCap::className(), ['id_tview_cap' => 'id_tview_cap']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdComando()
    {
        return $this->hasOne(TrComando::className(), ['id_comando' => 'id_comando']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdElementoCondicions()
    {
        return $this->hasMany(FdElementoCondicion::className(), ['id_capitulo_condicionado' => 'id_capitulo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntas()
    {
        return $this->hasMany(FdPregunta::className(), ['id_capitulo' => 'id_capitulo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestas()
    {
        return $this->hasMany(FdRespuesta::className(), ['id_capitulo' => 'id_capitulo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdSeccions()
    {
        return $this->hasMany(FdSeccion::className(), ['id_capitulo' => 'id_capitulo']);
    }
}
