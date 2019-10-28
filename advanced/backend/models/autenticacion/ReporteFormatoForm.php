<?php
namespace backend\models\autenticacion;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
/**
 * Signup form
 */
class ReporteFormatoForm extends Model
{
    public $id_formato;
    public $provincia;
    public $POC;
    public $list_entidades;

/**
 *  <?= $form->field($model, 'id_correo')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\CorCorreo::find()->all(),'id_correo','nom_correo'),['prompt'=>'Indique la configuracion del correo']) ?>
 */
 
    /**
     * @inheritdoc
     */
  
    /**
     * @inheritdoc Reglas de Validaci�n
     */
    public function rules()
    {
       /* return [
            [['tipo_usuario', 'identificacion','nombres', 'email','id_tipo_entidad','cod_rol'], 'required','message'=>'Campo Obligatorio'],
            [['identificacion'], 'number', 'message'=>'Campo de solo numeros, escriba el documento sin . ó ,'],
            [['tipo_usuario'], 'string', 'max' => 1,'message'=>'Maximo 200 caracteres'],
            [['nombres', 'email'], 'string', 'max' => 200,'message'=>'Maximo 200 caracteres'],
            [['email'], 'email','message'=>'Correo mal formado'],
            [['email'], 'email_existe'],
            [['identificacion'], 'identificacion_existe'],
            [['cod_canton','cod_provincia','cod_parroquia'], 'string'],
            // [['id_correo'], 'number'],
            [['id_formato'], 'number'],
			[['POC'],'safe'],
        ];*/
        return [
            [['id_formato','provincia'], 'number'],
            [['POC'],'safe'],
        ];
    }
    
    
    
    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
       /* return [
            'tipo_usuario' => 'Tipo Usuario',
            'identificacion' => 'Identificacion',
            'email' => 'Email',
            'id_tipo_entidad' => 'Tipo Entidad',
            'cod_provincia' => 'Provincia',
            'cod_canton' => 'Canton',
            'cod_parroquia' => 'Parroquia',
//            'id_correo' => 'Configuracion Correo',
            'cod_rol' => 'Rol',
            'id_formato' => 'Formato',
            
        ];*/
        return [
            'id_formato'=>'Formato',
            'provincia'=>'Provincia',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function entidades_formato($formato,$provincia)
    {
         $model = new ReporteFormatoForm();
         $entidades= $model->obtenerEntidades($formato,$provincia);         
         return $entidades;         
    }
    public function obtenerEntidades($formato,$provincia=null)
    {
        $model = new ReporteFormatoForm();
        $msg="";
        if($formato==6)
        {                       
            $entidades = Yii::$app->db->createCommand('SELECT id_entidad,nombre_entidad FROM ENTIDADES WHERE cod_provincia_p=:provincia and  id_entidad in'
            .'(SELECT id_entidad FROM fd_conjunto_respuesta  WHERE id_conjunto_pregunta =:formato)')
                ->bindValue(':formato', $formato)
                ->bindValue(':provincia', $provincia)
                ->queryAll();  
        }
        else
        {
            $entidades = Yii::$app->db->createCommand('SELECT id_entidad,nombre_entidad FROM ENTIDADES WHERE  id_entidad in'
            .'(SELECT id_entidad FROM fd_conjunto_respuesta  WHERE id_conjunto_pregunta =:formato)')
                ->bindValue(':formato', $formato)
                ->queryAll();             
        }
        
        /*$entidades = Yii::$app->db->createCommand("SELECT id_entidad,nombre_entidad FROM ENTIDADES WHERE  id_entidad in (
        '21',	'22',	'23',	'24',	'25',	'26',	'27',	'28',	'29',	'30',	'31',	'32',	'33',	'34',	'35',	'36',	'37',	'39',	'41',	'42',	'43',	'44',	'45',	'46',	'47',	'48',	'49',	'50',	'52',	'53',	'54',	'55',	'56',	'57',	'58',	'59',	'60',	'61',	'62',	'63',	'64',	'65',	'66',	'67',	'68',	'69',	'70',	'71',	'73',	'74',	'75',	'76',	'77',	'78',	'79',	'80',	'81',	'82',	'83',	'84',	'85',	'86',	'87',	'88',	'89',	'90',	'91',	'92',	'93',	'94',	'97',	'98',	'99',	'100',	'101',	'104',	'105',	'106',	'107',	'109',	'110',	'111',	'112',	'114',	'115',	'113',	'51',	'95',	'96',	'38'
        )")->queryAll(); */ 
        
        /*$entidades = Yii::$app->db->createCommand("SELECT id_entidad,nombre_entidad FROM ENTIDADES WHERE  id_entidad in (
        '102',	'103',	'72',	'108',	'116',	'118',	'119',	'120',	'121',	'123',	'124',	'125',	'126',	'127',	'128',	'129',	'131',	'132',	'133',	'134',	'135',	'136',	'137',	'138',	'139',	'140',	'141',	'142',	'143',	'145',	'146',	'147',	'148',	'149',	'150',	'151',	'152',	'153',	'154',	'155',	'156',	'158',	'160',	'161',	'162',	'164',	'165',	'166',	'167',	'168',	'169',	'170',	'171',	'172',	'173',	'174',	'175',	'176',	'177',	'179',	'180',	'181',	'182',	'183',	'184',	'185',	'186',	'187',	'188',	'189',	'190',	'192',	'193',	'194',	'195',	'196',	'197',	'199',	'200',	'201',	'202',	'203',	'204',	'205',	'206',	'208',	'209',	'210',	'211',	'212'
        )")->queryAll(); 
        
        $entidades = Yii::$app->db->createCommand("SELECT id_entidad,nombre_entidad FROM ENTIDADES WHERE  id_entidad in (
        '213',	'214',	'215',	'216',	'217',	'218',	'219',	'220',	'222',	'223',	'224',	'225',	'226',	'227',	'230',	'231',	'232',	'233',	'198',	'207',	'144',	'163',	'228',	'229',	'122',	'159',	'117',	'234',	'221',	'178',	'235',	'20',	'191',	'40',	'236',	'237',	'238',	'239',	'240',	'242',	'157',	'243',	'241'
        )")->queryAll(); */
                       
        $list_entidades=ArrayHelper::map($entidades,'id_entidad','nombre_entidad');
        return $list_entidades;
    }
    public function preguntas_formato($formato)
    {
         $model = new ReporteFormatoForm();        
         $preguntas= $model->obtenerPreguntas($formato);
         return $preguntas;         
    }
    public function obtenerPreguntas($formato)
    {
             
        $preguntas = Yii::$app->db->createCommand('SELECT id_pregunta,nom_pregunta FROM FD_PREGUNTA WHERE  id_conjunto_pregunta =:formato order by id_pregunta asc')
                ->bindValue(':formato', $formato)
                ->queryAll();  
        $list_preguntas   = ArrayHelper::map($preguntas,'id_pregunta','nom_pregunta');
        return $list_preguntas;
        
    }
    
    public function actionGenhtmlrepo($formato,$provincia=null)
    {
        $nombre_formato = $this->obtenerNombreFormato($formato);
        $preguntas = $this->obtenerPreguntas($formato);
        $this->list_entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;
        
        if(count($entidades)==0) 
        {
            return;
        }
              
        $html="";
        $html.="<table>";
        $html.="<tr>";
        if($formato==5)
        {   
            $html.=$this->obtenerCabeceraDatosGeneralesRiego();          
        }
        elseif($formato==6)
        {
             $html.=$this->obtenerCabeceraDatosGeneralesAps();        
        }
        else
        {
            $html.="<td>Entidad</td>";
        }
        foreach($preguntas as $k=>$v)
        {                           
             $html.="<td>".$v."</td>";           
        }
        $html.="</tr>";

        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);
            
            if($formato==5)
            {
                $html.="<tr>";
                $html.=$this->obtenerDatosGeneralesRiego($k,$v);               
                foreach ($preguntas as $kp=>$vp)
                {
                    $resp = $this->obtenerRespuesta($kp,$k);
                    $html.="<td>".$resp."</td>";
                }
                $html.="</tr>";
            }
            elseif($formato==6)
            {
                $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {     
                        $html.="<tr>";
                        $html.="<td>".$v."</td>";
                        $html.="<td>".$this->obtenerDemarcacion($k)."</td>";  
                            $html.=$this->obtenerDatosGeneralesAps($k,$v,$jun['id_junta']);
                            foreach ($preguntas as $kp=>$vp)
                            {

                            $resp = $this->obtenerRespuestaAps($kp,$k,$jun['id_junta']);
                            $html.="<td>".$resp."</td>";

                            }
                        $html.="</tr>";
                        }
                }
                else
                {
                    $html.="<tr>";
                    $html.="<td>".$v."</td>"; 
                    $html.="<td>".$this->obtenerDemarcacion($k)."</td>";  
                    $html.="</tr>";
                }
            }
            else
            {
              $html.="<tr>";
              $html.="<td>".$v."</td>";   
              foreach ($preguntas as $kp=>$vp)
                {
                    $resp = $this->obtenerRespuesta($kp,$k);
                    $html.="<td>".$resp."</td>";
                }
              $html.="</tr>";
            }
        }
        $html.="</table>";
        Yii::trace($html,"DEBUG");
        /*print $html;
        exit;*/
        return $html;
    }
    public function obtenerRespuesta($id_pregunta,$id_conj_respuesta)
    {
        $responde="";
        $preg = Yii::$app->db->createCommand('SELECT id_tpregunta FROM FD_PREGUNTA WHERE  id_pregunta =:id_pregunta')
             ->bindValue(':id_pregunta', $id_pregunta)
             ->queryOne();  
        $tipo_preg = $preg['id_tpregunta'];
        $campo_resp="ra_check";
        if($tipo_preg==1)$campo_resp="ra_fecha";
        else if($tipo_preg==2)$campo_resp="ra_check";        
        else if($tipo_preg==3)$campo_resp="id_opcion_select";
        else if($tipo_preg==4)$campo_resp="ra_descripcion";
        else if($tipo_preg==5)$campo_resp="ra_entero";
        else if($tipo_preg==6)$campo_resp="ra_decimal";
        else if($tipo_preg==7)$campo_resp="ra_porcentaje";
        else if($tipo_preg==8)$campo_resp="ra_moneda";
        else if($tipo_preg==15 || $tipo_preg==26)$campo_resp="ra_descripcion";        
        
    
       $respuesta = Yii::$app->db->createCommand('SELECT ra_fecha,ra_check,id_opcion_select,ra_descripcion,ra_entero,ra_decimal,ra_porcentaje,ra_moneda,ra_descripcion FROM FD_RESPUESTA WHERE  id_pregunta =:id_pregunta and id_conjunto_respuesta=:id_conj_res')
             ->bindValue(':id_pregunta', $id_pregunta)
             ->bindValue(':id_conj_res', $id_conj_respuesta)
             ->queryOne();  
          if(!empty($respuesta))
            $responde = $respuesta[$campo_resp];
          
         
          if($tipo_preg==3)
          {
              if(!empty($responde))
                $responde= $this->obtenerOpcionSelect($responde);
              else
                  $responde="";
          }
          
          
          return $responde;
    }
    public function obtenerNombreFormato($formato)
    {
        $formato = Yii::$app->db->createCommand('SELECT nom_formato FROM FD_FORMATO WHERE  id_formato =:formato')
                ->bindValue(':formato', $formato)
                ->queryOne();  
     
        //$list_entidades   = ArrayHelper::map($preguntas,'id_entidad','nombre_entidad');
        return $formato['nom_formato'];
    }
    public function obtenerOpcionSelect($id_opcion)
    {
        $valor_op="";
      
        $opc_select = Yii::$app->db->createCommand('SELECT nom_opcion_select FROM FD_OPCION_SELECT WHERE  id_opcion_select =:id_opcion')
                    ->bindValue(':id_opcion', $id_opcion)
                    ->queryOne();  

     
        //$list_entidades   = ArrayHelper::map($preguntas,'id_entidad','nombre_entidad');
        if(!empty($opc_select))
           $valor_op= $opc_select['nom_opcion_select'];
        return $valor_op;
    }
    public function obtenerEntidadesRiego($id_conj_pregunta)
    {
         $datos_riego = Yii::$app->db->createCommand('SELECT nombres_prestador_servicio,direccion_oficinas,nombres_apellidos_replegal,num_convencional,num_celular,num_celular_otro,correo_electronico FROM FD_DATOS_GENERALES_RIEGO WHERE  id_conjunto_respuesta =:id_conj_resp')                    
                        ->bindValue(':id_conj_resp', $id_conj_pregunta)
                        ->queryOne();  
         return $datos_riego;
    }
    public function obtenerUbicacionRiego($id_conj_pregunta)
    {
        $datos_ubiriego = Yii::$app->db->createCommand('SELECT cod_provincia,cod_canton,cod_parroquia,id_demarcacion FROM fd_ubicacion WHERE  id_conjunto_respuesta =:id_conj_resp')                    
                        ->bindValue(':id_conj_resp', $id_conj_pregunta)
                        ->queryOne();  
         return $datos_ubiriego;
    }
    public function obtenerUbicacionAps($id_conj_pregunta,$id_junta)
    {
        $datos_ubiaps = Yii::$app->db->createCommand('SELECT cod_provincia,cod_canton,cod_parroquia FROM fd_ubicacion WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta=:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_pregunta)
                        ->bindValue(':id_junta', $id_junta)
                        ->queryOne();  
         return $datos_ubiaps;
    }
    public function obtenerNombreProvincia($cod_provincia)
    {
        $datos_prov = Yii::$app->db->createCommand('SELECT nombre_provincia FROM provincias WHERE  cod_provincia =:cod_provincia')                    
                        ->bindValue(':cod_provincia', $cod_provincia)
                        ->queryOne();  
         return $datos_prov['nombre_provincia'];
    }
    public function obtenerNombreCanton($cod_provincia,$cod_canton)
    {
        $datos_can = Yii::$app->db->createCommand('SELECT nombre_canton FROM cantones WHERE  cod_provincia =:cod_provincia and cod_canton=:cod_canton')                    
                        ->bindValue(':cod_provincia', $cod_provincia)
                        ->bindValue(':cod_canton', $cod_canton)
                        ->queryOne();  
         return $datos_can['nombre_canton'];
    }
    public function obtenerNombreParroquia($cod_provincia,$cod_canton,$cod_parroquia)
    {
        $datos_parro = Yii::$app->db->createCommand('SELECT nombre_parroquia FROM parroquias WHERE  cod_provincia =:cod_provincia and cod_canton=:cod_canton and cod_parroquia=:cod_parroquia')                    
                        ->bindValue(':cod_provincia', $cod_provincia)
                        ->bindValue(':cod_canton', $cod_canton)
                        ->bindValue(':cod_parroquia', $cod_parroquia)
                        ->queryOne();  
         return $datos_parro['nombre_parroquia'];
    }
    public function obtenerNombreDemarcacion($id_demarcacion)
    {
         $datos_demar = Yii::$app->db->createCommand('SELECT nombre_demarcacion FROM demarcaciones WHERE  id_demarcacion =:id_demarcacion')                    
                        ->bindValue(':id_demarcacion', $id_demarcacion)                        
                        ->queryOne();  
         return $datos_demar['nombre_demarcacion'];
    }
    
    public function obtenerIdconjResp($id_entidad)
    {
         $datos_idc = Yii::$app->db->createCommand('SELECT id_conjunto_respuesta FROM fd_conjunto_respuesta WHERE  id_entidad =:id_entidad')                    
                        ->bindValue(':id_entidad', $id_entidad)                        
                        ->queryOne();  
         return $datos_idc['id_conjunto_respuesta'];
    }
    public function obtenerFuentes($id_conj_respuesta)
    {
         $datos_fuentes = Yii::$app->db->createCommand('SELECT nom_fuente FROM fd_fuentes_hidricas WHERE  id_conjunto_respuesta =:id_conj_resp')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->queryAll();           
         return $datos_fuentes;
        
    }
    public function obtenerUbicacionGeografica($id_conj_respuesta)
    {
         $datos_ubicacion = Yii::$app->db->createCommand('SELECT x,y,cota FROM fd_ubicacion_geografica WHERE  id_conjunto_respuesta =:id_conj_resp')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->queryAll();    
 
         return $datos_ubicacion;
    }
    public function obtenerObrasCaptacion($id_conj_respuesta)
    {
        $datos_obras = Yii::$app->db->createCommand('SELECT numero_obras,tipo_obra,estado_obra,ubicacion_obra,especifique,especifique_ubicacion FROM fd_obras_captacion_riego WHERE  id_conjunto_respuesta =:id_conj_resp')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->queryAll();    
         
         return $datos_obras;        
    }
    public function obtenerDatosGeneralesRiego($k,$v)
    {
        $html="";
        $datos_riego = $this->obtenerEntidadesRiego($k);
                if(!empty($datos_riego))
                {
                    $html.="<td>".$datos_riego['nombres_prestador_servicio']."</td>";
                    $html.="<td>".$datos_riego['direccion_oficinas']."</td>";
                    $html.="<td>".$datos_riego['nombres_apellidos_replegal']."</td>";
                    $html.="<td>".$datos_riego['num_convencional']."</td>";
                    $html.="<td>".$datos_riego['num_celular']."</td>";
                    $html.="<td>".$datos_riego['num_celular_otro']."</td>";
                    $html.="<td>".$datos_riego['correo_electronico']."</td>";
                    $datos_ubica = $this->obtenerUbicacionRiego($k);
                    $html.="<td>".$this->obtenerNombreProvincia($datos_ubica['cod_provincia'])."</td>";
                    $html.="<td>".$this->obtenerNombreCanton($datos_ubica['cod_provincia'],$datos_ubica['cod_canton'])."</td>";
                    $html.="<td>".$this->obtenerNombreParroquia($datos_ubica['cod_provincia'],$datos_ubica['cod_canton'],$datos_ubica['cod_parroquia'])."</td>";
                    $html.="<td>".$this->obtenerNombreDemarcacion($datos_ubica['id_demarcacion'])."</td>";
                }
                else
                {
                    $html.="<td>".$v."</td>";
                    for($i=0;$i<9;$i++)
                      $html.="<td></td>";
                }
        return $html;
    }
    public function obtenerCabeceraDatosGeneralesRiego()
    {
        $html="";
        $html.="<td>Nombre del Prestador del Servicio</td>";
        $html.="<td>Dirección de las oficinas</td>";
        $html.="<td>Nombre del representante legal</td>";            
        $html.="<td>Teléfono convencional del representante legal</td>";
        $html.="<td>Teléfono celular 1 del representante legal</td>";
        $html.="<td>Teléfono celular 2 del representante legal</td>";
        $html.="<td>Correo electrónico</td>";
        $html.="<td>Provincia</td>";
        $html.="<td>Cantón</td>";
        $html.="<td>Parroquia</td>";
        $html.="<td>Demarcación Hidrográfica</td>";
        return $html;
    }
    public function obtenerCabeceraDatosGeneralesAps()
    {
        $html="";
        $html.="<td>Entidad</td>";
        $html.="<td>Demarcación</td>";
        $html.="<td>Posee prestador</td>";      
        $html.="<td>Número Prestadores</td>";
        $html.="<td>Número Prestadores Legal</td>";
        $html.="<td>Número Prestadores Económico</td>";
        $html.="<td>Número Prestadores Técnico</td>";
        $html.="<td>Prestador</td>";        
        $html.="<td>Provincia</td>";
        $html.="<td>Cantón</td>";
        $html.="<td>Parroquia</td>";
        $html.="<td>Comunidad / recinto / sector</td>";
        $html.="<td>¿A cuántas personas brinda el servicio de agua?</td>";
        $html.="<td>Señale el tipo del prestador comunitario</td>";        
        return $html;
    }
    public function obtenerDatosGeneralesAps($k,$v,$junta)
    {
        $html="";
        $datos_aps = $this->obtenerEntidadesAps($k,$junta);
        $datos_info_prestador = $this->obtenerInforPrestadores($k);
                if(!empty($datos_aps))
                {                        
                       
                        $html.="<td>".$this->obtenerOpcionSelect($datos_info_prestador['posee_prestadores'])."</td>";
                        $html.="<td>".$datos_info_prestador['numero_prestadores']."</td>";
                        $html.="<td>".$datos_info_prestador['numero_prestadores_legal']."</td>";
                        $html.="<td>".$datos_info_prestador['numero_prestadores_economico']."</td>";
                        $html.="<td>".$datos_info_prestador['numero_prestadores_tecnico']."</td>";
                        $html.="<td>".$datos_aps['nombres_prestador']."</td>";
                        $datos_ubica = $this->obtenerUbicacionAps($k,$junta);                                                                      
                        $html.="<td>".$this->obtenerNombreProvincia($datos_ubica['cod_provincia'])."</td>";
                        $html.="<td>".$this->obtenerNombreCanton($datos_ubica['cod_provincia'],$datos_ubica['cod_canton'])."</td>";
                        $html.="<td>".$this->obtenerNombreParroquia($datos_ubica['cod_provincia'],$datos_ubica['cod_canton'],$datos_ubica['cod_parroquia'])."</td>";          
                        $html.="<td>".$datos_aps['nombre_comunidad']."</td>";
                        $html.="<td>".$datos_aps['numero_personas_servicio']."</td>";
                        $html.="<td>".$this->obtenerOpcionSelect($datos_aps['tipo_prestador_comunitario'])."</td>";                                      
                }
                else
                {
                    $consulta_junta =$this->obtenerNombreJunta($k,$junta);
                    if(!empty($consulta_junta))$v=$consulta_junta;
                    if(!empty($datos_info_prestador))
                    {                        
                        $html.="<td>".$this->obtenerOpcionSelect($datos_info_prestador['posee_prestadores'])."</td>";
                        $html.="<td>".$datos_info_prestador['numero_prestadores']."</td>";
                        $html.="<td>".$datos_info_prestador['numero_prestadores_legal']."</td>";
                        $html.="<td>".$datos_info_prestador['numero_prestadores_economico']."</td>";
                        $html.="<td>".$datos_info_prestador['numero_prestadores_tecnico']."</td>";
                    }
                    else
                    {
                        $html.="<td></td>";
                        $html.="<td></td>";
                        $html.="<td></td>";
                        $html.="<td></td>";
                        $html.="<td></td>";
                    }
                    
                    $html.="<td>".$v."</td>";
                    for($i=0;$i<5;$i++)
                      $html.="<td></td>";
                }
        return $html;
    }
    public function obtenerNombreJunta($id_conj_pregunta,$junta)
    {
        $datos_junta = Yii::$app->db->createCommand('SELECT nombre_junta FROM juntas_gad WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta=:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_pregunta)
                        ->bindValue(':id_junta', $junta)
                        ->queryOne();  
         return $datos_junta['nombre_junta'];
    }
    public function obtenerEntidadesAps($id_conj_pregunta,$junta)
    {
         $datos_aps = Yii::$app->db->createCommand('SELECT nombres_prestador,nombre_comunidad,numero_personas_servicio,tipo_prestador_comunitario FROM fd_datos_generales_comunitario_ap WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta=:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_pregunta)
                        ->bindValue(':id_junta', $junta)
                        ->queryOne();  
         return $datos_aps;
    }
    public function obtenerInforPrestadores($id_conj_pregunta)
    {
        $datos_infp = Yii::$app->db->createCommand('SELECT posee_prestadores,numero_prestadores,numero_prestadores_legal,numero_prestadores_economico,numero_prestadores_tecnico FROM informacion_prestadores WHERE  id_conjunto_respuesta =:id_conj_resp')                    
                        ->bindValue(':id_conj_resp', $id_conj_pregunta)                        
                        ->queryOne(); 
        return $datos_infp;
    }
    public function obtenerJuntas($id_conj_pregunta)
    {
         $juntas = Yii::$app->db->createCommand('SELECT id_junta FROM juntas_gad WHERE  id_conjunto_respuesta =:id_conj_resp')                    
                        ->bindValue(':id_conj_resp', $id_conj_pregunta)
                        ->queryAll();  
         return $juntas;
    }
    
    public function obtenerRespuestaAps($id_pregunta,$id_conj_respuesta,$junta)
    {
        $responde="";
        $preg = Yii::$app->db->createCommand('SELECT id_tpregunta FROM FD_PREGUNTA WHERE  id_pregunta =:id_pregunta')
             ->bindValue(':id_pregunta', $id_pregunta)
             ->queryOne();  
        $tipo_preg = $preg['id_tpregunta'];
        $campo_resp="ra_check";
        if($tipo_preg==1)$campo_resp="ra_fecha";
        else if($tipo_preg==2)$campo_resp="ra_check";        
        else if($tipo_preg==3)$campo_resp="id_opcion_select";
        else if($tipo_preg==4)$campo_resp="ra_descripcion";
        else if($tipo_preg==5)$campo_resp="ra_entero";
        else if($tipo_preg==6)$campo_resp="ra_decimal";
        else if($tipo_preg==7)$campo_resp="ra_porcentaje";
        else if($tipo_preg==8)$campo_resp="ra_moneda";
        else if($tipo_preg==15 || $tipo_preg==26)$campo_resp="ra_descripcion";        
        /*else if($tipo_preg==23)
        {
            $det_fuentes=$this->obtenerDetallesFuentes($id_conj_respuesta,$junta);
            return $det_fuentes; 
        }
        else if($tipo_preg==24)
        {
            $det_captacion=$this->obtenerDetallesCaptacion($id_conj_respuesta,$junta);
            return $det_captacion;
        }*/
        
    
       $respuesta = Yii::$app->db->createCommand('SELECT ra_fecha,ra_check,id_opcion_select,ra_descripcion,ra_entero,ra_decimal,ra_porcentaje,ra_moneda,ra_descripcion FROM FD_RESPUESTA WHERE  id_pregunta =:id_pregunta and id_conjunto_respuesta=:id_conj_res and id_junta=:id_junta')
             ->bindValue(':id_pregunta', $id_pregunta)
             ->bindValue(':id_conj_res', $id_conj_respuesta)
             ->bindValue(':id_junta', $junta)
             ->queryOne();  
          if(!empty($respuesta))
            $responde = $respuesta[$campo_resp];
          
         
          if($tipo_preg==3)
          {
              if(!empty($responde))
                $responde= $this->obtenerOpcionSelect($responde);
              else
                  $responde="";
          }
          
          
          return $responde;
    }
    public function obtenerDetallesFuentes($id_conj_respuesta,$junta)
    {
         $detfuentes = Yii::$app->db->createCommand('SELECT nombre_fuente,id_t_fuente,coor_x,coor_y,coor_z,caudal_autorizado,id_problema_fuente,especifique FROM fd_detalles_fuente WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta =:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->bindValue(':id_junta', $junta)  
                        ->queryAll();           
         return $detfuentes;
    }
    public function obtenerBombasCaptacion($id_conj_respuesta,$junta)
    {
         $detbomcaptacion = Yii::$app->db->createCommand('SELECT nombre_bomba,anio_instalacion,id_problema_bomba,especifique_problema_bomba,observaciones,id_material_tuberia,id_estado_tuberia,id_frec_mantenimiento FROM fd_bombas_captacion WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta =:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->bindValue(':id_junta', $junta)  
                        ->queryAll();           
         return $detbomcaptacion;
    }
    public function obtenerDetallesCaptacion($id_conj_respuesta,$junta)
    {
         $detcaptacion = Yii::$app->db->createCommand('SELECT nombre_captacion,id_estruc_hidrau,id_material_estruc,especifique_mat_estr,id_problema_capt,especifique_probl,id_estado_capt,id_t_medicion,especifique_t_med,observaciones FROM fd_detalles_captacion WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta =:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->bindValue(':id_junta', $junta)  
                        ->queryAll();           
         return $detcaptacion;
    }
    public function obtenerConduccionGravedad($id_conj_respuesta,$junta)
    {
         $detcondug = Yii::$app->db->createCommand('SELECT nombre_conduccion_g,id_forma_conduccion_g,id_material_conduccion_g,id_frec_mantenimiento_g,id_estado_conduccion_g,problemas_identificados FROM fd_conduccion_gravedad_ap WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta =:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->bindValue(':id_junta', $junta)  
                        ->queryAll();           
         return $detcondug;
    }
    public function obtenerConduccionImpulsion($id_conj_respuesta,$junta)
    {
         $detconduim = Yii::$app->db->createCommand('SELECT nombre_lug_conduccion,id_material_tuberia,especifique_otro_tuberia,id_estado_tuberia,id_frec_mantenimiento_condimp,id_estado_bomba,problemas_identificados FROM fd_conduccion_impulsion_apscom WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta =:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->bindValue(':id_junta', $junta)  
                        ->queryAll();           
         return $detconduim;
    }
    public function obtenerTratamientoDesin($id_conj_respuesta,$junta)
    {
         $detconduim = Yii::$app->db->createCommand('SELECT ubicacion_lug_tratamiento,realiza_desinfeccion,metodo_desinfeccion,especifique_otro_metdesinf,mide_salida_desinfeccion,estado_func_sistema,problemas_identificados,especifique_otros_problemas FROM fd_tratagua_desinfeccion_apscom WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta =:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->bindValue(':id_junta', $junta)  
                        ->queryAll();           
         return $detconduim;
    }  
    public function obtenerPotabAguaTrata($id_conj_respuesta,$junta)
    {
         $detpotag = Yii::$app->db->createCommand('SELECT ubicacion_lug_ptratamiento,tipo_planta_tratatmiento,especifique_tplantat,metodo_desinfeccion_planta,especifique_metdesinfeccionp,midicion_agua_tratplanta,estado_planta,problemas_identificados FROM fd_potabiliz_plantatra_apscom WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta =:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->bindValue(':id_junta', $junta)  
                        ->queryAll();           
         return $detpotag;
    } 
    public function obtenerOperaPlanta($id_conj_respuesta,$junta)
    {
         $detpotag = Yii::$app->db->createCommand('SELECT id_operacionplanta,manual_operacion,operacion_planta,personal_capacitado,frecuencia_mantenimiento,problemas,especifique FROM fd_operacion_planta_apscom WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta =:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->bindValue(':id_junta', $junta)  
                        ->queryAll();           
         return $detpotag;
    } 
    public function obtenerTanquesAlmacena($id_conj_respuesta,$junta)
    {
         $detanquealma = Yii::$app->db->createCommand('SELECT ubicacion_tanque,capacidad_tanque,medicion_entrada,material,especifique,frecuencia_mantenimiento,estado_tanque,problemas FROM fd_tanques_almacena_apscom WHERE  id_conjunto_respuesta =:id_conj_resp and id_junta =:id_junta')                    
                        ->bindValue(':id_conj_resp', $id_conj_respuesta)                        
                        ->bindValue(':id_junta', $junta)  
                        ->queryAll();           
         return $detanquealma;
    } 
    public function obtenerDemarcacion($entidad)
    {
        $entidad =  Yii::$app->db->createCommand('SELECT cod_provincia_p,cod_canton_p FROM entidades WHERE  id_entidad =:entidad')                    
                        ->bindValue(':entidad', $entidad)                                                
                        ->queryOne();  
         $demarca = Yii::$app->db->createCommand('SELECT id_demarcacion FROM cantones WHERE  cod_provincia =:provincia and cod_canton =:canton')                    
                        ->bindValue(':provincia', $entidad['cod_provincia_p'])                        
                        ->bindValue(':canton', $entidad['cod_canton_p'])  
                        ->queryOne();       
         $id_dem = $demarca['id_demarcacion'];
         
         $nom_dem=$this->obtenerNombreDemarcacion($id_dem);
         
         return $nom_dem;
    }
    public function ObtenernFuentes($formato)
    {
        $html="";
        $entidades = $this->obtenerEntidades($formato);
        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Nombre fuente</td>";
        $html.="</tr>";
       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);
            $datos_riego = $this->obtenerEntidadesRiego($k);
            $presta=$datos_riego['nombres_prestador_servicio'];
            $fuentes = $this->obtenerFuentes($k);
            $contar =count($fuentes);
            if(!empty($fuentes)){
                //$html.="<tr>";
                //$html.="<td rowspan='$contar'>".$v."</td>";                
                $i=0;
                    foreach($fuentes as $dat)
                    {
                        
                        $html.="<tr>";
                        //if($contar==1)
                        $html.="<td>".$v."</td>"; 
                        $html.="<td>".$presta."</td>"; 
                        /*else
                        {
                            if($i==0){
                              $html.="<td rowspan=$contar>".$v."</td>";                                
                            }
                            $i++;
                        }*/
                        $html.="<td>".$dat['nom_fuente']."</td>";
                        
                        $html.="</tr>";
                        
                    }
               // $html.="</tr>";
            }
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernUbicacion($formato)
    {
        $html="";
        $entidades = $this->obtenerEntidades($formato);

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>X</td><td>Y</td><td>COTA</td>";
        $html.="</tr>";
       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);
            $datos_riego = $this->obtenerEntidadesRiego($k);
            $presta=$datos_riego['nombres_prestador_servicio'];
            $ubicacion = $this->obtenerUbicacionGeografica($k);            
            if(!empty($ubicacion)){           
                    foreach($ubicacion as $dat)
                    {
                        
                        $html.="<tr>";
                        $html.="<td>".$v."</td>"; 
                        $html.="<td>".$presta."</td>"; 
                        $html.="<td>".$dat['x']."</td>";
                        $html.="<td>".$dat['y']."</td>";
                        $html.="<td>".$dat['cota']."</td>";
                        $html.="</tr>";                        
                    }
            }
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernObrasCaptacion($formato)
    {
        $html="";
        $entidades = $this->obtenerEntidades($formato);

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Número obras</td><td>Tipo obra</td><td>Especifique</td><td>Estado obra</td><td>Ubicación obra</td><td>Especifique Ubicación</td>";
        $html.="</tr>";
       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);
            $datos_riego = $this->obtenerEntidadesRiego($k);
            $presta=$datos_riego['nombres_prestador_servicio'];
            $obracap = $this->obtenerObrasCaptacion($k);            
            if(!empty($obracap)){           
                    foreach($obracap as $dat)
                    {
                        
                        $html.="<tr>";
                        $html.="<td>".$v."</td>"; 
                        $html.="<td>".$presta."</td>"; 
                        $html.="<td>".$dat['numero_obras']."</td>";
                        $html.="<td>".$this->obtenerOpcionSelect($dat['tipo_obra'])."</td>";
                        $html.="<td>".$dat['especifique']."</td>";
                        $html.="<td>".$this->obtenerOpcionSelect($dat['estado_obra'])."</td>";
                        $html.="<td>".$this->obtenerOpcionSelect($dat['ubicacion_obra'])."</td>";
                        $html.="<td>".$dat['especifique_ubicacion']."</td>";
                        $html.="</tr>";                        
                    }
            }
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernDetFuentes($formato,$provincia=null)
    {
        $html="";
        //$entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Nombre fuente</td><td>Tipo fuente</td><td>X</td><td>Y</td><td>Z</td><td>Caudal autorizado</td><td>Problema fuente</td><td>Especifique problema</td>";
        $html.="</tr>";       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);            
            $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {  
                            $junta = $jun['id_junta'];                            
                            $datos_aps = $this->obtenerEntidadesAps($k,$junta);
                            $presta=$datos_aps['nombres_prestador'];

                            $detfuentes = $this->obtenerDetallesFuentes($k, $junta);          
                            if(!empty($detfuentes)){           
                                    foreach($detfuentes as $dat)
                                    {
                                        $html.="<tr>";
                                        $html.="<td>".$v."</td>"; 
                                        $html.="<td>".$presta."</td>"; 
                                        $html.="<td>".$dat['nombre_fuente']."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_t_fuente'])."</td>";
                                        $html.="<td>".$dat['coor_x']."</td>";
                                        $html.="<td>".$dat['coor_y']."</td>";
                                        $html.="<td>".$dat['coor_z']."</td>";
                                        $html.="<td>".$dat['caudal_autorizado']."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_problema_fuente'])."</td>";                        
                                        $html.="<td>".$dat['especifique']."</td>";
                                        $html.="</tr>";                        
                                    }
                            }
                    }
                }            
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernDetCaptacion($formato,$provincia)
    {
        $html="";
        //$entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Nombre captación</td><td>Tiene estructura hidráulica</td><td>Material estructura</td><td>Especifique material</td><td>Problemas de captación</td><td>Especificación problema</td><td>Estado de captación</td><td>Tipo de medición</td><td>Otros tipo de medición</td><td>Observaciones</td>";
        $html.="</tr>";       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);            
            $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {  
                            $junta = $jun['id_junta'];                            
                            $datos_aps = $this->obtenerEntidadesAps($k,$junta);
                            $presta=$datos_aps['nombres_prestador'];

                            $detcapta = $this->obtenerDetallesCaptacion($k, $junta);          
                            if(!empty($detcapta)){           
                                    foreach($detcapta as $dat)
                                    {
                                        $html.="<tr>";
                                        $html.="<td>".$v."</td>"; 
                                        $html.="<td>".$presta."</td>"; 
                                        $html.="<td>".$dat['nombre_captacion']."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_estruc_hidrau'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_material_estruc'])."</td>";
                                        $html.="<td>".$dat['especifique_mat_estr']."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_problema_capt'])."</td>";
                                        $html.="<td>".$dat['especifique_probl']."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_estado_capt'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_t_medicion'])."</td>";  
                                        $html.="<td>".$dat['especifique_t_med']."</td>";
                                        $html.="<td>".$dat['observaciones']."</td>";
                                        $html.="</tr>";                        
                                    }
                            }
                    }
                }            
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernBombaCapta($formato,$provincia)
    {
        $html="";
        //$entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Nombre bomba</td><td>Año instalación</td><td>Problema bomba</td><td>Especifique problema bomba</td><td>Observación</td><td>Material tubería</td><td>Estado tubería</td><td>Frecuencia mantenimiento</td>";
        $html.="</tr>";       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);            
            $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {  
                            $junta = $jun['id_junta'];                            
                            $datos_aps = $this->obtenerEntidadesAps($k,$junta);
                            $presta=$datos_aps['nombres_prestador'];

                            $detcapta = $this->obtenerBombasCaptacion($k, $junta);          
                            if(!empty($detcapta)){           
                                    foreach($detcapta as $dat)
                                    {
                                        $html.="<tr>";
                                        $html.="<td>".$v."</td>"; 
                                        $html.="<td>".$presta."</td>"; 
                                        $html.="<td>".$dat['nombre_bomba']."</td>";
                                        $html.="<td>".$dat['anio_instalacion']."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_problema_bomba'])."</td>";
                                        $html.="<td>".$dat['especifique_problema_bomba']."</td>";
                                        $html.="<td>".$dat['observaciones']."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_material_tuberia'])."</td>";                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_estado_tuberia'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_frec_mantenimiento'])."</td>";                                          
                                        $html.="</tr>";                        
                                    }
                            }
                    }
                }            
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernConduccionGra($formato,$provincia)
    {
        $html="";
        //$entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Nombre conducción gravedad</td><td>Forma de conducción</td><td>Material conducción</td><td>Frecuencia mantenimiento</td><td>Estado conducción</td><td>Problemas identificados</td>";
        $html.="</tr>";       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);            
            $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {  
                            $junta = $jun['id_junta'];                            
                            $datos_aps = $this->obtenerEntidadesAps($k,$junta);
                            $presta=$datos_aps['nombres_prestador'];

                            $detcondug = $this->obtenerConduccionGravedad($k, $junta);          
                            if(!empty($detcondug)){           
                                    foreach($detcondug as $dat)
                                    {                                        
                                        $html.="<tr>";
                                        $html.="<td>".$v."</td>"; 
                                        $html.="<td>".$presta."</td>"; 
                                        $html.="<td>".$dat['nombre_conduccion_g']."</td>";                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_forma_conduccion_g'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_material_conduccion_g'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_frec_mantenimiento_g'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_estado_conduccion_g'])."</td>";                                        
                                        $html.="<td>".$dat['problemas_identificados']."</td>";                                                                               
                                        $html.="</tr>";                        
                                    }
                            }
                    }
                }            
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernConduccionIm($formato,$provincia)
    {
        $html="";
        //$entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Nombre conducción impulsión</td><td>Material tubería</td><td>Otro material</td><td>Estado tubería</td><td>Frecuencia mantenimiento</td><td>Estado bomba</td><td>Problemas identificados</td>";
        $html.="</tr>";       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);            
            $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {  
                            $junta = $jun['id_junta'];                            
                            $datos_aps = $this->obtenerEntidadesAps($k,$junta);
                            $presta=$datos_aps['nombres_prestador'];

                            $detcondui = $this->obtenerConduccionImpulsion($k, $junta);          
                            if(!empty($detcondui)){           
                                    foreach($detcondui as $dat)
                                    {                                               
                                        $html.="<tr>";
                                        $html.="<td>".$v."</td>"; 
                                        $html.="<td>".$presta."</td>"; 
                                        $html.="<td>".$dat['nombre_lug_conduccion']."</td>";                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_material_tuberia'])."</td>";
                                        $html.="<td>".$dat['especifique_otro_tuberia']."</td>";                                                                               
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_estado_tuberia'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_frec_mantenimiento_condimp'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['id_estado_bomba'])."</td>";                                        
                                        $html.="<td>".$dat['problemas_identificados']."</td>";                                                                               
                                        $html.="</tr>";                        
                                    }
                            }
                    }
                }            
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernTrataD($formato,$provincia)
    {
        $html="";
        //$entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Ubicación planta</td><td>Realiza desinfección</td><td>Método desinfección</td><td>Otro método</td><td>Mide salida</td><td>Estado sistema</td><td>Problemas identificados</td><td>Especifique problemas</td>";
        $html.="</tr>";       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);            
            $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {  
                            $junta = $jun['id_junta'];                            
                            $datos_aps = $this->obtenerEntidadesAps($k,$junta);
                            $presta=$datos_aps['nombres_prestador'];

                            $dettratad= $this->obtenerTratamientoDesin($k, $junta);          
                            if(!empty($dettratad)){           
                                    foreach($dettratad as $dat)
                                    {                                                 
                                        $html.="<tr>";
                                        $html.="<td>".$v."</td>"; 
                                        $html.="<td>".$presta."</td>"; 
                                        $html.="<td>".$dat['ubicacion_lug_tratamiento']."</td>";                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['realiza_desinfeccion'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['metodo_desinfeccion'])."</td>";
                                        $html.="<td>".$dat['especifique_otro_metdesinf']."</td>";                                                                               
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['mide_salida_desinfeccion'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['estado_func_sistema'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['problemas_identificados'])."</td>";                                        
                                        $html.="<td>".$dat['especifique_otros_problemas']."</td>";                                                                               
                                        $html.="</tr>";                        
                                    }
                            }
                    }
                }            
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernPotaAgua($formato,$provincia)
    {
        $html="";
        //$entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Ubicación planta</td><td>Tipo planta</td><td>Especifique tipo planta</td><td>Método desinfección</td><td>Especifique método</td><td>Realiza medición</td><td>Estado de la planta</td><td>Problemas identificados</td>";
        $html.="</tr>";       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);            
            $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {  
                            $junta = $jun['id_junta'];                            
                            $datos_aps = $this->obtenerEntidadesAps($k,$junta);
                            $presta=$datos_aps['nombres_prestador'];

                            $dettratad= $this->obtenerPotabAguaTrata($k, $junta);          
                            if(!empty($dettratad)){           
                                    foreach($dettratad as $dat)
                                    {                                               
                                        $html.="<tr>";
                                        $html.="<td>".$v."</td>"; 
                                        $html.="<td>".$presta."</td>"; 
                                        $html.="<td>".$dat['ubicacion_lug_ptratamiento']."</td>";                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['tipo_planta_tratatmiento'])."</td>";
                                        $html.="<td>".$dat['especifique_tplantat']."</td>";                                                                               
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['metodo_desinfeccion_planta'])."</td>";
                                        $html.="<td>".$dat['especifique_metdesinfeccionp']."</td>";                                                                               
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['midicion_agua_tratplanta'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['estado_planta'])."</td>";
                                        $html.="<td>".$dat['problemas_identificados']."</td>";                                                                                
                                        $html.="</tr>";                        
                                    }
                            }
                    }
                }            
        }
        $html.="</table>";
        return $html;        
    }
    public function ObtenernOperacionPlanta($formato,$provincia)
    {
        $html="";
        //$entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Dispone manual</td><td>Realiza operación</td><td>Existe personal capacitado</td><td>Frecuencia de mantenimiento</td><td>Problemas identificados</td><td>Especifique</td>";
        $html.="</tr>";       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);            
            $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {  
                            $junta = $jun['id_junta'];                            
                            $datos_aps = $this->obtenerEntidadesAps($k,$junta);
                            $presta=$datos_aps['nombres_prestador'];

                            $detoperap= $this->obtenerOperaPlanta($k, $junta);          
                            if(!empty($detoperap)){           
                                    foreach($detoperap as $dat)
                                    {                                           
                                        $html.="<tr>";
                                        $html.="<td>".$v."</td>"; 
                                        $html.="<td>".$presta."</td>";                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['manual_operacion'])."</td>";                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['operacion_planta'])."</td>";                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['personal_capacitado'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['frecuencia_mantenimiento'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['problemas'])."</td>";
                                        $html.="<td>".$dat['especifique']."</td>";                                                                                
                                        $html.="</tr>";                        
                                    }
                            }
                    }
                }            
        }
        $html.="</table>";
        return $html;        
    }
   public function ObtenernTanquesAlmacena($formato,$provincia)
    {
        $html="";
        //$entidades = $this->obtenerEntidades($formato,$provincia);
        $entidades = $this->list_entidades;

        $html="<table>";
        $html.="<tr>";
        $html.="<td>Entidad</td><td>Prestador del servicio</td><td>Ubicación tanque</td><td>Capacidad tanque</td><td>Medición entrada</td><td>Material</td><td>Otro material</td><td>Frecuencia mantenimiento</td><td>Estado tanque</td><td>Problemas</td>";
        $html.="</tr>";       
        foreach($entidades as $k=>$v)
        {  
            $k=$this->obtenerIdconjResp($k);            
            $juntas =$this->obtenerJuntas($k);    
                if(count($juntas)>0)
                {
                    foreach($juntas as $jun)
                        {  
                            $junta = $jun['id_junta'];                            
                            $datos_aps = $this->obtenerEntidadesAps($k,$junta); 
                            $presta=$datos_aps['nombres_prestador'];

                            $detanqal= $this->obtenerTanquesAlmacena($k, $junta);          
                            if(!empty($detanqal)){           
                                    foreach($detanqal as $dat)
                                    {                                           
                                        $html.="<tr>";
                                        $html.="<td>".$v."</td>"; 
                                        $html.="<td>".$presta."</td>"; 
                                        $html.="<td>".$dat['ubicacion_tanque']."</td>";           
                                        $html.="<td>".$dat['capacidad_tanque']."</td>";           
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['medicion_entrada'])."</td>";                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['material'])."</td>";       
                                        $html.="<td>".$dat['especifique']."</td>";                                                                                                                        
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['frecuencia_mantenimiento'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['estado_tanque'])."</td>";
                                        $html.="<td>".$this->obtenerOpcionSelect($dat['problemas'])."</td>";                                        
                                        $html.="</tr>";                        
                                    }
                            }
                    }
                }            
        }
        $html.="</table>";
        return $html;        
    }

}
