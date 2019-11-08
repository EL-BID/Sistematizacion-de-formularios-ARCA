<?php
// Initialize options for REST interface
//@method = 1 -> IngresarSistema
//@method = 2 -> consultaPagina
//@method = 3 -> dataBase
//@method = 4 -> debug 
//@method = 5 -> Error

//@params: Parametros recolectados segun el metodo
//@params para methtod 1 -> [$usuario,$ip_origen,$pagina]
//@params para methtod 2 -> [$usuario,$ip_origen,$pagina]
//@params para methtod 3 -> [$usuario,$ip_origen,$pagina,$tiposql,$sqltrama]
        //@tiposql-> 6- SELECT, 8-UPDATE, 9-DELETE, 7-INSERT
//@params para methtod 4 -> [$usuario,$ip_origen,$pagina,$texto]
//@params para methtod 5 -> [$usuario,$ip_origen,$pagina,$texto]


$adb_url="127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=rest/create";
$timehour=date('Y-m-d H:m:s');

function adb_rest($method,$params=NULL){
    global $adb_url, $timehour;

    $curl = curl_init();
    
    
    /*ORGANIZACION DE LOS METODOS ===========================================================*/
    if($method=="1" and isset($params)){
        
        $json='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "INGRESO AL SISTEMA",
            "id_tevento" : "2",
            "id_tmensaje" : "10",
            "fecha_hora" : "'.$timehour.'",
            "accion" : "INGRESO",
            "pagina" : "'.$params[2].'"
        }';
        
        $jsonbd=json_encode($json);
        
        $json_send='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "INGRESO AL SISTEMA",
            "json" : "'. addslashes($jsonbd).'",
            "id_tevento" : "2",
            "id_tmensaje" : "10",
            "fecha_hora" : "'.$timehour.'",
            "accion" : "INGRESO",
            "pagina" : "'.$params[2].'"
        }';
        
    
        
    }else if($method=="2" and isset($params)){
        
        
        $json='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "CONSULTA A PAGINA",
            "id_tevento" : "3",
            "id_tmensaje" : "10",
            "fecha_hora" : "'.$timehour.'",
            "accion" : "CONSULTA",
            "pagina" : "'.$params[2].'"
        }';
        
        $jsonbd=json_encode($json);
        
        $json_send='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "CONSULTA A PAGINA:",
            "json" : "'. addslashes($jsonbd).'",
            "id_tevento" : "3",
            "id_tmensaje" : "10",
            "fecha_hora" : "'.$timehour.'",
            "accion" : "CONSULTA",
            "pagina" : "'.$params[2].'"
        }';
        
    }else if($method=="3" and isset($params)){
        
        $json='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "SQL: '.$params[4].'",
            "id_tevento" : "3",
            "id_tmensaje" : "'.$params[3].'",
            "fecha_hora" : "'.$timehour.'",
            "pagina" : "'.$params[2].'"
        }';
        
        $jsonbd=json_encode($json);
        
        $json_send='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "SQL",
            "json" : "'. addslashes($jsonbd).'",
            "id_tevento" : "3",
            "id_tmensaje" : "'.$params[3].'",
            "fecha_hora" : "'.$timehour.'",
            "pagina" : "'.$params[2].'"
        }';
        
    }else if($method=="4" and isset($params)){
        
        $json='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "'.$params[3].'",
            "id_tevento" : "2",
            "id_tmensaje" : "4",
            "fecha_hora" : "'.$timehour.'",
            "pagina" : "'.$params[2].'"
        }';
        
        $jsonbd=json_encode($json);
        
        $json_send='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "'.$params[3].'",
            "json" : "'. addslashes($jsonbd).'",
            "id_tevento" : "2",
            "id_tmensaje" : "4",
            "fecha_hora" : "'.$timehour.'",
            "pagina" : "'.$params[2].'"
        }';
        
    }else if($method=="5" and isset($params)){
        
         $json='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "'.$params[3].'",
            "id_tevento" : "2",
            "id_tmensaje" : "2",
            "accion" : "'.$params[4].'",
            "fecha_hora" : "'.$timehour.'",
            "pagina" : "'.$params[2].'"
        }';
        
        $jsonbd=json_encode($json);
        
        $json_send='{ 
            "usuario": "'.$params[0].'",
            "ip_origen": "'.$params[1].'",
            "texto" : "'.addslashes($params[3]).'",
            "json" : "'. addslashes($jsonbd).'",
            "id_tevento" : "2",
            "id_tmensaje" : "2",
            "accion" : "'.addslashes($params[4]).'",
            "fecha_hora" : "'.$timehour.'",
            "pagina" : "'.$params[2].'"
        }';
        
        
    }else{
        return("Error no existe el método indicado");
    }
        
        

    curl_setopt_array($curl, array(
      CURLOPT_URL => $adb_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 15,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $json_send,
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: a415a1ea-b9be-373f-e392-15d3b19fc649"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      $sal_json=json_decode($response, true);  
      unset($sal_json["id"]);
      unset($sal_json["json"]);
      return json_encode($sal_json,JSON_PRETTY_PRINT);
    }
    
    
}


?>
