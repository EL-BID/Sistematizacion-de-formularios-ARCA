<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_analisis_hidrologico".
 *
 * @property integer $id_analisis_hidrologico
 * @property integer $id_cartografia
 * @property string $id_ehidrografica
 * @property string $id_emeteorologica
 * @property integer $id_metodologia
 * @property integer $id_cda
 * @property string $informe_utilizado
 * @property string $probabilidad
 * @property string $observacion
 *
 * @property Cda $idCda
 * @property CdaCartografia $idCartografia
 * @property CdaEstacionHidrologica $idEhidrografica
 * @property CdaEstacionMeteorologica $idEmeteorologica
 * @property CdaMetodologia $idMetodologia
 */
class CdaAnalisisHidrologico extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_analisis_hidrologico';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_analisis_hidrologico'], 'required'],
            [['id_analisis_hidrologico', 'id_cartografia', 'id_metodologia', 'id_cda'], 'integer'],
            [['id_ehidrografica'], 'string', 'max' => 50],
            [['id_emeteorologica'], 'string', 'max' => 10],
            [['informe_utilizado', 'probabilidad', 'observacion'], 'string', 'max' => 500],
            [['id_cda'], 'exist', 'skipOnError' => true, 'targetClass' => Cda::className(), 'targetAttribute' => ['id_cda' => 'id_cda']],
            [['id_cartografia'], 'exist', 'skipOnError' => true, 'targetClass' => CdaCartografia::className(), 'targetAttribute' => ['id_cartografia' => 'id_cartografia']],
            [['id_ehidrografica'], 'exist', 'skipOnError' => true, 'targetClass' => CdaEstacionHidrologica::className(), 'targetAttribute' => ['id_ehidrografica' => 'id_ehidrografica']],
            [['id_emeteorologica'], 'exist', 'skipOnError' => true, 'targetClass' => CdaEstacionMeteorologica::className(), 'targetAttribute' => ['id_emeteorologica' => 'id_emeteorologica']],
            [['id_metodologia'], 'exist', 'skipOnError' => true, 'targetClass' => CdaMetodologia::className(), 'targetAttribute' => ['id_metodologia' => 'id_metodologia']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_analisis_hidrologico' => 'Id Analisis Hidrologico',
            'id_cartografia' => 'Id Cartografia',
            'id_ehidrografica' => 'Id Ehidrografica',
            'id_emeteorologica' => 'Id Emeteorologica',
            'id_metodologia' => 'Id Metodologia',
            'id_cda' => 'Id Cda',
            'informe_utilizado' => 'Informe Utilizado',
            'probabilidad' => 'Probabilidad',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCda()
    {
        return $this->hasOne(Cda::className(), ['id_cda' => 'id_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCartografia()
    {
        return $this->hasOne(CdaCartografia::className(), ['id_cartografia' => 'id_cartografia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdEhidrografica()
    {
        return $this->hasOne(CdaEstacionHidrologica::className(), ['id_ehidrografica' => 'id_ehidrografica']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdEmeteorologica()
    {
        return $this->hasOne(CdaEstacionMeteorologica::className(), ['id_emeteorologica' => 'id_emeteorologica']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdMetodologia()
    {
        return $this->hasOne(CdaMetodologia::className(), ['id_metodologia' => 'id_metodologia']);
    }
}
