<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
	Design by TEMPLATED
	http://templated.co
	Released for free under the Creative Commons Attribution License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Manual YII Demos</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="outer">
	<div id="header">
		<h1><a href="#">Manual YII</a></h1>
	</div>
	<div id="menu">
		<ul>
			<li class="first"><a href="#" accesskey="1" title="">Generacion Excel</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
				<h2>Creacion de Excel</h2>
				<p>Clase: common\general\documents\genExcel</p>
				<ul>
					<li><a href="#1">Gneracion Excel HTML </a><a href="../index.php?r=documentoexcel/create" class="colora" target='blank'>Demo</a></li>
					<li><a href="#1">Gneracion Excel Modelos</a><a href="../index.php?r=documentoexcel/model" class="colora" target='blank'>Demo</a></li
					
				</ul>
				
				<a name="1">
					<h3>Instalación Librerias</h3>
				</a>
					<ol>
						<li>Libreria kmoonlandsoft/yii2-phpexcel: 
                                                    
                                                    <p>La librearia que genera los documentos Excel se realizo modificando y basandose en el widget de moonlandsoft/yii2-phpexcel. Debido a lo anterior se hace necesario primero la intalacion de kartik-v/yii2-mpdf mediante la ejecucion de los siguientes comandos:</p>
                                                    <p>En Linux<br/>
                                                        <pre>php composer.phar require --prefer-dist moonlandsoft/yii2-phpexcel "*"</pre></p>
                                                    <p>En Windows<br/>
                                                    <pre>composer require --prefer-dist moonlandsoft/yii2-phpexcel "*"</pre></p>
                                                    <p>Se deja como back up la libreria ExcelARCA al final de esta sección, en caso de actualizar la libreria moonlandsoft/yii2-phpexcel realizar merge con los ajustes realizados para ARCA</p>
						</li>
						
						<li>Uso de la clase: 
                                                    <p>La clase contiene dos funcionalidades, la primera sirve para generar documentos Excel basandose en contenido HTML, y la seguda mediante el manejo de modelos.
                                                    <br/>En el controlador donde se quiera utilizar alguna de estas dos funcionalidades, se deben llamar las siguientes funciones:</p>
                                                    <p>Basado en HTML:</p>
                                                    <pre>  $GeneraExcel->generadorExcelHTML($datos,$nombre,$destino);</pre>
                                                    <p>Donde:
                                                         <br/>
                                                         
                                                         * $datos es un STRING o un ARRAY de STRING con el Contenido HTML del Excel
                                                        <br/> * $nombre es un STRING con el Nombre del archivo excel, si el destino es un archivo se debe colocar el path completo
                                                        <br/> * $destino es un String con la información del destino, en este caso si se desea descargar o crear en el servidor como archivo 
                                                        
                                                    </p>
                                                    <p>Basado en Modelos:</p>
                                                    <pre>  $GeneraExcel->generadorExcel($datos,$columnas,$nombre,$destino,$encabezados);</pre>
                                                    <p>Donde:
                                                         <br/>
                                                         
                                                         * $datos es un MODEL o ARRAY de MODEL con las cosnultas a la base de datos
                                                        <br/> * $columnas es un STRING o ARRAY de STRING (en caso que datos sea array ) con el nombre de las columnas que se quieren usar en cada modelo
                                                        <br/> * $nombre es un STRING con el Nombre del archivo excel, si el destino es un archivo se debe colocar el path completo
                                                        <br/> * $destino es un String con la información del destino, en este caso si se desea descargar o crear en el servidor como archivo 
                                                        <br/> * $encabezados es un ARRAY de STRING (en caso que datos sea array ) con el nombre nuevo que se le desea poner a las columnas
                                                        
                                                        
                                                    </p>
						</li>

                                                <li>Parametros de las funciones de Excel: 
                                                    
                                                    <p>Para la correcta generacion de las hojas de excel, es necesario definir correctamente los parametros en las funciones, para esto se mostrara con mas detalle como utilizarlo
                                                    <p> *Datos: <br></br>
                                                        Son los datos que se desean enviar a excel, ya sea por modelo o por HTML. Se puede presentar dos casos, que se quiere una sola hoja en el excel o varias de estas. Para el segundo caso se deben crear las variables como Arrays
                                                        <pre> Para HTML:<br>
Si es una sola hoja
$datos='html'
Si son Multiples Hojas
$datos = [
'sheet1' => 'html', 
'sheet2' => 'html', 
'sheet3' => 'html'
];

<br>
<br>
Para Models:<br>
Si es una sola hoja
$datos=$model
Si son Multiples Hojas
$datos = [
'sheet1' => $model1, 
'sheet2' => $model2, 
'sheet3' => $model3
];
Los valores en 'sheet1'... son los titulos con los que se generan las hojas.
                                                        </pre></p>
                                                     <p> *Columnas: <br></br>
                                                        En caso de ser generación de Excel con modelos, se puede enviar opcionalmente cuales son las columnas de la consulta que se quieren mostrar, pero esto varia de acuerdo a si el modelo es uno solo o es un array, asi:
                                                        <pre>Si es una sola hoja
$columnas = ['column1','column2','column3'];

Si son Multiples Hojas
$columnas=['sheet1' => ['column1','column2','column3'], 
'sheet2' => ['column1','column2','column3'], 
'sheet3' => ['column1','column2','column3']];
En este caso los nombres deben coincidir con los indicados en datos.
                                                        </pre></p>
                                                        <p> *Encabezados: <br></br>
                                                        En caso de querer cambiar los nombres de las columnas en la hoja se procede a enviar la siguiente variable:
                                                        <pre>Si es una sola hoja
$encabezado = ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'];

Si son Multiples Hojas
$encabezado = [
        'sheet1' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'], 
        'sheet2' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'], 
        'sheet3' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3']
];
                                                        </pre></p>
                                                        
						<li>Código fuente de la libreria:
                                                    <p>EL siguiente es el codigo fuente de la libreria generada</p>
							<blockquote>
									<?= highlight_file('../../../common/general/documents/genExcel.php');	?>	
							</blockquote>
						</li>
                                                        
                                                <li>Código fuente del widget modificado:
                                                    <p>EL siguiente es el codigo fuente de la libreria generada</p>
							<blockquote>
									<?= highlight_file('../../../vendor/moonlandsoft/yii2-phpexcel/ExcelARCA.php');	?>	
							</blockquote>
						</li>
						
						
					</ol>
			
				

					
				
				
			</div>
		</div>
		<div id="secondaryContent">
			<ul>
					<?php include("menu.php"); ?>			
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<div id="footer">
		<p>Manual YII 2017-03-26</p>
	</div>
</div>
</body>
</html>
