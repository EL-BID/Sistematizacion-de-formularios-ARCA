<?php

namespace common\models\notificaciones;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cor_tipo_parametro".
 *
 * @property integer $id_tparametro
 * @property string $nom_tparametro
 *
 * @property CorParametro[] $corParametros
 */
class CorTipoParametro extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cor_tipo_parametro';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nom_tparametro'], 'required', 'message' => 'Valor Requerido'],
            [['id_tparametro'], 'integer'],
            [['nom_tparametro'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tparametro' => 'Id Tipo Parametro',
            'nom_tparametro' => 'Nombre Tipo Parametro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCorParametros()
    {
        return $this->hasMany(CorParametro::className(), ['id_tparametro' => 'id_tparametro']);
    }
}
