<?php

namespace common\models\cargaquipux;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_cargue".
 *
 * @property integer $id_cargues
 * @property string $ruta
 * @property string $procesado
 * @property string $fecha_cargue
 * @property string $fecha_proceso
 * @property integer $id_archivo_cargue
 *
 * @property PsArchivoCargue $idArchivoCargue
 */
class PsCargue extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_cargue';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
           [['fecha_cargue'], 'date'],
           [['id_archivo_cargue'], 'required', 'message' => 'Por favor seleccione un tipo de archivo'],
           [['id_archivo_cargue'], 'integer'],
           [['ruta'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xls, xlsx', 'message'=>'Solo se permiten hojas de calculo con extensión xlx y xlxs'],
           [['procesado'], 'string'],
           [['id_archivo_cargue'], 'exist', 'skipOnError' => true, 'targetClass' => PsArchivoCargue::className(), 'targetAttribute' => ['id_archivo_cargue' => 'id_archivo_cargue']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_cargues' => 'ID',
            'ruta' => 'Archivo a Cargar',
            'procesado' => 'Procesado',
            'fecha_cargue' => 'Fecha de Cargue',
            'fecha_proceso' => 'Fecha  de Proceso',
            'id_archivo_cargue' => 'Tipo de Archivo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdArchivoCargue()
    {
        return $this->hasOne(PsArchivoCargue::className(), ['id_archivo_cargue' => 'id_archivo_cargue']);
    }
    
    
    public function upload()
    {
        if ($this->validate()) {
            $this->ruta->saveAs(Yii::$app->params['routeQuipux'] . $this->ruta->baseName . '.' . $this->ruta->extension);
            return true;
        } else {
            return false;
        }
    }
}
