<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_tipo_proceso".
 *
 * @property integer $id_tproceso
 * @property string $nom_tproceso
 *
 * @property PsProceso[] $psProcesos
 */
class PsTipoProceso extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_tipo_proceso';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tproceso', 'nom_tproceso'], 'required'],
            [['id_tproceso'], 'integer'],
            [['nom_tproceso'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_tproceso' => 'Id Tproceso',
            'nom_tproceso' => 'Nom Tproceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsProcesos()
    {
        return $this->hasMany(PsProceso::className(), ['id_tproceso' => 'id_tproceso']);
    }
}
