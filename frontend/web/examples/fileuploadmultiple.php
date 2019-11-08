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
		<h2>Componente Carga de Archivos (Múltiples Archivos):</h2>
		<p>Módulo: Javascript</p>
		<ul>
			<li><a href="#1">Gestor de Archivos Multiples</a><a href="../index.php?r=fileuploadmultiple" class="colora">Demo</a></li>
            <li><a href="#4">SQL</a>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Componente Carga de Archivos (Múltiples Archivos):</h2>
				<p>Clase YII: Fileupload</p>
				

                                <p> Los cambios a realizar para aceptar multiples archivos no son muchos con respecto a 1 solo archivo, a continuacion se muestran las diferencias
                                    entre los archivos realizados</p>

                                <p> Para tener en cuenta:</p>
                                <ul>
                                    <li>Modelo: Se agrega el parametro "maxFiles" en el cual se indicará el maximo de archivos que puede subir el usuario,si se coloca en 0
                                        indica que no hay limite de archivos para subir, pero se debe tener en cuenta el parametro <a href='http://php.net/manual/es/ini.core.php#ini.max-file-uploads'>max_file_uploads </a> del php.ini que por defecto
                                        es 20, "maxFiles" no puede superar el parametro indicado alli.
                                    </li>
                                    <li>Modelo: Luego se debe modificar en el modelo en la funcion upload() para que suba archivo por archivo</li>
                                    <li>Vista: En la vista se debe agregar el opcion multiple dentro del fileinput, y se debe indicar que el parametro del modelo
                                        se transforma en un array "field($model, 'imageFiles[]')", para no confundir se modifico el nombre de la propiedad del objeto
                                    de imageFile a imageFiles, en los tres elementos vista,modelo, controlador.</li>
                                    <li>Controlador: Se modifica UploadedFile::getInstance() por UploadedFile::getInstances(), con el fin de cargar al modelo el objeto tipo
                                        array de archivos</li>

                                </ul>

				<a name="1">
					<h3>Gestor de Archivos</h3>
				</a>
					<ol>
						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/FileuploadmultipleController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/FileuploadmultipleController.php');	?>
							</blockquote>
						</li>
                                                <li>Modelo: Crear el siguiente modelo en el "Frontend o Backend/models/Fileuploadmultiple.php"
							<blockquote>
									<?= highlight_file('../../../common/models/wiki/Fileuploadmultiple.php');	?>
							</blockquote>
						</li>
						<li>Vista Index: Crear la siguiente vista en el "Frontend o Backend/views/fileuploadmultiple/index.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/fileuploadmultiple/index.php');	?>
							</blockquote>
						</li>
                                                <li>Vista Create: Crear la siguiente vista en el "Frontend o Backend/views/fileuploadmultiple/create.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/fileuploadmultiple/create.php');	?>
							</blockquote>
						</li>
					</ol>


				<a name="4">
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
