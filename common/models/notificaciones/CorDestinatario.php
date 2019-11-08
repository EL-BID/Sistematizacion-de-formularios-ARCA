<?php

namespace common\models\notificaciones;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cor_destinatario".
 *
 * @property integer $id_destinatario
 * @property string $val_defecto
 * @property string $consulta_sql
 * @property integer $id_correo
 * @property integer $id_tdestinatario
 *
 * @property CorCorreo $idCorreo
 * @property CorTipoDestinatario $idTdestinatario
 */
class CorDestinatario extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cor_destinatario';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_correo', 'id_tdestinatario'], 'required', 'message' => 'Valor Obligatorio'],
            [['id_destinatario', 'id_correo', 'id_tdestinatario'], 'integer'],
            [['consulta_sql'], 'string'],
            [['val_defecto'], 'string', 'max' => 50],
            [['id_correo'], 'exist', 'skipOnError' => true, 'targetClass' => CorCorreo::className(), 'targetAttribute' => ['id_correo' => 'id_correo']],
            [['id_tdestinatario'], 'exist', 'skipOnError' => true, 'targetClass' => CorTipoDestinatario::className(), 'targetAttribute' => ['id_tdestinatario' => 'id_tdestinatario']],
            [['val_defecto','consulta_sql'], 'valData',],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_destinatario' => 'Id Destinatario',
            'val_defecto' => 'Valor Por Defecto',
            'consulta_sql' => 'Consulta Sql',
            'id_correo' => 'Correo',
            'id_tdestinatario' => 'Tipo Destinatario',
        ];
    }
    
    public function valData($attribute,$params){
        if (empty($this->val_defecto) && empty($this->consulta_sql)) {
            $this->addError( $attribute, 'Se debe llenar el valor por defecto o la cosnulta sql' );
            return false;
        }

            return true;
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
    public function getIdTdestinatario()
    {
        return $this->hasOne(CorTipoDestinatario::className(), ['id_tdestinatario' => 'id_tdestinatario']);
    }
}
