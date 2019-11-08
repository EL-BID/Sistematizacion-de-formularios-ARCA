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

//Funcion adb_rest(@method,@params);

include("restconsume.php");         //Inclusion de la funcion

// Example para @IngresarSistema
$params=['dbautista','192.168.5.36','clientesprueba/create'];
$responce=adb_rest("1",$params);
echo "Respuesta Ejemplo Ingreso al Sistema:<br/>".$responce."<br/><br/>";


// Example para @consultaPagina
$params=['dbautista','192.168.5.36','clientesprueba/create'];
$responce=adb_rest("2",$params);
echo "Respuesta Ejemplo Consulta Pagina:<br/>".$responce."<br/><br/>";


// Example para @dataBase - Consulta
$params=['dbautista','192.168.5.36','clientesprueba/create','6','SELECT * FROM basedata'];
$responce=adb_rest("3",$params);
echo "Respuesta Ejemplo Base de Datos:<br/>".$responce."<br/><br/>";

// Example para @dataBase - Insert
$params=['dbautista','192.168.5.36','clientesprueba/create','7','INSERT INTO table ....'];
$responce=adb_rest("3",$params);
echo "Respuesta Ejemplo Base de Datos:<br/>".$responce."<br/><br/>";

// Example para @dataBase - Modificar
$params=['dbautista','192.168.5.36','clientesprueba/create','8','UPDATE table SET ....'];
$responce=adb_rest("3",$params);
echo "Respuesta Ejemplo Base de Datos:<br/>".$responce."<br/><br/>";

// Example para @depuracion - Eliminar
$params=['dbautista','192.168.5.36','clientesprueba/create'];
for($a=0;$a<10;$a++){
    $params[3]=(empty($params[3]))? $a."::": $params[3].$a."::";
}
$responce=adb_rest("4",$params);
echo "Respuesta Ejemplo Depuracion:<br/>".$responce."<br/><br/>";

// Example para @error - Modificar
$params=['dbautista','192.168.5.36','clientesprueba/create','Erro HTTP del server','yii\web\HttpException:100'];
$responce=adb_rest("5",$params);
echo "Respuesta Ejemplo Error:<br/>".$responce."<br/><br/>";





