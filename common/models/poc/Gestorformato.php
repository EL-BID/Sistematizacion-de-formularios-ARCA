<?php

namespace common\models\poc;

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
class Gestorformato extends ModelPry
{
    public $Entidad;
    public $Formato;
    public $Estado;
    public $Digitador;
    public $id_conjunto_respuesta;
    public $id_conjunto_pregunta;
    public $id_formato;
    public $ult_id_version;
    public $id_adm_estado;
    public $provincia;
    public $cantones;
    public $parroquias;
    public $periodos;
    public $formato;
    public $estado;
    public $user_login;
        
   
/*===========================================================================================================================================*/
/*=================================FUNCIONES DE UN MODELO COMUN=====================================================================================*/
/*===========================================================================================================================================*/ 
  
   
    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
       return [ 
            [['Entidad','Formato','Estado'],'string'],
       ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    
    
    
    
    public function search()
    {
                
        $filtro="";
        $v_bindvalues=array();
        
        //Organizando Filtros========================================================================================
         if(!empty($this->cantones)){
           $filtro.=" WHERE (entidades.cod_canton=:cantones or entidades.cod_canton_p=:cantones) ";
           $v_bindvalues[':cantones']=$this->cantones;
        }
        $_comandosql=(!empty($filtro))? " AND ":" WHERE ";

        if(!empty($this->provincia)){
            $filtro.=$_comandosql." (entidades.cod_provincia=:provincia or entidades.cod_provincia_p=:provincia) ";
            $v_bindvalues[':provincia']=$this->provincia;
        }
        $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
        
         if(!empty($this->parroquias)){
           $filtro.=$_comandosql." entidades.cod_parroquia=:parroquias ";
            $v_bindvalues[':parroquias']=$this->parroquias;
       }
       
        $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
       
        if(!empty($this->formato)){
            $filtro.=$_comandosql." fd_conjunto_respuesta.id_formato=:formato ";
            $v_bindvalues[':formato']=$this->formato;
        }
       
       $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
       
        if(!empty($this->periodos)){
           $filtro.=$_comandosql." fd_conjunto_respuesta.id_periodo=:periodos ";
           $v_bindvalues[':periodos']=$this->periodos;
       }
       
        $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
        
       if(!empty($this->estado)){
           $filtro.=$_comandosql." fd_conjunto_respuesta.ult_id_adm_estado=:estado ";
           $v_bindvalues[':estado']=$this->estado;
       }
       
       
       //Se agrega codigo a la consulta de la grilla de gestor formatos, que valida si el usuario puede o no ver el formato
       $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
       
       $filtro.=$_comandosql.' usuarios_ap."usuario"= :usuario ';
       $v_bindvalues[':usuario']=$this->user_login;
       
       
        
        $formatos_Grilla = Yii::$app->db->createCommand('SELECT DISTINCT fd_conjunto_respuesta.id_conjunto_respuesta,'
                    . 'fd_conjunto_respuesta.id_conjunto_pregunta,'
                    . 'entidades.nombre_entidad as "Entidad",fd_formato.nom_formato as "Formato",fd_adm_estado.nom_adm_estado "Estado",fd_adm_estado.p_crear,fd_adm_estado.p_ejecutar, '
                    . 'fd_formato.id_formato,fd_formato.ult_id_version,fd_formato.id_tipo_view_formato,fd_adm_estado.id_adm_estado, '
                    . '\''.$this->cantones.'\' as cantones, '
                    . '\''.$this->provincia.'\' as provincia, '
                    . '\''.$this->formato.'\' as formato, '
                    . '\''.$this->parroquias.'\' as parroquias, '
                    . '\''.$this->periodos.'\' as periodos, '
                    . ' usuarios_ap.usuario_digitador as "Digitador" '
                    . ' FROM fd_conjunto_respuesta '
                    . ' LEFT JOIN entidades ON entidades.id_entidad=fd_conjunto_respuesta.id_entidad '
                    . ' LEFT JOIN fd_formato ON fd_formato.id_formato=fd_conjunto_respuesta.id_formato '
                    . ' LEFT JOIN fd_adm_estado ON fd_adm_estado.id_adm_estado=fd_conjunto_respuesta.ult_id_adm_estado '
                    . ' LEFT JOIN perfiles ON perfiles.cod_rol = fd_adm_estado.cod_rol '
                    . ' INNER JOIN regionentidades ON regionentidades.id_entidad=entidades.id_entidad'
                    . ' INNER JOIN region ON region.cod_region=regionentidades.cod_region'
                    . ' INNER JOIN perfil_region ON perfil_region.cod_region=region.cod_region '
                    . ' INNER JOIN usuarios_ap ON usuarios_ap.id_usuario=perfil_region.id_usuario '
                    . $filtro)
                    ->bindValues($v_bindvalues)
                    ->queryAll();
          
          return $formatos_Grilla;
     }

   
    
    
    
   
    
}
