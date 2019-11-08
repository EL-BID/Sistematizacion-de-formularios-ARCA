<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_opc_tipo_select".
 *
 * @property integer $id_tselect
 * @property integer $id_opc_tselect
 * @property string $nom_opc_tselect
 * @property string $es_otra
 *
 * @property PsCactividadProceso[] $psCactividadProcesos
 * @property PsTipoSelect $idTselect
 */
class PsOpcTipoSelect extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_opc_tipo_select';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tselect', 'id_opc_tselect'], 'required'],
            [['id_tselect', 'id_opc_tselect'], 'integer'],
            [['nom_opc_tselect'], 'string', 'max' => 100],
            [['es_otra'], 'string', 'max' => 1],
            [['id_tselect'], 'exist', 'skipOnError' => true, 'targetClass' => PsTipoSelect::className(), 'targetAttribute' => ['id_tselect' => 'id_tselect']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tselect' => 'Id Tselect',
            'id_opc_tselect' => 'Id Opc Tselect',
            'nom_opc_tselect' => 'Nom Opc Tselect',
            'es_otra' => 'Es Otra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsCactividadProcesos()
    {
        return $this->hasMany(PsCactividadProceso::className(), ['id_opc_tselect' => 'id_opc_tselect']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTselect()
    {
        return $this->hasOne(PsTipoSelect::className(), ['id_tselect' => 'id_tselect']);
    }
}
