<?php

namespace common\models\cargaquipux;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_archivo_cargue".
 *
 * @property integer $id_archivo_cargue
 * @property string $nom_archivo_cargue
 * @property string $nom_tabla_cargue
 * @property integer $fila_inicio
 * @property string $estado
 * @property integer $id_tarea_programada
 *
 * @property TarTareaProgramada $idTareaProgramada
 * @property PsCargue[] $psCargues
 * @property PsDetArcCargue[] $psDetArcCargues
 */
class PsArchivoCargue extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_archivo_cargue';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_archivo_cargue', 'id_tarea_programada'], 'required'],
            [['id_archivo_cargue', 'fila_inicio', 'id_tarea_programada'], 'integer'],
            [['nom_archivo_cargue'], 'string', 'max' => 500],
            [['nom_tabla_cargue'], 'string', 'max' => 30],
            [['estado'], 'string', 'max' => 1],
            [['id_tarea_programada'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\notificaciones\TarTareaProgramada::className(), 'targetAttribute' => ['id_tarea_programada' => 'id_tarea_programada']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_archivo_cargue' => 'Id Archivo Cargue',
            'nom_archivo_cargue' => 'Nom Archivo Cargue',
            'nom_tabla_cargue' => 'Nom Tabla Cargue',
            'fila_inicio' => 'Fila Inicio',
            'estado' => 'Estado',
            'id_tarea_programada' => 'Id Tarea Programada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTareaProgramada()
    {
        return $this->hasOne(TarTareaProgramada::className(), ['id_tarea_programada' => 'id_tarea_programada']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsCargues()
    {
        return $this->hasMany(PsCargue::className(), ['id_archivo_cargue' => 'id_archivo_cargue']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsDetArcCargues()
    {
        return $this->hasMany(PsDetArcCargue::className(), ['id_archivo_cargue' => 'id_archivo_cargue']);
    }
}
