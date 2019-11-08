<?php

namespace common\models\notificaciones;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cor_parametro".
 *
 * @property integer $id_parametro
 * @property string $nom_parametro
 * @property string $val_defecto
 * @property string $consulta_sql
 * @property integer $id_correo
 * @property integer $id_tparametro
 *
 * @property CorCorreo $idCorreo
 * @property CorTipoParametro $idTparametro
 */
class CorParametro extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cor_parametro';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nom_parametro', 'id_correo', 'id_tparametro'], 'required', 'message' => 'Valor Obligatorio'],
            [['id_parametro', 'id_correo', 'id_tparametro'], 'integer'],
            [['consulta_sql'], 'string'],
            [['nom_parametro', 'val_defecto'], 'string', 'max' => 50],
            [['id_correo'], 'exist', 'skipOnError' => true, 'targetClass' => CorCorreo::className(), 'targetAttribute' => ['id_correo' => 'id_correo']],
            [['id_tparametro'], 'exist', 'skipOnError' => true, 'targetClass' => CorTipoParametro::className(), 'targetAttribute' => ['id_tparametro' => 'id_tparametro']],
            [['val_defecto','consulta_sql'], 'valData'],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_parametro' => 'Id Parametro',
            'nom_parametro' => 'Nombre Parametro',
            'val_defecto' => 'Valor Por Defecto',
            'consulta_sql' => 'Consulta Sql',
            'id_correo' => 'Correo',
            'id_tparametro' => 'Tipo Parametro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCorreo()
    {
        return $this->hasOne(CorCorreo::className(), ['id_correo' => 'id_correo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTparametro()
    {
        return $this->hasOne(CorTipoParametro::className(), ['id_tparametro' => 'id_tparametro']);
    }
    
    public function valData($attribute,$params){
        if (empty($this->val_defecto) && empty($this->consulta_sql)) {
            $this->addError( $attribute, 'Se debe llenar el valor por defecto o la cosnulta sql' );
            return false;
        }

            return true;
    }
}
