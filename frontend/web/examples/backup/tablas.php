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

				<h2>Componente Formulario:</h2>
				<p>Clase YII: GridView</p>
				<ul>
					<li><a href="#1">Tabla con Datos desde un array</a><a href="../index.php?r=lview/list" class="colora">Demo</a></li>
					<li><a href="#2">Tabla con Datos desde una consulta SQL</a><a href="../index.php?r=clientes/index" class="colora">Demo</a></li>
				</ul>



				<a name="1">
					<h3>Tabla con Datos desde un Array</h3>
				</a>
					<ol>
						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/LviewController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/LviewController.php');	?>
							</blockquote>
						</li>
						<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/lview/list.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/lview/list.php');	?>
							</blockquote>
						</li>
					</ol>


				<a name="2">
					<h3>Tabla con Datos desde una consulta SQL</h3>
				</a>
					<ol>
						<li>Modelo 1: Para poder obtener la información de una tabla en particular SQL primero se debe crear el modelo asociado a la tabla "Frontend o Backend/models/Clientes.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/Clientes.php');	?>
							</blockquote>
						</li>
						<li>Modelo 2: Para habilitar los filtros de busqueda por campo se debe crear un modelo que direccione los filtros "Frontend o Backend/models/ClientesSearch.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/ClientesSearch.php');	?>
							</blockquote>
						</li>
						<li>Controlador: Se debe realizar el controlador que maneje las acciones a ejecutar en la vista "Frontend o Backend/controllers/ClientesController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/ClientesController.php');	?>
							</blockquote>
						</li>
						<li> Vista: Ahora se realizará la vista de usuario donde se presentará el GridView
							<blockquote>
									<?= highlight_file('../../views/wiki/clientes/index.php');	?>
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
