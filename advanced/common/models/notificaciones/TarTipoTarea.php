<?php

namespace common\models\notificaciones;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "tar_tipo_tarea".
 *
 * @property integer $id_ttarea
 * @property string $nom_ttarea
 *
 * @property TarTareaProgramada[] $tarTareaProgramadas
 */
class TarTipoTarea extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tar_tipo_tarea';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_ttarea'], 'integer'],
            [['nom_ttarea'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_ttarea' => 'Id Tipo Tarea',
            'nom_ttarea' => 'Nombre Tipo Tarea',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getTarTareaProgramadas()
    {
        return $this->hasMany(TarTareaProgramada::className(), ['id_ttarea' => 'id_ttarea']);
    }
}
