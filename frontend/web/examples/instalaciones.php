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
			
				<h2>Instalaciones Previas:</h2>
				<p>Como Instalar las clases para el funcionamiento:</p>
				<ul>
					<li><a href="#0">Modificaciones al Composer.json en la raíz del proyecto</a></li>
					<li><a href="#1">Actualización via consola</a></li>
					<li><a href="#2">Creación del Archivo JS</a></li>
					<li><a href="#3">Modificar Archivo Asset</a></li>
					<li><a href="#4">Modificar Archivo Main</a></li>
					<li><a href="#5">Cambios en las plantillas por Defecto para el CRUD</a></li>
				</ul>
				
				
				<a name="0">Modificar Composer.json</a>
				
				<p>Modificar el archivo composer.json en la raiz del proyecto como se muestra en el siguiente codigo, los items que cambian se encuentran en la imagen siguiente, se agrega el archivo completo para comparación:
					<img src="images/img17.jpg" />
									
						<blockquote>
									<?= highlight_file('../../../composer.json');	?>			
						</blockquote>
						
				
				<a name="1">Actualización Via Consola</a>
				
				<p>Luego desde la consola ubicada en la raiz del proyecto (donde se encuentra el archivo composer.json ejecute "composer update" como se ve en la siguiente imagen</p>
					
					<img src="images/img16.jpg" />
				
				<p>ANOTACION:  SI PRESENTA ERROR DE ACTUALIZACION EXECUTE SOBRE LA RAIZ DEL PROYECTO composer global require "fxp/composer-asset-plugin:@dev"</p>
				
				<a href="#2">Creación del Archivo JS</a>
				
				<p>Cree una carpeta denominada "js" en la carpeta "web", cada vez que se hace referencia a @web el sistema busca la carpeta @web del frontend, como se muestra en la imagen:</p>
					<img src="images/img18.jpg" />
					
					
				<p>Una vez creada la carpeta agregue el archivo "yiioverride.js" </p>
				
					<blockquote>
						<?= highlight_file('../js/yiioverride.js');	?>			
					</blockquote>
					
					
				<a name="3">Modificar Archivo ASSET</a>
				
				<p>En la carpeta frontend/assets se encuentra el archivo AppAsset en esta carpeta debemos agregar el componente js/yiioverride:</p>
					<img src="images/img19.jpg" />
					
					<blockquote>
						<?= highlight_file('../../assets/AppAsset.php');	?>			
					</blockquote>
					
				
				<a name="4">Modificar Archivo main.php</a>
				
				<p>En la carpeta common/config se encuentra el archivo main.php el cual se debe configurar como se muestra a continuación:</p>
						
					<blockquote>
						<?= highlight_file('../../../common/config/main.php');	?>			
					</blockquote>
                                
                                
                                <a name="5">Plantilla del CRUD</a>
				
				<p>Se modifican los archivos de la plantilla de CRUD, ubicados en "vendor\yiisoft\yii2-gii\generators\crud\default" el archivo controller.php y los archivos internos en view (se dejan los archivos por defecto con el indicativo "old"), y se modifica el generador de modelos "vendor\yiisoft\yii2-gii\generators\model":</p>
				
                                <a name="6">Plantilla layout/main.php</a>
				
				<p>En la carpeta frontend/views/layouts/main.php se modifica la plantilla del aplicativo para generar los espacios para Menu Vertical y Menu Horizontal, al igual que el menu:</p>
						
					<blockquote>
						<?= highlight_file('../../views/layouts/main.php');	?>			
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
