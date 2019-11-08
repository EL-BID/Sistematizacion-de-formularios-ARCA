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
    public $id_cda_solicitud;
    
    public $idproceso;
    public $roles;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id_cproceso','integer'],
            [['numero','nom_actividad','nombres'], 'string'],
            [['ult_fecha_actividad', 'ult_fecha_estado','fecha_solicitud'], 'string'],
            [['_arrayidprocesos','nom_actividad','nombres','idproceso'],'safe'],
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
    
    
    /*
     * Funcion de Busqueda para el tramite
     * que se encuentra en cda/cdatramite/pantallprincipal
     */
    public function searchT($id_cda_tramite){
        
        $query = 'SELECT
                    cda_tramite.id_cda_tramite,
                    cda_solicitud.num_solicitud,
                    cda_tramite.cod_solicitud_tecnico,
                    cda_tramite.fecha_solicitud,
                    cda_tramite.id_usuario,
                    cda_tramite.num_tramite,
                    proc1.num_quipux as proceso_arca,
                    proc2.num_quipux as proceso_senagua,
                    ps_estado_proceso.nom_eproceso,
                    usuarios_ap.nombres as responsable,
                    procT.ult_fecha_actividad,
                    procT.ult_fecha_estado,
                    proc1.id_cproceso as id_cprocesoarca,
                    procT.id_cproceso as id_cproceso,
                    procT.ult_id_actividad,
                    cda_solicitud.id_cda_solicitud,
                    cda_tramite.devolver
            FROM
                    cda_tramite
                    LEFT JOIN cda_solicitud ON cda_solicitud.id_cda_solicitud = cda_tramite.id_cda_solicitud
                    INNER JOIN ps_cproceso AS proc1 ON proc1.id_cproceso = cda_solicitud.id_cproceso_arca
                    FULL OUTER JOIN ps_cproceso AS proc2 ON proc2.id_cproceso = cda_solicitud.id_cproceso_senagua
                    LEFT JOIN ps_estado_proceso ON ps_estado_proceso.id_eproceso = proc1.ult_id_eproceso
                    LEFT JOIN usuarios_ap ON usuarios_ap.id_usuario = cda_tramite.id_usuario
                    LEFT JOIN ps_cproceso AS procT ON procT.id_cproceso = cda_tramite.id_cproceso
                    WHERE id_cda_tramite = :id_cda_tramite';
        
        $cda_Grilla = $this->db->createCommand($query)->bindValue(':id_cda_tramite',$id_cda_tramite)->queryAll();
        
        return $cda_Grilla;
        
    }
    
    
    
    
    /*Funcion de busqueda para la grilla
     * que se encuentra en modulo_cda/index*/
    
    public function search($params){
       
       //Yii::trace("que llega de solicitud ".$this->id_cda_solicitud,"DEBUG");
        $query = 'SELECT
                    cda_solicitud.id_cda_solicitud,
                    cda_solicitud.id_cproceso_arca AS id_cproceso,
                    cda_solicitud.id_cproceso_senagua,
                    cda_solicitud.fecha_solicitud,
                    cda_solicitud.fecha_ingreso,
                    cda_solicitud.enviado_por,
                    proc1.numero,
                    ps_actividad.nom_actividad,
                    ps_estado_proceso.nom_eproceso,
                    usuarios_ap.nombres,
                    proc1.ult_fecha_actividad,
                    proc1.ult_fecha_estado,
                    proc1.ult_id_actividad,
                    ps_proceso.nom_proceso,
                    proc1.id_proceso,proc1.num_quipux as qpxarca,
                    proc2.num_quipux as qpxsenagua,cda_rol.nom_cda_rol,cda_solicitud.tramite_administrativo,
                    cda_solicitud.numero_tramites,rol_en_calidad
                    FROM
                    cda_solicitud
                    INNER JOIN ps_cproceso AS proc1 ON proc1.id_cproceso = cda_solicitud.id_cproceso_arca
                    LEFT JOIN ps_actividad ON ps_actividad.id_actividad = proc1.ult_id_actividad
                    LEFT JOIN ps_estado_proceso ON ps_estado_proceso.id_eproceso = proc1.ult_id_eproceso
                    FULL OUTER JOIN ps_cproceso AS proc2 ON proc2.id_cproceso = cda_solicitud.id_cproceso_senagua
                    LEFT JOIN usuarios_ap ON usuarios_ap.id_usuario = proc1.ult_id_usuario
                    LEFT JOIN ps_proceso ON ps_proceso.id_proceso = proc1.id_proceso
                    LEFT JOIN cda_rol ON cda_solicitud.id_cda_rol = cda_rol.id_cda_rol
                    where id_cda_solicitud is not NULL';
       
        $this->load($params);

        if (!($this->load($params) && $this->validate())) {
            
            $filtro='';
            
            if(!empty($this->nombres)){
                  $filtro .= " AND usuarios_ap.id_usuario = '".$this->nombres."'  ";    
            }
            
            if(!empty($this->id_cda_solicitud)){
                $filtro.= " AND id_cda_solicitud = '".$this->id_cda_solicitud."'";
            }
            
            if(!empty($this->roles)){
                $filtro.= " AND ps_actividad.rol_a_asignar = '".$this->roles."'";
            }
            
            $filtro.=" ORDER BY id_cda_solicitud DESC  ";
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
                  $filtro .= " AND cda_solicitud.fecha_solicitud = '".$this->fecha_solicitud."' ";
            }
            
            if(!empty($this->idproceso)){
               $filtro.= " AND ps_proceso.id_proceso = '".$this->idproceso."'";
            }
            
            if(!empty($this->id_cda_solicitud)){
                $filtro.= " AND cda_solitud.id_cda_solicitud = '".$this->id_cda_solicitud."'";
            }
            
             if(!empty($this->roles)){
                $filtro.= " AND ps_actividad.rol_a_asignar = '".$this->roles."'";
            }
            
            $filtro.= " ORDER BY id_cda_solicitud DESC ";
            $query =  $query.$filtro;
            
            $cda_Grilla = $this->db->createCommand($query)->queryAll();

        }
    
        
        return $cda_Grilla;
        
    }
   
    
    
}
