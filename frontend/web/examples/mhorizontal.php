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
		<h1><a href="#">Componente Javascript 1</a></h1>
	</div>
	<div id="menu">
		<h2>Componente Menú Horizontal</h2>
		<p>Módulo:Javascript</p>
		
		<ul>
			<li><a href="#0">Estilos CSS</a></li>
			<li><a href="#1">Agregar Links</a><a href="../index.php" class="colora">Demo</a></li>
			<li><a href="#2">Fomulario en el Menu</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
				<h2>Componente Menú Horizontal:</h2>
				<p>Clase: yii\bootstrap\NavBar</p>
				<p>       yii\bootstrap\Nav</p>
				<ul>
					<li><a href="#0">Estilos CSS</a></li>
					<li><a href="#1">Agregar Links</a><a href="../index.php" class="colora">Demo</a></li>
					<li><a href="#2">Fomulario en el Menú</a></li>
				</ul>
				
				<p>Para este componente se modifico el archivo /web/layouts/main.php, se utilizo el modelo /common/models/LoginForm.php y el controlador /controller/SiteController.php en la funcion actionLogin; se utilizar el modulo popover para la visualización del Formulario en el menu.</p>
				
				
				<a name="0">
					<h3>Estilos CSS</h3>
				</a>
				<p>Se modifica la función de estilos CSS que trae por defecto para dar el color azul a la barra de menu, para esto se crea un nuevo archivo de estilos en /web/css/basic.css y se agrega al /assets/AppAsset.php.</p>
				
				<blockquote>
						<?= highlight_file('../../web/css/basic.css');	?>	
				</blockquote>
				
				<p>Código en /assets/AppAsset.php</p>
				
				<blockquote>
						<?= highlight_file('../../assets/AppAsset.php');	?>	
				</blockquote>
				
				
				<a name="1">
					<h3>Agregar Links</h3>
				</a>
				<p>Los link se agregan en el archivo /frontend/views/layouts/main.php dentro del NavBar que describe el menu horizontal a través del array que contiene los items, label=> es el atributo para la visualización de link y url la ruta.</p>
				<blockquote>
						<?= highlight_file('../../views/layouts/main.php');	?>	
				</blockquote>
				
				
				<a name="2">
					<h3>Formulario en Menu</h3>
				</a>
				<p>Para incluir un formulario en el menu, se utiliza PopoverX, se debe tener en cuenta que los comando del widget ACTIVE FORM, por tanto se utiliza BEGIN::FORM y para la validez del modelo se utiliza Html::activeInput en cada uno de los modulos del formulario, el codigo en la imagen a continuación se asigna dentro de la barra de navegación, ver main.php; este formulario realiza las validaciones despues del envio.</p>
				
					<blockquote>
							<img src="images/img31.jpg"/>
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
