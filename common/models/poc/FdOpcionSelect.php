<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_opcion_select".
 *
 * @property integer $id_opcion_select
 * @property string $nom_opcion_select
 * @property integer $orden
 * @property integer $id_tselect
 * @property string $estado
 *
 * @property FdTipoSelect $idTselect
 * @property FdRespuesta[] $fdRespuestas
 * @property FdRespuestaXMes[] $fdRespuestaXMes
 */
class FdOpcionSelect extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_opcion_select';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_opcion_select', 'nom_opcion_select'], 'required'],
            [['id_opcion_select', 'orden', 'id_tselect'], 'integer'],
            [['nom_opcion_select'], 'string', 'max' => 200],
            [['estado'], 'string', 'max' => 1],
            [['id_tselect'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoSelect::className(), 'targetAttribute' => ['id_tselect' => 'id_tselect']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_opcion_select' => 'Id Opcion Select',
            'nom_opcion_select' => 'Nom Opcion Select',
            'orden' => 'Orden',
            'id_tselect' => 'Id Tselect',
            'estado' => 'Estado',
        ];
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
    public function getFdRespuestas()
    {
        return $this->hasMany(FdRespuesta::className(), ['id_opcion_select' => 'id_opcion_select']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdRespuestaXMes()
    {
        return $this->hasMany(FdRespuestaXMes::className(), ['id_opcion_select' => 'id_opcion_select']);
    }
}
