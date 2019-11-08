<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_conjunto_respuesta".
 *
 * @property integer $id_conjunto_respuesta
 * @property integer $id_conjunto_pregunta
 * @property string $id_entidad
 * @property integer $id_formato
 * @property integer $ult_id_adm_estado
 * @property integer $id_periodo
 *
 * @property Entidades $idEntidad
 * @property FdAdmEstado $ultIdAdmEstado
 * @property FdConjuntoPregunta $idConjuntoPregunta
 * @property FdFormato $idFormato
 * @property TrPeriodo $idPeriodo
 * @property FdCoordenada[] $fdCoordenadas
 * @property FdDatosGenerales[] $fdDatosGenerales
 * @property FdHistoricoRespuesta[] $fdHistoricoRespuestas
 * @property FdInvolucrado[] $fdInvolucrados
 * @property FdRespuesta[] $fdRespuestas
 * @property FdUbicacion[] $fdUbicacions
 */
class FdConjuntoRespuesta extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_conjunto_respuesta';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_conjunto_pregunta', 'id_formato', 'ult_id_adm_estado', 'id_periodo'], 'integer'],
            [['id_entidad','fecha_creacion'], 'string', 'max' => 10],
            [['id_entidad'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Entidades::className(), 'targetAttribute' => ['id_entidad' => 'id_entidad']],
            [['ult_id_adm_estado'], 'exist', 'skipOnError' => true, 'targetClass' => FdAdmEstado::className(), 'targetAttribute' => ['ult_id_adm_estado' => 'id_adm_estado']],
            [['id_conjunto_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoPregunta::className(), 'targetAttribute' => ['id_conjunto_pregunta' => 'id_conjunto_pregunta']],
            [['id_formato'], 'exist', 'skipOnError' => true, 'targetClass' => FdFormato::className(), 'targetAttribute' => ['id_formato' => 'id_formato']],
            [['id_periodo'], 'exist', 'skipOnError' => true, 'targetClass' => TrPeriodo::className(), 'targetAttribute' => ['id_periodo' => 'id_periodo']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_conjunto_pregunta' => 'Id Conjunto Pregunta',
            'id_entidad' => 'Id Entidad',
            'id_formato' => 'Id Formato',
            'ult_id_adm_estado' => 'Ult Id Adm Estado',
            'id_periodo' => 'Id Periodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdEntidad()
    {
        return $this->hasOne(Entidades::className(), ['id_entidad' => 'id_entidad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getUltIdAdmEstado()
    {
        return $this->hasOne(FdAdmEstado::className(), ['id_adm_estado' => 'ult_id_adm_estado']);
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
    public function getIdFormato()
    {
        return $this->hasOne(FdFormato::className(), ['id_formato' => 'id_formato']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPeriodo()
    {
        return $this->hasOne(TrPeriodo::className(), ['id_periodo' => 'id_periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCoordenadas()
    {
        return $this->hasMany(FdCoordenada::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdDatosGenerales()
    {
        return $this->hasMany(FdDatosGenerales::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdHistoricoRespuestas()
    {
        return $this->hasMany(FdHistoricoRespuesta::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdInvolucrados()
    {
        return $this->hasMany(FdInvolucrado::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestas()
    {
        return $this->hasMany(FdRespuesta::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdUbicacions()
    {
        return $this->hasMany(FdUbicacion::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }
}
