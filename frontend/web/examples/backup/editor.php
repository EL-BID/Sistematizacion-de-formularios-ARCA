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

				<h2>Componente Editor:</h2>
				<p>Clase YII: redactor with yii</p>
				<ul>
					<li><a href="#0">Tabla en Base de Datos para Funcionamiento</a></li>
					<li><a href="#1">Editor</a><a href="../index.php?r=editor/index" class="colora">Demo</a></li>
					<li><a href="#2">Subir Imagenes y Archivos</a></li>
				</ul>

				<p>El editor de texto enriquecido es una personalización de YII por tanto no se encuentra dentro del CRUD.</p>

				<a name="0">
					<h3>Modelo de Base de Datos</h3>
				</a>

				<p>Para el funcionamiento del ejemplo se ha creado la tabla comentarios que se encuentra relaciona con los clientes:</p>
					<blockquote>
							<img src="images/img14.jpg"/>
					</blockquote>


				<a name="1">
					<h3>Vista Editor</h3>
				</a>

					<blockquote>
						<?= highlight_file('../../views/wiki/editor/editor.php');	?>
					</blockquote>


					<h3>Controlador</h3>
					<blockquote>
						<?= highlight_file('../../controllers/wiki/editorController.php');	?>
					</blockquote>

					<h3>Modelo</h3>
					<blockquote>
						<?= highlight_file('../../models/wiki/comentarios.php');	?>
					</blockquote>

				<a name="2">
					<h3>Subir Imagenes y Archivos</h3>
				</a>
				<p>Para que el editor permita el cargue de archivos e imagenes se debe configurar el archivo /common/main.php, la carpeta se debe crear con permisos de lectura y escritura.</p>
					<blockquote>
						<?= highlight_file('../../../common/config/main.php');	?>
					</blockquote>




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
