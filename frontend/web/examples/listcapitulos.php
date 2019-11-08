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
		<h2>Listado Capitulo</h2>
        <p>Módulo: Formularios Dinámicos POC</p>
				<ul>
                    <li><a href="#1">Generalidades</a></li>
                    <li><a href="#2">Controlador</a></li>
                    <li><a href="#3">helperHTML</a></li>
				</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Listado Capitulo</h2>
				<a name="1">
					<h3>Generalidades</h3>
				</a>
                                    <p>El acceso a listado capitulo se obtiene desde la vista del gestor de formato, cuando tipo_view = '3', al
                                    dar clic en Ver el gestor de formatos presenta un cuadro de confirmacion para el acceso:</p>
                                
                                <img src="images/img66.JPG" />
                                
                                
                                <a name="2">
                                    <h3>Controlador</h3>
                                </a>
                                
                                <p> El controlador de listado capitulo se encuentra en el frontend y se llama ListcapitulosController.php, se accede
                                    a traves de la funcion Index, enviando el siguiente grupo de variables, se adjunta un ejemplo:
                                </p>
                                
                                <ul>
                                    <li>'id_conj_rpta' => '1': id del conjunto de respuestas seleccionado en gestor formatos.</li>
                                    <li>'id_conj_prta' => '1': id del conjunto pregunta relacionado al formato seleccionado.</li>
                                    <li>'id_fmt' => '1': id del formato seleccionado.</li>
                                    <li>'last' => '1': id de la version de formato solicitado.</li>
                                    <li>'estado' => '1': id del estado del formato solicitado.</li>
                                    <li>'provincia' => '4': seleccion en el combo provincia en gestor formatos.</li>
                                    <li>'cantones' => '': seleccion en el combo cantones en gestor formatos.</li>
                                    <li>'parroquias' => '': seleccion en el combo parroquias en gestor formatos.</li>
                                    <li>'periodos' => '': seleccion en el combo periodoe en gestor formatos.</li>
                                </ul>
                                
                                <a name="3">
                                 <h3>helperHTML</h3>
                                </a>     
                                    
                                    <p>Dentro del clase helperHTML se encuentra la funcion gen_listcapitulos, la cual se encarga de crear la vista
                                        de listado capitulos "string html", solicitando la siguiente informacion:</p>
                                     
                                   <li>$_arraydata : Array de los capitulos con dos elementos de informacion por cada capitulo id_capitulo y nom_capitulo
                                   tomados de la tabla fd_capitulo.</li>
                                   <li>$id_conj_rpta: el id conjunto respuesta del formato seleccionado en la anterior vista.</li>
                                   <li>$id_conj_prta: el id conjunto pregunta del formato sleeccionado en la anterior vista para la session.</li>
                                   <li>$id_fmt: el id del formato selecciona en la anterior vista.</li>
                                   <li>$last: la version solicitada en la anterior vista.</li>
                                   <li>$estado: el estado del formato seleccionado en la anterior vista.</li>
                                   <li>$antvista: para este caso es listcapitulos/index</li>
                                   <li>$_permisosuser: el vector de permisos del usuario tomado de la tabla fd_Adm_estado.</li>
                                     
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
