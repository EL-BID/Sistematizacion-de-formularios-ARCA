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
		<h1><a href="#">Generadores Gii</a></h1>
	</div>
	<div id="menu">
		<h2>Configuración de generadores</h2>
		<p>Módulo: Generadores</p>
			<ul>
				<li><a href="#0">Configuración de nuevos generadores</a></li>
				<li><a href="#1">Ajustes de Generadores</a></li>
				<li><a href="#2">Selección de nuevos generadores</a></li>
			</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
				<h2>Configuración de generadores</h2>
				<p>Generadores código personalizado</p>
							
                                <br></br><br></br>
				<a name="0">Configurar nuevos Generadores</a>
				
				<p>El primer paso que se debe realizar es la configuración de los nuevos generadores de codigo fuente, es necesario indicarle a Gii cuel es el nuevo generador y donde esta ubicado. 
                                    Esta configuracion puede indicar desde una nueva carpeta de plantillas dentro de un generador ya existente o un generador totalmente nuevo.
                                    <br></br>
                                    Para realizar la configuracion se debe buscar el archivo correspondiente de acuerdo a la version de Yii que se este utilizando, si esta es la Basic, el archivo debe estar e la ruta config\web.php.
                                    En caso de ser la avanzada, se tienen 3 posibles rutas, si este nueco generador solo va a afectar solo el front o el backend, se reealiza la configuracion en el archivo main-local.php correspondiente;
                                    pero si lo que se quiere es un cambio global la configuracion debe realizarce en el archivo que se encuentra en la ruta common\config\main.php
                                    <br></br>
                                    Como se ve acontinuacion se debe agregar el key para Gii, e ir indicando los diferentes generadores, en esta configuracion se ve la que se realizó para los nuevos generadores del model y del CRUD que se va a utilizar en el proyecto de la ARCA.
                                    Los generadores se colocaron en la misma ruta de los que viene actualmente con Gii pero estos pueden ser ubicados en donde se desee, aunque se aconseja mantener la estructura para no tener inconvenientes.
                                    
                                   </p>
													
						<blockquote>
									<?= highlight_file('../../../common/config/main.php');	?>			
						</blockquote>
						
				<br></br><br></br>
				<a name="1">Ajustes de Generadores</a>
				
				<p>Para los generadores de la ARCA, se tomaron los ya existentes y se colocaron en las carpetas crudARCA y modelArca.
                                Como se ve en la imagen crudARCA se encuentrarn en la ruta /yiisoft/yii2-gii/generators/crudARCA, y para este se crearon 5 plantillas nuevas para las clases a utilizar, y 2 para las clases de pruebas unitarias.
                                
                                </p>
					
                                    <img src="images/crudARCA.png" />
				
				<p>El archivo Generator.php es una versión modficada del que trae la plantilla advanced de Yii2, este es el encargado de obtener e instanciar los objetos y los valores que van a ser utilizados por la plantillas, por consiguiente es la calve de la generacion, en este se incluyeron los atributos necesarios para generar las clases; la funcion donde se realiza el renderizado y geeracion de las clases con las plantillas es generate().</p>
				
                                    <img src="images/generate.png" />
                                 
                                    <p>Con los valores obtenidos en Generator.php la plantilla se encarga de imprimir y crear el código fuente basico, como se ve en el siguiente ejemplo:</p>
                                    
                                    <img src="images/plantilla.png" />
                                 
                                  <p>Para el generador de modelos se crearon 3 plantillas para la generacion del codigo fuente y una para la creacion de pruebas unitarias:</p>
                                    
                                   <img src="images/modelARCA.png" />
                                 
                                   
                                   <br></br><br></br><br></br>
				
				<a name="2">Selección de nuevos generadores</a>
				
				<p>Una vez este configurado y creado el nuevo generador, ya es posible seleccionarlo en Gii. Al entrar por ejemplo en el generador del model en la parte inferior debe aprecer el combobox que se ve en la imagen, aqui se puede seleccionar entre cualqueira delos generadores que se tengan configurados, en la imagen se puede apreciar que se puede elegir un generador llamado default o un generador llamado modelARCA.
                                    <br></br> En este combobox apareceran tantos generadores para modelo se tengan configurados.
                                </p>
						
					<img src="images/selectGenerator.png" />
			
				
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
