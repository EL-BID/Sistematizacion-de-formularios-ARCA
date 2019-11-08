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
		<h1><a href="#">Componente Javascript 2</a></h1>
	</div>
	<div id="menu">
		<h2>Componente Carga de Archivos (EJEMPLO PARA 1 SOLO ARCHIVO AL TIEMPO):</h2>
		<p>Módulo: Javascript</p>
		<ul>
			<li><a href="#1">Gestor de Archivos</a><a href="../index.php?r=fileupload" class="colora">Demo</a></li>
            <li><a href="#4">SQL</a>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Componente Carga de Archivos (EJEMPLO PARA 1 SOLO ARCHIVO AL TIEMPO):</h2>
				<p>Clase YII: Fileupload</p>
				<ul>
					<li><a href="#1">Gestor de Archivos</a><a href="../index.php?r=fileupload" class="colora">Demo</a></li>
                    <li><a href="#4">SQL</a>
				</ul>

                                <!--<p> Se realiza el modelo a mano, es exactamente lo mismo que realizandolo con el CRUD, la unica diferencia es que por aparte
                                    existiria el modelo "fileuploadCRUD" solo con la funcion upload(), en este caso con el CRUD se tendrian tres modelos el modelo de la tabla
                                    que guarda la ubicacion aqui llamada "hoja_vida", el modelo search de hoja_vida, y el modelo que no es basado de fileuload solo
                                    con el contenido a continuación, el resto de funciones desaparece:

                                    <blockquote>
					<?= highlight_file('../../models/wiki/FileuploadCRUD.php');	?>
                                    </blockquote>
                                </p>-->

				<a name="1">
					<h3>Gestor de Archivos</h3>
				</a>
					<ol>
						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/FileuploadController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/FileuploadController.php');	?>
							</blockquote>
						</li>
                                                <li>Modelo: Crear el siguiente modelo en el "Frontend o Backend/models/Fileupload.php"
							<blockquote>
									<?= highlight_file('../../../common/models/wiki/Fileupload.php');	?>
							</blockquote>
						</li>
						<li>Vista Index: Crear la siguiente vista en el "Frontend o Backend/views/fileupload/index.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/fileupload/index.php');	?>
							</blockquote>
						</li>
                                                <li>Vista Create: Crear la siguiente vista en el "Frontend o Backend/views/fileupload/create.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/fileupload/create.php');	?>
							</blockquote>
						</li>
					</ol>


				<a name="2">
					<h3>SQL</h3>
				</a>
                                <blockquote>
                                    <?= highlight_file('gestorfilesql/file.sql');	?>

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
