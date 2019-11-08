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
			<li class="first"><a href="#" accesskey="1" title="">Componente Javascript</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
				<h2>Aplicacion Beta:</h2>
				<ul>
                                    <li><a href="#1">Configuracion de la base de datos</a><a href="sql/poc.sql" class="colora">Archivo SQL AQUI</a></li>
                                    <li><a href="#2">Modelos</a></li>
                                    <li><a href="#3">Controladores</a></li>
                                    <li><a href="#4">Vistas</a></li>
				</ul>
				
				
				
				<a name="1">
					<h3>Configuracion de la base de datos</h3>
				</a>
					<ol>
						<li>Se agrega nueva conexion a la base de datos con el fin de no deshabilitar los anteriores ejemplos de la wiki, la conexion se denomina db2, y se encuentra en ../../common/config/main-local.php
							<blockquote>
									<?= highlight_file('../../../common/config/main-local.php');	?>	
							</blockquote>
						</li>
						<li>El archivo SQL a ejecutar contiene solo una relacion creada para probar que corresponde a lo presentado en la imagen.
                                                    <img src="images/img51.jpg">
						</li>
					</ol>
				
				
				<a name="2">
					<h3>Modelos</h3>
				</a>	
					<ol>
						<li>Los modelos utilizados aqui son para los filtros dado que se construye es una pagina de consulta, la tabla a continuacion presenta los modelos realizados,
                                                    y el codigo en el cual son usados.
                                                    <table>
                                                        <tr>
                                                            <td>Codigo de Uso</td>
                                                            <td>Modelo</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Vista _form.php</td>
                                                            <td>frontend\models\Provincias</td>
                                                        </tr>
                                                        <tr>
                                                            <td>frontend\models\Formato</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">FiltrosController</td>
                                                            <td>frontend\models\Cantones</td>
                                                        </tr>
                                                        <tr>
                                                            <td>frontend\models\Parroquias</td>
                                                        </tr>
                                                        <tr>
                                                            <td>frontend\models\Admestado</td>
                                                        </tr>
                                                         <tr>
                                                            <td>frontend\models\Trperiodo</td>
                                                        </tr>
                                                        
                                                    </table>
						</li>
					</ol>
                                
                                <a name="3">
					<h3>Controladores</h3>
				</a>	
					<ol>
						<li>FiltrosController: controlador destinado para los filtros (se separa solo por organizar el ejemplo, todo se puede en un solo controlador), en este controlador se realizan las
                                                    consultas a la base de datos de los combobox que presenta la pagina, los cuales depende de selecciones de otros combobox.
                                                    <blockquote>
									<?= highlight_file('../../controllers/FiltrosController.php');	?>	
						   </blockquote>
						</li>
                                            
                                                <li>AplicativoController: Este controlador se encarga de llenar la grilla a través de un dataprovider en la funcion Grilla, y presenta el index en la funcion index, tener en cuenta que la grilla
                                                    se llena desde la vista "index.php" y los parametros se envian via AJAX a la funcion "Grilla" que llena el dataprovider y envia los datos a la vista _grilla, que es cargada en el div con id->resultados.
                                                    
                                                    <blockquote>
									<?= highlight_file('../../controllers/AplicativoController.php');	?>	
						   </blockquote>
						</li>
					</ol>
                                
                                <a name="4">
					<h3>Vistas</h3>
				</a>	
					<ol>
						<li>index.php: Esta vista solo hace un llamado a la vista _form2.php
                                                    <blockquote>
									<?= highlight_file('../../views/aplicativo/index.php');	?>	
						   </blockquote>
						</li>
                                            
                                                <li>_form2.php: Esta en la vista principal la cual contiene los filtros con las acciones onchange, y una accion javascript .ajax, que carga en el div resultados la vista _grilla, esto
                                                    se realiza con el fin de no perder la seleccion de los filtros realizada por el usuario.
                                                    
                                                    <blockquote>
							<?= highlight_file('../../views/aplicativo/_form2.php');	?>	
						   </blockquote>
						</li>
                                            
                                                <li>_grilla.php: Esta vista solo contiene la grilla que es cargada en resultados una vez se piden datos.
                                                    
                                                    <blockquote>
							<?= highlight_file('../../views/aplicativo/_grilla.php');	?>	
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
