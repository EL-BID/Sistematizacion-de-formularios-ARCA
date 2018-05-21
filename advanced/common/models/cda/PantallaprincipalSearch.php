<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use common\models\cda\Pantallprincipal;

/**
 * CdaSearch represents the model behind the search form about `common\models\hidricos\Cda`.
 */
class PantallaprincipalSearch extends Cda
{
    
    public $numero;
    public $nom_actividad;
    public $nombres;
    public $ult_fecha_actividad;
    public $ult_fecha_estado;
    public $id_cproceso;
    public $fecha_solicitud;
    public $_arrayidprocesos;
    public $id_cda;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id_cproceso','integer'],
            [['numero','nom_actividad','nombres'], 'string'],
            [['ult_fecha_actividad', 'ult_fecha_estado','fecha_solicitud'], 'string'],
            [['_arrayidprocesos','nom_actividad','nombres'],'safe'],
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

    
     public function attributeLabels()
    {
        return [
            'id_cproceso' => 'id_cproceso',
            'numero' => 'Número',
            'nom_actividad' => 'Actividad',
            'nom_eproceso' => 'Estado',
            'nombres' => 'Nombres',
            'ult_fecha_estado' => 'Fecha Estado',
            'ult_fecha_actividad' => 'Fecha Actividad',
        ];
    }
    
    
    
    /*Funcion de busqueda para la grilla
     * que se encuentra en modulo_cda/index*/
    
    public function search($params){
       
       
        $query = 'SELECT cda.id_cda,cda.id_cproceso_arca as id_cproceso, cda.id_cproceso_senagua,
                    proc1.fecha_solicitud,
                    proc1.numero,
                    ps_actividad.nom_actividad,
                    ps_estado_proceso.nom_eproceso,
                    usuarios_ap.nombres,
                    proc1.ult_fecha_actividad,proc1.ult_fecha_estado,proc1.ult_id_actividad 
                    FROM cda
                    INNER JOIN ps_cproceso as proc1 ON proc1.id_cproceso=cda.id_cproceso_arca
                    LEFT JOIN ps_actividad ON ps_actividad.id_actividad=proc1.ult_id_actividad
                    LEFT JOIN ps_estado_proceso ON ps_estado_proceso.id_eproceso=proc1.ult_id_eproceso
                    FULL OUTER JOIN ps_cproceso as proc2 ON proc2.id_cproceso=cda.id_cproceso_senagua
                    LEFT JOIN usuarios_ap ON usuarios_ap.id_usuario=proc1.ult_id_usuario
                    WHERE id_cda IS NOT NULL';
       
        $this->load($params);

        if (!($this->load($params) && $this->validate())) {
            
            $filtro='';
            
            if(!empty($this->nombres)){
                  $filtro .= " AND usuarios_ap.id_usuario = '".$this->nombres."'";    
            }
            
            $query = $query.$filtro;
            $cda_Grilla = $this->db->createCommand($query)->queryAll();
            
        }else{
            
           
            $filtro='';
            
            if(!empty($this->numero) and empty($filtro)){
                  $filtro .= " AND proc1.numero = '".$this->numero."'";
            }
            
            if(!empty($this->nom_actividad) and empty($filtro)){
                  $filtro .= " AND ps_actividad.id_actividad = '".$this->nom_actividad."'";
            }
            
            if(is_array($this->_arrayidprocesos) and !empty($this->_arrayidprocesos[0])){
                
                 $_estados=implode(",",$this->_arrayidprocesos);
                 $filtro .= " AND ps_estado_proceso.id_eproceso in (".$_estados.")";
            }
            
            if(!empty($this->nombres) and empty($filtro)){
                  $filtro .= " AND usuarios_ap.id_usuario = '".$this->nombres."'";
            }
            
            
            if(!empty($this->ult_fecha_actividad) and empty($filtro)){
                  $filtro .= " AND proc1.ult_fecha_actividad = '".$this->ult_fecha_actividad."' ";
            }
            
            if(!empty($this->ult_fecha_estado) and empty($filtro)){
                  $filtro .= " AND proc1.ult_fecha_estado = '".$this->ult_fecha_estado."' ";
            }
            
            if(!empty($this->fecha_solicitud) and empty($filtro)){
                  $filtro .= " AND proc1.fecha_solicitud = '".$this->fecha_solicitud."' ";
            }
            
            $query =  $query.$filtro;
            
            $cda_Grilla = $this->db->createCommand($query)->queryAll();

        }
    
        
        return $cda_Grilla;
        
    }
    
    
     public function searchdetalleproceso(){
        
       
        $query = 'SELECT cda.id_cda,cda.id_cproceso_arca as id_cproceso, cda.id_cproceso_senagua,
                proc1.numero,
                ps_actividad.nom_actividad,
                ps_estado_proceso.nom_eproceso,
                us1.nombres as usuario_accion,
                proc1.ult_fecha_actividad,
                proc1.ult_fecha_estado,
                proc1.num_quipux as arca,
                proc2.num_quipux as senagua,
                us2.nombres as enviadopor,
                rol.nombre_rol as encalidade,
                cda.fecha_ingreso,
                proc1.fecha_solicitud,
                cda.numero_tramites, ps_proceso.url_datos_basicos,proc1.ult_id_actividad,proc1.ult_id_usuario,cda.tramite_administrativo
                FROM cda
                INNER JOIN ps_cproceso as proc1 ON proc1.id_cproceso=cda.id_cproceso_arca
                INNER JOIN ps_proceso ON ps_proceso.id_proceso = proc1.id_proceso
                LEFT JOIN ps_actividad ON ps_actividad.id_actividad=proc1.ult_id_actividad
                LEFT JOIN ps_estado_proceso ON ps_estado_proceso.id_eproceso=proc1.ult_id_eproceso
                FULL OUTER JOIN ps_cproceso as proc2 ON proc2.id_cproceso=cda.id_cproceso_senagua
                LEFT JOIN usuarios_ap as us1 ON us1.id_usuario=proc1.ult_id_usuario
                LEFT JOIN usuarios_ap as us2 ON us2.id_usuario = cda.id_usuario_enviado_por
                LEFT JOIN rol ON rol.cod_rol = cda.rol_en_calidad';
                           
       
     
        if ($this->validate()) {
            
         
            $filtro='';
            
            if(!empty($this->id_cda) and empty($filtro)){
                  $filtro .= " WHERE cda.id_cda = '".$this->id_cda."'";
            }
            
                       
            $query =  $query.$filtro; 
            
            $cda_Grilla = $this->db->createCommand($query)->queryAll();
            
            
            
        }else{
            
           
           throw new \yii\web\HttpException(404, 'Error ingrese valores de busqueda');  

        }
    
        
        return $cda_Grilla;
       
        
        
        
    }
    
    
}
