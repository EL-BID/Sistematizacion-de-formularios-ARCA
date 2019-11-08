<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_historico_respuesta".
 *
 * @property integer $id_historico_respuesta
 * @property string $observaciones
 * @property string $fecha
 * @property string $usuario
 * @property integer $id_conjunto_respuesta
 * @property integer $id_adm_estado
 *
 * @property FdAdmEstado $idAdmEstado
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class FdHistoricoRespuesta extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_historico_respuesta';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_historico_respuesta'], 'required'],
            [['id_historico_respuesta', 'id_conjunto_respuesta', 'id_adm_estado'], 'integer'],
            [['fecha'], 'date'],
            [['observaciones'], 'string', 'max' => 1000],
            [['usuario'], 'string', 'max' => 50],
            [['id_adm_estado'], 'exist', 'skipOnError' => true, 'targetClass' => FdAdmEstado::className(), 'targetAttribute' => ['id_adm_estado' => 'id_adm_estado']],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_historico_respuesta' => 'Id Historico Respuesta',
            'observaciones' => 'Observaciones',
            'fecha' => 'Fecha',
            'usuario' => 'Usuario',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_adm_estado' => 'Id Adm Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdAdmEstado()
    {
        return $this->hasOne(FdAdmEstado::className(), ['id_adm_estado' => 'id_adm_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdConjuntoRespuesta()
    {
        return $this->hasOne(FdConjuntoRespuesta::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }
}
