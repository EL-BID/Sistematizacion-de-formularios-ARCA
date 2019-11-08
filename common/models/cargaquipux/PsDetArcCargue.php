<?php

namespace common\models\cargaquipux;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_det_arc_cargue".
 *
 * @property integer $id_archivo_cargue
 * @property integer $id_det_arc_cargue
 * @property string $num_nom_hoja
 * @property integer $num_columna_excel
 * @property string $nom_columna_cargue
 * @property string $nom_columna_excel
 *
 * @property PsArchivoCargue $idArchivoCargue
 */
class PsDetArcCargue extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_det_arc_cargue';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_archivo_cargue', 'id_det_arc_cargue'], 'required'],
            [['id_archivo_cargue', 'id_det_arc_cargue', 'num_columna_excel'], 'integer'],
            [['num_nom_hoja', 'nom_columna_cargue'], 'string', 'max' => 30],
            [['nom_columna_excel'], 'string', 'max' => 300],
            [['id_archivo_cargue'], 'exist', 'skipOnError' => true, 'targetClass' => PsArchivoCargue::className(), 'targetAttribute' => ['id_archivo_cargue' => 'id_archivo_cargue']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_archivo_cargue' => 'Id Archivo Cargue',
            'id_det_arc_cargue' => 'Id Det Arc Cargue',
            'num_nom_hoja' => 'Num Nom Hoja',
            'num_columna_excel' => 'Num Columna Excel',
            'nom_columna_cargue' => 'Nom Columna Cargue',
            'nom_columna_excel' => 'Nom Columna Excel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdArchivoCargue()
    {
        return $this->hasOne(PsArchivoCargue::className(), ['id_archivo_cargue' => 'id_archivo_cargue']);
    }
    
}
