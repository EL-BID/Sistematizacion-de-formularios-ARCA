<?php
namespace frontend\helpers;
use Yii;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class savecapitulo{
    
    public $_vcapitulo;                 /*Trae las variables POST*/
    public $_idconjprta;
    public $_idconjrpta;
    public $_idcapitulo;
    public $_idformato;
    public $_idversion;
    public $_idjunta;
    public $_tablerpta = "fd_respuesta";
    public $_relaciones;
    public $_tipo11;
    public $_agrupadas;
    public $multiples;
    
    /*Enviar id_conj_prta
     * id_conj_rpta
     * id_capitulo
     */
    public function guardar(){
        
        $_vectorpost=$this->_vcapitulo;
        $_programadas=[1,3,4,5,6,7,8,2,11,15,26];
       
        if(!empty($this->_relaciones)){
            
            $_vpasspregunta=explode("%%",$this->_relaciones);
            
            /*Iniciando Transaccion*/
            $_transaction = Yii::$app->db->beginTransaction();
            try {
                foreach($_vpasspregunta as $_clguardar){

                    /*Aqui se debe ir la funcion segun el tipo de pregunta
                     * la variable $_clguardar es un string que trae
                     * name_input ::: id_pregunta ::: id_tpregunta ::: id_respuesta
                     * cada funcion de guardar por tipo se denomina gr_tipo...
                     */

                    $_ldata=explode(":::",$_clguardar);

                    //Recogiendo codigos SQL
                    //Se envia a la funcion de acuerdo al tipo
                    // @name_input "0"
                    // @id_pregunta 
                    // @id_tpregunta
                    // @id_respuesta ==========================//
                    
                    /*Asociando Respuesta*/
                    $_nameq = 'rpta'.$_ldata[0];
                    
                    
                    
                    if(!empty($_ldata[2]) and in_array($_ldata[2], $_programadas) === TRUE and isset($_vectorpost['Detcapitulo'][$_nameq])){
                        
                        
                        //Yii::trace("Llegan tipos de preguntas ".$_ldata[2]." Para idpregunta ".$_ldata[1],"DEBUG");
                       /*Recogiendo Id_respuesta si existe*/ 
                       $_idrespuesta=(!empty($_ldata[3]))? $_ldata[3]:'';
                       $id_pregunta= $_ldata[1];
                       $this->_idcapitulo =  $_ldata[4];
                       
                      
                        /*Armando Trama SQL segun el tipo de pregunta*/
                        $_valor = $_vectorpost['Detcapitulo'][$_nameq];
                        
                        //Yii::trace("que respuestas llegan ".$_valor,"DEBUG");
                        
                        if(isset($this->_agrupadas[$id_pregunta])){
                            
                            /*1) Buscando si existe una respuesta asociada a la agrupacion*/
                            $idrpta_2a =  Yii::$app->db->createCommand(
                                                    'SELECT id_respuesta FROM fd_respuesta
                                                     LEFT JOIN fd_pregunta ON fd_pregunta.id_pregunta = fd_respuesta.id_pregunta
                                                     WHERE fd_pregunta.id_agrupacion= :agrupacion 
                                                     and fd_respuesta.id_conjunto_pregunta= :idconjprta 
                                                     and fd_respuesta.id_conjunto_respuesta= :idconjrpta
                                                     and fd_respuesta.id_capitulo= :idcapitulo
                                                     and fd_respuesta.id_formato = :idformato
                                                     and fd_respuesta.id_version = :idversion ')
                                                    ->bindValues([
                                                        ':idconjrpta' => $this->_idconjrpta,
                                                        ':idcapitulo' =>$this->_idcapitulo,
                                                        ':idformato' =>$this->_idformato,
                                                        ':idconjprta' => $this->_idconjprta,
                                                        ':idversion' =>$this->_idversion, 
                                                        ':agrupacion' =>$this->_agrupadas[$id_pregunta],
                                                    ])->queryOne();
                             
                            $_idrespuesta = $idrpta_2a['id_respuesta'];
                            
                            /*2) Si existe respuesta asociada se envia como _idrespuesta*/
                            
                            $v_rpta= $this->{"gr_tipo2a"}($_idrespuesta,$_valor,$id_pregunta);          //Preguntas tipo 2 agrupadas
                            $_ldata[1]= $v_rpta[2];
                            
                        }else{
                            
                             //Averiguando si la pregunta es tipo multiple y si la respuesta es null si es asi 
                            //Salta a la siguiente pregunta
                            if(!empty($this->multiples[$id_pregunta]) and empty($_valor)){
                                continue;
                            }else if(!empty($this->multiples[$id_pregunta]) and !is_null($_valor)){
                               $_idrespuesta=''; 
                            } 
                            
                            /*Si la pregunta es tipo 3 se averigua si la respuesta es tipo especifique*/
                            $_otros=null;
                            if($_ldata[2]=='3' and isset($_vectorpost['Detcapitulo']['otros_'.$_ldata[0]])){
                                
                                $_otros = $_vectorpost['Detcapitulo']['otros_'.$_ldata[0]];
                                $v_rpta= $this->{"gr_tipo".$_ldata[2]}($_idrespuesta,$_valor,$_otros);
                                
                            }else{
                             
                               if($_ldata[2]==11 and isset($this->_tipo11[$_nameq])){
                                   $_valor=count($this->_tipo11[$_nameq]);
                                   $v_rpta= $this->{"gr_tipo".$_ldata[2]}($_idrespuesta,$_valor);
                               }else if ($_ldata[2]!=11 and !isset($this->_tipo11[$_nameq])){
                                   $v_rpta= $this->{"gr_tipo".$_ldata[2]}($_idrespuesta,$_valor,$_otros,$id_pregunta);
                               }else{
                                   continue;
                               }                               
                            }
                        }    
                       
                       /*Asignando valor == null*/
                       $v_rpta[1]=(!isset($v_rpta[1]))? NULL:$v_rpta[1];
                        
                       
                       /*Generado comando SQL*/
                       if(!empty($v_rpta[0])){
                           
                        if(empty($this->_idjunta))$this->_idjunta=0;
                        if(is_null($_otros)){   
    
                            if (strpos($v_rpta[0], ';') !== false) {
                               $sep_qu = explode(";", $v_rpta[0]);
                             
                                  Yii::$app->db->createCommand($sep_qu[0])
                                    ->bindValues([
                                     ':valor' => $v_rpta[1],
                                     ':idconjrpta' => $this->_idconjrpta,
                                     ':idpregunta' => $_ldata[1],
                                     ':idtpregunta' => $_ldata[2],
                                     ':idcapitulo' =>$this->_idcapitulo,
                                     ':idformato' =>$this->_idformato,
                                     ':idconjprta' => $this->_idconjprta,
                                     ':idversion' =>$this->_idversion,
                                     ':idjunta' =>$this->_idjunta,
                                   ])->execute();
                                  
                                   Yii::$app->db->createCommand($sep_qu[1])
                                    ->bindValues([
                                     ':valor' => $v_rpta[1],
                                   ])->execute();
                              
                              
                            }
                            else
                            {
                                Yii::$app->db->createCommand($v_rpta[0])
                                    ->bindValues([
                                     ':valor' => $v_rpta[1],
                                     ':idconjrpta' => $this->_idconjrpta,
                                     ':idpregunta' => $_ldata[1],
                                     ':idtpregunta' => $_ldata[2],
                                     ':idcapitulo' =>$this->_idcapitulo,
                                     ':idformato' =>$this->_idformato,
                                     ':idconjprta' => $this->_idconjprta,
                                     ':idversion' =>$this->_idversion,
                                     ':idjunta' =>$this->_idjunta,
                                   ])->execute();
                            }
                            
                            
                        }else{                            
                            Yii::$app->db->createCommand($v_rpta[0])
                                    ->bindValues([
                                     ':valor' => $v_rpta[1],
                                     ':idconjrpta' => $this->_idconjrpta,
                                     ':idpregunta' => $_ldata[1],
                                     ':idtpregunta' => $_ldata[2],
                                     ':idcapitulo' =>$this->_idcapitulo,
                                     ':idformato' =>$this->_idformato,
                                     ':idconjprta' => $this->_idconjprta,
                                     ':idversion' =>$this->_idversion,
                                     ':idjunta' =>$this->_idjunta,
                                     ':otros' =>$_otros,   
                                   ])->execute();
                        }

                        /*Se averigua con que id quedo guardada la respuesta si es tipo 11 -> guarda en SOP SOPORTE*/
                        if($_ldata[2]=='11' and !empty($this->_tipo11[$_nameq])){

                            $id_rpta =  Yii::$app->db->createCommand(
                                                     'SELECT id_respuesta FROM fd_respuesta '
                                                     . 'WHERE id_pregunta = :_prta'
                                                     . ' and fd_respuesta.id_conjunto_pregunta= :idconjprta 
                                                      and fd_respuesta.id_conjunto_respuesta= :idconjrpta
                                                      and fd_respuesta.id_capitulo= :idcapitulo
                                                      and fd_respuesta.id_formato = :idformato
                                                      and fd_respuesta.id_version = :idversion' )
                                                     ->bindValues([
                                                        ':_prta' => $_ldata[1], 
                                                        ':idconjrpta' => $this->_idconjrpta,
                                                        ':idcapitulo' =>$this->_idcapitulo,
                                                        ':idformato' =>$this->_idformato,
                                                        ':idconjprta' => $this->_idconjprta,
                                                        ':idversion' =>$this->_idversion, 
                                                     ])->queryOne();


                             foreach($this->_tipo11[$_nameq] as $_cltp11){

                                 $_vctp11=explode(":::",$_cltp11);
                                 $_namefile = $_vctp11[0].".".$_vctp11[2];

                                 $_sqlSOP="INSERT INTO sop_soportes ([[ruta_soporte]],[[titulo_soporte]],[[tamanio_soportes]],[[id_respuesta]]) VALUES (:ruta, :titulo, :tamanio, :_idrpta)";

                                 Yii::$app->db->createCommand($_sqlSOP)
                                                 ->bindValues([
                                                  ':ruta' => $_vctp11[1],
                                                  ':titulo' => $_namefile,
                                                  ':tamanio' => $_vctp11[3],
                                                  ':_idrpta' => $id_rpta["id_respuesta"],
                                                ])->execute();

                             }
                            
                            }
                            /*Fin guardando en SOP_SOPORTES para tipo 11*/
                       
                       } 
                    }

                }
                
               
                
                $_transaction->commit();
                
            }catch (\Exception $e) {
                $_transaction->rollBack();
                throw $e;
                return FALSE;
            } catch (\Throwable $e) {
                $_transaction->rollBack();
                throw $e;
                return FALSE;
            }    
            
        }
        return TRUE;
    }
    
    
    /*Funcion para guardar una respuesta a una pregunta tipo Multiple
     * Aplica para: Tipo 1->Fecha
     */
    public function guardartipoM($tipo,$valor,$id_conjrpta,$id_prta,$id_capitulo,$id_fmt,$id_conj_prta,$id_version){
        

        $_sql = $this->{"gr_tipo".$tipo}('',$valor,$id_prta);
        $_transaction = Yii::$app->db->beginTransaction();
        try {
            
            Yii::$app->db->createCommand($_sql[0])
                                   ->bindValues([
                                    ':valor' => $valor,
                                    ':idconjrpta' => $id_conjrpta,
                                    ':idpregunta' => $id_prta,
                                    ':idtpregunta' => $tipo,
                                    ':idcapitulo' =>$id_capitulo,
                                    ':idformato' =>$id_fmt,
                                    ':idconjprta' => $id_conj_prta,
                                    ':idversion' =>$id_version,
                                    ])->execute();
            
            $_transaction->commit();
            $lastInsertID = Yii::$app->db->getLastInsertID();
            return [TRUE,$lastInsertID];
         }catch (\Exception $e) {
            $_transaction->rollBack();
            throw $e;
            return FALSE;
        } catch (\Throwable $e) {
            $_transaction->rollBack();
            throw $e;
            return FALSE;
        }       
            
        
        
    }
    
    
    /*Funcion para borrar una respuesta a una pregunta tipo Multiple*/
    public function deletetipoM($id_rpta){
        
        $g_sql = "DELETE FROM fd_respuesta WHERE id_respuesta=".$id_rpta;
        $_transaction = Yii::$app->db->beginTransaction();
        
        try {
            Yii::$app->db->createCommand($g_sql)->execute();
            $_transaction->commit();
            return TRUE;
        }catch (\Exception $e) {
            $_transaction->rollBack();
            throw $e;
            return FALSE;
        } catch (\Throwable $e) {
            $_transaction->rollBack();
            throw $e;
            return FALSE;
        }          
        
    }
    
   /*Funcion para guardar las respuestas
    * en la tabla FD_RESPUESTA PARA tipo FECHA
    * Se guarda o se modifica en la BD:
    * 
    */
    
    function gr_tipo1($_idrespuesta,$valor){
        
        $tableRpta=$this->_tablerpta;
        $g_sql='';
        
        if(!empty($valor)){
            $_datarespt="TO_DATE(:valor,'".Yii::$app->fmtfechasql."')";
        }else{
            $_datarespt=":valor";
            $valor=null;
        }
        
        if(empty($_idrespuesta) and isset($valor)){
            $g_sql="INSERT INTO $tableRpta ([[ra_fecha]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]], [[id_junta]]) VALUES ($_datarespt, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion, :idjunta)";
        }
        else if(!empty($_idrespuesta) and isset($valor)){
            $g_sql="UPDATE $tableRpta SET [[ra_fecha]] = $_datarespt,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion, [[id_junta]]= :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }
        else if(!empty($_idrespuesta) and empty($valor)){
            $g_sql="UPDATE $tableRpta SET [[ra_fecha]] = $_datarespt,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion, [[id_junta]]= :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }else{
            $g_sql="";
        }  
        
        $_valor = $valor;
        return [$g_sql,$_valor];
    }
    
    function gr_tipo2($_idrespuesta,$valor){
        
        $tableRpta=$this->_tablerpta;
        
        if(empty($_idrespuesta)){
            $g_sql="INSERT INTO $tableRpta ([[ra_check]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
        }else{
            $g_sql="UPDATE $tableRpta SET [[ra_check]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion, [[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }
        $_valor="";
        if($valor=='1'){
            $_valor = 'S';
        }else if($valor=='0'){
           $_valor = 'N'; 
        }
        
        return [$g_sql,$_valor];
    }
    
    function gr_tipo2a($_idrespuesta,$valor){
        
        $tableRpta=$this->_tablerpta;
        
        /*1) Buscar si existe una rpta asociada al valor seleccionado en el radio button*/
        
        
        if(empty($_idrespuesta)){
            $g_sql="INSERT INTO $tableRpta ([[ra_check]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]], [[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion, :idjunta)";
        }else{
            $g_sql="UPDATE $tableRpta SET [[ra_check]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion, [[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }
        
        if(isset($valor)){
            $_valor = 'S';
            $_idpregunta = $valor;
            return [$g_sql,$_valor,$_idpregunta];
        }else{
            return false;
        }
        
        
    }
    
    /*Funcion para guardar las respuestas
    * en la tabla FD_RESPUESTA PARA tipo SELECTONE
    * Se guarda o se modifica en la BD:
    * 
    */
    function gr_tipo3($_idrespuesta,$valor,$_otros=null){
        $tableRpta=$this->_tablerpta;
        
        if(empty($_idrespuesta) and isset($valor) and !is_null($_otros)){
             $g_sql="INSERT INTO $tableRpta ([[id_opcion_select]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[ra_otros]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:otros,:idjunta)";
        }else if(empty($_idrespuesta) and isset($valor)){
            $g_sql="INSERT INTO $tableRpta ([[id_opcion_select]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
        }
        else if(!empty($_idrespuesta)and isset($valor) and !is_null($_otros)){
            $g_sql="UPDATE $tableRpta SET [[id_opcion_select]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion,[[ra_otros]] = :otros, [[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }
        else if(!empty($_idrespuesta) and isset($valor)){
            $g_sql="UPDATE $tableRpta SET [[id_opcion_select]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion, [[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }else{
            $g_sql="";
        }  
        
        $_valor = $valor;
        
         if (is_numeric($_valor)) { 
         return [$g_sql,$_valor];
        }else{
         return [$g_sql,NULL];
        } 
    }
    
    /*Funcion para guardar las respuestas
    * en la tabla FD_RESPUESTA PARA tipo DESCRIPCION
    * Se guarda o se modifica en la BD:
    * 
    */
    function gr_tipo4($_idrespuesta,$valor){
        $tableRpta=$this->_tablerpta;
        $valor = str_replace(array('"=""'), '', $valor);
        
        if(empty($_idrespuesta)){
            $g_sql="INSERT INTO $tableRpta ([[ra_descripcion]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]], [[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
        }else{
            $g_sql="UPDATE $tableRpta SET [[ra_descripcion]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion, [[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }    
        
        $_valor = $valor;
        return [$g_sql,$_valor];
    }
    
    /*Funcion para guardar las respuestas
    * en la tabla FD_RESPUESTA PARA tipo ENTERO
    * Se guarda o se modifica en la BD:
    * 
    */
    
    function gr_tipo5($_idrespuesta,$valor){
        
        $tableRpta=$this->_tablerpta;
        if(empty($_idrespuesta) and isset($valor)){
            $g_sql="INSERT INTO $tableRpta ([[ra_entero]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
        }else if(!empty($_idrespuesta) and isset($valor)){
            $g_sql="UPDATE $tableRpta SET [[ra_entero]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion, [[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }else{
            $g_sql="";
        }      
        
        /*Guardando $_valor para tipo entero se realiza el cambio por si el entero trae
        separadores de miles */
        $_valor=str_replace(",","",$valor);
        $_valor=str_replace(".","",$_valor);
        
        if (is_numeric($_valor)) { 
         return [$g_sql,$_valor];
        }else{
         return [$g_sql,NULL];
        } 
        
       
    }
    
    /*Funcion para guardar las respuestas
    * en la tabla FD_RESPUESTA PARA tipo DECIMAL
    * Se guarda o se modifica en la BD:
    * 
    */
    function gr_tipo6($_idrespuesta,$valor){
        
        $tableRpta=$this->_tablerpta;
        
        
        
        if(empty($_idrespuesta) and isset($valor)){
            $g_sql="INSERT INTO $tableRpta ([[ra_decimal]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
        }else if(!empty($_idrespuesta) and isset($valor)){
            $g_sql="UPDATE $tableRpta SET [[ra_decimal]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion, [[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }else{
            $g_sql="";
        }     
        
        /*Quitando separadores de miles ","*/
        $_valor=str_replace(",","",$valor);
        
        if (is_numeric($_valor)) { 
         return [$g_sql,$_valor];
        }else{
         return [$g_sql,NULL];
        } 
        
        
        
    }
    
    /*Funcion para guardar las respuestas
    * en la tabla FD_RESPUESTA PARA tipo PORCENTAJE
    * Se guarda o se modifica en la BD:
    * 
    */
    
    function gr_tipo7($_idrespuesta,$valor){
        $tableRpta=$this->_tablerpta;
        
        if(empty($_idrespuesta) and isset($valor)){
            $g_sql="INSERT INTO $tableRpta ([[ra_porcentaje]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
        }else if(!empty($_idrespuesta) and isset($valor)){
            $g_sql="UPDATE $tableRpta SET [[ra_porcentaje]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion,[[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }else{
            $g_sql="";
        }       
        
        /*Quitando separadores de miles ","*/
        $_valor=str_replace(",","",$valor);
        
         if (is_numeric($_valor)) { 
         return [$g_sql,$_valor];
        }else{
         return [$g_sql,NULL];
        } 
    }
    
    /*Funcion para guardar las respuestas
    * en la tabla FD_RESPUESTA PARA tipo MONEDA
    * Se guarda o se modifica en la BD:
    * 
    */
    
    function gr_tipo8($_idrespuesta,$valor){
        
        $tableRpta=$this->_tablerpta;
        if(empty($_idrespuesta) and isset($valor)){
            $g_sql="INSERT INTO $tableRpta ([[ra_moneda]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
         }else if(!empty($_idrespuesta) and isset($valor)){
            $g_sql="UPDATE $tableRpta SET [[ra_moneda]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion,[[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }else{
            $g_sql="";
        }       
        
        $_valor = $valor;
        
        if (is_numeric($_valor)) { 
         return [$g_sql,$_valor];
        }else{
         return [$g_sql,NULL];
        } 
    }
    
    function gr_tipo9(){
        return "modelo de guardado para preguntas tipo 1";
    }
    
    function gr_tipo10(){
        return "modelo de guardado para preguntas tipo 1";
    }
    
    function gr_tipo11($_idrespuesta,$valor){
      
        $tableRpta=$this->_tablerpta;
     
        
        if(empty($_idrespuesta)){
            $g_sql="INSERT INTO $tableRpta ([[cantidad_registros]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
        }else{
            $g_sql="UPDATE $tableRpta SET [[cantidad_registros]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion,[[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        } 
        
        $_valor = $valor;
         
        return [$g_sql,$_valor];
    }
    
    function gr_tipo12(){
        return "modelo de guardado para preguntas tipo 1";
    }
    
    function gr_tipo13(){
        return "modelo de guardado para preguntas tipo 1";
    }
    
     function gr_tipo14(){
        return "modelo de guardado para preguntas tipo 1";
    }
    
    /*Funcion para guardar las respuestas
    * en la tabla FD_RESPUESTA PARA tipo DESCRIPCION
    * Se guarda o se modifica en la BD:
    * 
    */
    function gr_tipo15($_idrespuesta,$valor,$_otros=null,$id_pregunta=""){
        $tableRpta=$this->_tablerpta;
        if(empty($_idrespuesta) and isset($valor)){
            $g_sql="INSERT INTO $tableRpta ([[ra_descripcion]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
            if($id_pregunta==1318)
            {
                        $id_conj_resp= $this->_idconjrpta;
                        $enti = \common\models\autenticacion\Entidades::find()->where(['=', 'entidades.id_entidad', $id_conj_resp])->one();
                        $iden= $enti['identificacion'];
                        $g_sql.="; UPDATE USUARIOS_AP SET [[usuario_digitador]]=:valor WHERE [[identificacion]] ='$iden';";
            }
        }else if(!empty($_idrespuesta) and isset($valor)){
            $g_sql="UPDATE $tableRpta SET [[ra_descripcion]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion, [[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
            if($id_pregunta==1318)
            {
                        $id_conj_resp= $this->_idconjrpta;
                        $enti = \common\models\autenticacion\Entidades::find()->where(['=', 'entidades.id_entidad', $id_conj_resp])->one();
                        $iden= $enti['identificacion'];
                        $g_sql.="; UPDATE USUARIOS_AP SET [[usuario_digitador]]=:valor WHERE [[identificacion]] ='$iden';";
            }
        }else{
            $g_sql="";
        }   
        
        $_valor = $valor;
        return [$g_sql,$_valor];
    }
    
    /*Funcion para guardar las respuestas
    * en la tabla FD_RESPUESTA PARA tipo TEXTAREA
    * Se guarda o se modifica en la BD:
    * 
    */
    function gr_tipo26($_idrespuesta,$valor){
        $tableRpta=$this->_tablerpta;
        
        if(empty($_idrespuesta)){
            $g_sql="INSERT INTO $tableRpta ([[ra_descripcion]],[[id_conjunto_respuesta]],[[id_pregunta]],[[id_tpregunta]],[[id_capitulo]],[[id_formato]],[[id_conjunto_pregunta]],[[id_version]],[[id_junta]]) VALUES (:valor, :idconjrpta, :idpregunta, :idtpregunta, :idcapitulo, :idformato,:idconjprta,:idversion,:idjunta)";
        }else{
            $g_sql="UPDATE $tableRpta SET [[ra_descripcion]] = :valor,[[id_conjunto_respuesta]] = :idconjrpta,[[id_pregunta]] = :idpregunta ,[[id_tpregunta]] = :idtpregunta,[[id_capitulo]] = :idcapitulo,[[id_formato]] = :idformato,[[id_conjunto_pregunta]] = :idconjprta,[[id_version]] = :idversion,[[id_junta]] = :idjunta WHERE [[id_respuesta]] = ".$_idrespuesta;
        }    
        
        $_valor = $valor;
        return [$g_sql,$_valor];
    }
    
}

