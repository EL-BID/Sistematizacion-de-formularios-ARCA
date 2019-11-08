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
		<h1><a href="#">Formularios Dinámicos POC</a></h1>
	</div>
	<div id="menu">
		<h2>Formato HTML</h2>
        <p>Módulo: Formularios dinámicos POC</p>
				<ul>
                                    <li><a href="#1">Generalidades</a></li>
                                    <li><a href="#2">Controlador</a></li>
                                    <li><a href="#3">helperHTML</a></li>
				</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Formato HTML</h2>
				
        
				<a name="1">
					<h3>Generalidades</h3>
				</a>
                                    <p>El acceso a formato HTML se da desde gestor formatos en la opcion Formato, este controlador
                                        se encarga de crear el string HTML para poder obtener los archivos de exportacion a Excel, PDF o Word.</p>
                                
                                
                                <a name="2">
                                    <h3>Controlador</h3>
                                </a>
                                
                                <p> El controlador de formato html se encuentra en el frontend y se llama DetformatoController.php, se accede
                                    a traves de la funcion actionGenhtml, si se desea dar una vista de solo consulta al usuario, si lo que se desea
                                    es genera un archivo de exportacion de alguno capitulo o de un formato completo se llamarà a la clase designada
                                    de acuerdo al tipo de archivo a generar:
                                    
                                    <li>$id_conj_rpta: id del conjunto respuesta del formato que se quiere obtener
                                        el string html.</li>
                                    <li>$id_conj_prta: id del conjunto pregunta del formato que se quiere obtener el string html.</li>
                                    <li>$id_fmt: id del formato que se quiere obtener el string html.</li>
                                    <li>$last: version del formato.</li>
                                    <li>$estado: estado del formato.</li>
                                    <li>$vista: link de vista anterior para la miga de pan, si es nulla retorna el string a la funcion que hizo el llamado ver linea 270 del controlador.</li>
                                    <li>$capitulo: null si se quiere un formato completo, o el id_capitulo si se desea solo un capitulo.</li>
                                </p>
                                
                                
                                <a name="3">
                                 <h3>helperHTML</h3>
                                </a>     
                                    
                                    <p>Dentro del clase helperHTML se encuentra la funcion gen_formatoHTML, la cual se encarga de crear el "string html", solicitando la siguiente informacion:</p>
                                     
                                  
                                   <li>$_capitulos : Array de los capitulos con dos elementos de informacion por cada capitulo id_capitulo y nom_capitulo
                                   tomados de la tabla fd_capitulo.</li>
                                   <li>$r_preguntans: array de la preguntas sin seccion con la informacion de la  tabla fd_preguntas y fd_respuestas.</li>
                                   <li>$r_secciones: array de las secciones asociadas al capitulo informacion de la tabla fd_secciones.</li>
                                   <li>$r_pregunta: array de las preguntas asociadas a las secciones.</li>
                                   <li>$formanumber: 'S' si se debe numerar las preguntas del formato 'N' si no se numeran.</li>
                                   <li>$_permisos: array de los permisos del usuario en session.</li>
                                   <li>$_modelogenerales: modelo general para los datos asociadoas al capitulo INFORMACION GENERAL, vacio si no es necesario</li>
                                   <li>$modelpreguntas: modelo generado a través del modelo detcapitulo.</li>
                                   
                                   
                                   <p style="color:red"> Para obtener el string se llama la funcion genhtml del controlador formatoHTML con la informacion presentada
                                       anteriormente, las explicaciones del helperHTML se dan para comprender la clase</p>
                                   
                                           
                                
                                    
                                        
                                
                                     
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
