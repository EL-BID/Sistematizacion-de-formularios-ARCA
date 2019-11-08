<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_conjunto_pregunta".
 *
 * @property integer $id_conjunto_pregunta
 * @property integer $id_formato
 * @property integer $id_version
 * @property integer $id_tipo_view_formato
 * @property string $cod_rol
 *
 * @property FdCapitulo[] $fdCapitulos
 * @property FdFormato $idFormato
 * @property FdTipoViewFormato $idTipoViewFormato
 * @property FdVersion $idVersion
 * @property Rol $codRol
 * @property FdConjuntoRespuesta[] $fdConjuntoRespuestas
 * @property FdPregunta[] $fdPreguntas
 * @property FdRespuesta[] $fdRespuestas
 */
class FdConjuntoPregunta extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_conjunto_pregunta';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_conjunto_pregunta'], 'required'],
            [['id_conjunto_pregunta', 'id_formato', 'id_version', 'id_tipo_view_formato'], 'integer'],
            [['cod_rol'], 'string', 'max' => 10],
            [['id_formato'], 'exist', 'skipOnError' => true, 'targetClass' => FdFormato::className(), 'targetAttribute' => ['id_formato' => 'id_formato']],
            [['id_tipo_view_formato'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoViewFormato::className(), 'targetAttribute' => ['id_tipo_view_formato' => 'id_tipo_view_formato']],
            [['id_version'], 'exist', 'skipOnError' => true, 'targetClass' => FdVersion::className(), 'targetAttribute' => ['id_version' => 'id_version']],
            [['cod_rol'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Rol::className(), 'targetAttribute' => ['cod_rol' => 'cod_rol']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_conjunto_pregunta' => 'Id Conjunto Pregunta',
            'id_formato' => 'Id Formato',
            'id_version' => 'Id Version',
            'id_tipo_view_formato' => 'Id Tipo View Formato',
            'cod_rol' => 'Cod Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCapitulos()
    {
        return $this->hasMany(FdCapitulo::className(), ['id_conjunto_pregunta' => 'id_conjunto_pregunta']);
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
    public function getIdTipoViewFormato()
    {
        return $this->hasOne(FdTipoViewFormato::className(), ['id_tipo_view_formato' => 'id_tipo_view_formato']);
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
    public function getCodRol()
    {
        return $this->hasOne(Rol::className(), ['cod_rol' => 'cod_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdConjuntoRespuestas()
    {
        return $this->hasMany(FdConjuntoRespuesta::className(), ['id_conjunto_pregunta' => 'id_conjunto_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdPreguntas()
    {
        return $this->hasMany(FdPregunta::className(), ['id_conjunto_pregunta' => 'id_conjunto_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestas()
    {
        return $this->hasMany(FdRespuesta::className(), ['id_conjunto_pregunta' => 'id_conjunto_pregunta']);
    }
}
