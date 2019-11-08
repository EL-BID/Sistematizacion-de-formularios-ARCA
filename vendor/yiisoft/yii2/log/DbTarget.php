<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\log;

use Yii;
use yii\db\Connection;
use yii\base\InvalidConfigException;
use yii\di\Instance;
use yii\helpers\VarDumper;
use yii\helpers\Json;

/**
 * DbTarget stores log messages in a database table.
 *
 * The database connection is specified by [[db]]. Database schema could be initialized by applying migration:
 *
 * ```
 * yii migrate --migrationPath=@yii/log/migrations/
 * ```
 *
 * If you don't want to use migration and need SQL instead, files for all databases are in migrations directory.
 *
 * You may change the name of the table used to store the data by setting [[logTable]].
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DbTarget extends Target
{
    /**
     * @var Connection|array|string the DB connection object or the application component ID of the DB connection.
     * After the DbTarget object is created, if you want to change this property, you should only assign it
     * with a DB connection object.
     * Starting from version 2.0.2, this can also be a configuration array for creating the object.
     */
    public $db = 'db';
    /**
     * @var string name of the DB table to store cache content. Defaults to "log".
     */
    public $logTable = 'aud_auditoria';


    /**
     * Initializes the DbTarget component.
     * This method will initialize the [[db]] property to make sure it refers to a valid DB connection.
     * @throws InvalidConfigException if [[db]] is invalid.
     */
    public function init()
    {
        parent::init();
        $this->db = Instance::ensure($this->db, Connection::className());
    }

    
    /*Modificacion al modelo de guardado de mensajes en la base de datos*/
    
    public function export()
    {
        $tableName = $this->db->quoteTableName($this->logTable);
        
        $sql= "INSERT INTO $tableName ([[usuario]],[[fecha_hora]],[[texto]],[[ip_origen]],[[json]],[[accion]],[[id_tevento]],[[pagina]],[[id_tmensaje]]) VALUES (:usuario, :prefix, :texto, :iporigen, :json, :accion, :evento, :pagina, :idtmensaje)";
  
        $fp=fopen("../config/log/log".date('Y-m-d').".txt", "a+");
        $ip_server="";
        
        $command = $this->db->createCommand($sql);
        foreach ($this->messages as $message) {
            
            list($text, $level, $category, $timestamp) = $message;
            $band=0;                                                    //Bandera para guardar mensaje en BD
            
            //Estructurando por Categoria===========================================================================
            
            if (!is_string($text)) {
                
                // exceptions may not be serializable if in the call stack somewhere is a Closure
                if ($text instanceof \Throwable || $text instanceof \Exception) {
                    $text = (string) $text;
                    
                    
                    //Sacando nombre y mensaje del error============================================================
                    $valdata1 = strstr($text, ' in ', true);
                    $extrac_dt=explode("'",$valdata1);
                    if($extrac_dt[0]=="exception"){
                        $verrordata=array();
                        $band=1;
                    }
                    
                    $name_e=$extrac_dt[1];
                    $message_e=$extrac_dt[3];
                    
                    
                    $id_PDO=stripos($name_e,"PDO");
                    if($id_PDO === false){
                        $code_e=0;
                    }else{
                        $code_e= substr(strstr(strstr($message_e, ']', true),'['),1);
                    }
                    
                    
                    $verrordata["name"]=$name_e;
                    $verrordata["message"]=$message_e;
                    $verrordata["code"]=$code_e;
                    $verrordata["status"]=$category;
                    $verrordata["pagina"]=substr(strstr($message_e,":"),2);
                    
                    
                    if(strpos($category,"HttpException") !== FALSE){
                        $verrordata["tevento"]="2";                         //TIPO DE EVENTO:SISTEMA
                    }else if(strpos($category,"db\Exception") !== FALSE){
                        $verrordata["tevento"]="3";                         //TIPO DE EVENTO: TRAZABILIDAD
                    }else if(strpos($category,"DEBUG") !== FALSE){
                        $verrordata["tevento"]="4";                         //TIPO DE EVENTO: DEPURACION
                    }else if(strpos($category,"ERROR") !== FALSE){
                        $verrordata["tevento"]="5";                         //TIPO DE EVENTO: ERROR
                    }
                    
                    
                    
               }else {
                    $text = VarDumper::export($text);
               }
               
               
            }else{
                
                //Guardando IP del servidor=================================================================================
                if(!empty($_SERVER["HTTP_HOST"])){
                    $ip_server=$_SERVER["HTTP_HOST"];
                }
                
                
                //Obteniendo Pagina=========================================================================================
                if(!empty($_GET['r'])){
                    $pagina=$_GET['r'];
                }
                
                //Organizando informacion para JSON==========================================================================
                $v_inter=explode("\n\n\$_",$text);
               
                for($ct=0;$ct<count($v_inter);$ct++){
                    
                    $title=strstr($v_inter[$ct], '=',true);         //Obteniendo titulo para el vector
                    $posigual=strpos($v_inter[$ct],'= ')+4;            //Obteniendo posicion del igual para limpiar string
                    $valdata2=substr($v_inter[$ct],$posigual,-2);      //Limpiando string $_GET=['r'=>'aaaaa'] solo se obtiene ['r'=>'aaaaa']
                            
                    $verrordata["datatext"][$title]=explode("\n",$valdata2);
 
                }
               
            }
            
            
            //Obteniendo datos Prefijaods IP, USUARIO, TIEMPO=====================================================================
            $varadd1=$this->getMessagePrefix($message);
            $v_prefijo=explode("@",$varadd1);
            $verrordata["ip"]=$v_prefijo[1];
            $verrordata["user"]=$v_prefijo[2];
            
            $datafinal=json_encode($verrordata, JSON_PRETTY_PRINT);
            fwrite($fp, $datafinal.PHP_EOL."===================".PHP_EOL);
            //=====================================================================================================================
            
            
            
            //Verificando IP del servidor en IP VALIDAS PARA GUARDAR EN AUD_AUDITORIA=============================================
            $v_ipvalidate=explode("::",$v_prefijo[3]);

            if(in_array($ip_server, $v_ipvalidate) && !empty($verrordata["message"]) ){
                    
                $command->bindValues([
                    ':usuario' => $v_prefijo[2],
                    ':prefix' => $v_prefijo[0],
                    ':texto' => $verrordata["message"],
                    ':iporigen' =>$v_prefijo[1],
                    ':json' =>$datafinal,
                    ':accion' =>$verrordata["status"],
                    ':evento' => $verrordata["tevento"],
                    ':pagina' =>$pagina,
                    ':idtmensaje' => 1,
                 ])->execute();
            }
            //==================================================================================================================//    
           
        }
        fclose($fp);

    }
    
    
}
