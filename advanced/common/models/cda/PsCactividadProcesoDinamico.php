<?php

namespace common\models\cda;

//use yii\base\Model;
//use Yii;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * 
 *
    @property integer $id_cactividad_proceso
 * @property string $observacion
 * @property string $fecha_realizacion
 * @property string $fecha_prevista
 * @property string $numero_quipux
 * @property integer $id_cproceso
 * @property integer $id_usuario
 * @property integer $id_actividad
 * @property string $fecha_creacion
 * @property string $diligenciado
 *  @property integer $dias_pausa 
* @property integer $id_opc_tselect 
* @property string $otro_cuales 
* @property integer $id_clasif_actividad 
 *
 * @property PsActividad $idActividad
 * @property PsCproceso $idCproceso
 * @property UsuariosAp $idUsuario
 *
 * @property Cometarios[] $cometarios
 */
class PsCactividadProcesoDinamico extends ModelPry
{
    public $id_cactividad_proceso;
    public $observacion;
    public $fecha_realizacion;
    public $fecha_prevista;
    public $numero_quipux;
    public $id_cproceso;
    public $id_usuario;
    public $id_actividad;
    public $fecha_creacion;
    public $diligenciado;
    public $dias_pausa;
    public $id_opc_tselect;
    public $otro_cuales;
    public $id_clasif_actividad;
    public $isNewRecord;
        
   
    

/*===========================================================================================================================================*/
/*=================================Construyendo las variables asociadas a public=============================================================*/
/*===========================================================================================================================================*/    
    private $data;
    
    public function __get($varName){

      if (!array_key_exists($varName,$this->data)){
          //this attribute is not defined!
          Yii::warning("Variable no definida.".$varName);
      }
      else return $this->data[$varName];

   }

   public function __set($varName,$value){
      $this->data[$varName] = $value;
   }
   
   
/*===========================================================================================================================================*/
/*=================================Construyendo el modelo=====================================================================================*/
/*===========================================================================================================================================*/ 
    
   function __construct($_labels,$_required) {
        $_vrules[]=[$_required,'required','message' => 'Campo requerido'];
        
        
        $this->v_rules = $_vrules;
        $this->v_label = $_labels;
       
   }
   
   
/*===========================================================================================================================================*/
/*=================================FUNCIONES DE UN MODELO COMUN=====================================================================================*/
/*===========================================================================================================================================*/ 

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_cactividad_proceso';
    }
  
   
    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return $this->v_rules;
    }
    
    

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return $this->v_label;
    }
    
    
     /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdActividad()
    {
        return $this->hasOne(PsActividad::className(), ['id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCproceso()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsuario()
    {
        return $this->hasOne(\common\models\autenticacion\UsuariosAp::className(), ['id_usuario' => 'id_usuario']);
    }
    
   
    
}
