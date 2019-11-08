<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_sub_cproceso".
 *
 * @property integer $id_cproceso_ini
 * @property integer $id_sub_cproceso
 *
 * @property PsCproceso $idCprocesoIni
 * @property PsCproceso $idSubCproceso
 */
class PsSubCproceso extends ModelPry
{
    
    public $numero;
    public $usuario;
    public $ult_fecha_actividad;
    public $nom_actividad;
    public $fecha_solicitud;
    public $id_usuario;
    
   
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_sub_cproceso';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_cproceso_ini', 'id_sub_cproceso'], 'integer','on'=>'normal'],
            [['numero','fecha_solicitud','id_usuario'], 'required', 'on' => 'solicitudtramite'],
            [['numero','fecha_solicitud'],'string', 'on' => 'solicitudtramite'],
            [['id_usuario'], 'integer', 'on' => 'solicitudtramite'],
            [['id_cproceso_ini'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso_ini' => 'id_cproceso'],'on'=>'normal'],
            [['id_sub_cproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_sub_cproceso' => 'id_cproceso'],'on'=>'normal'],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_cproceso_ini' => 'Id Cproceso Ini',
            'id_sub_cproceso' => 'Id Sub Cproceso',
        ];
    }
    
    public function scenarios() {
        
        $scenarios = parent::scenarios();
        
        //Scenario para analizar informacion================================================================================================
        $scenarios['solicitudtramite'] = ['numero','fecha_solicitud','id_usuario'];//Scenario Values Only Accepted
        $scenarios['normal'] = ['id_cproceso_ini', 'id_sub_cproceso'];
        
        return $scenarios;
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCprocesoIni()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_cproceso_ini']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdSubCproceso()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_sub_cproceso']);
    }
    
    
    public function getUltidusuario()
    {
        return $this->hasOne(\common\models\autenticacion\UsuariosAp::className(), ['id_usuario' => 'ult_id_usuario'])->viaTable('ps_cproceso', ['id_cproceso' => 'id_sub_cproceso']);
    }
    
    public function getUltidactividad()
    {
        return $this->hasOne(PsActividad::className(), ['id_actividad' => 'ult_id_actividad'])->viaTable('ps_cproceso', ['id_cproceso' => 'id_sub_cproceso']);
    }
    
    
}
