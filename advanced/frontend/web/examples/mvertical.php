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
		<h2>Componente Menu Vertical</h2>
		<p>Módulo: Javascript</p>
		
		<ul>
			<li><a href="#0">Estilos CSS</a></li>
			<li><a href="#1">Agregar Links</a><a href="../index.php?r=lview/list" class="colora">Demo</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
				<h2>Componente Menú Vertical:</h2>
				<p>Clase: yii\bootstrap\NavBar</p>
				<p>       kartik\sidenav\SideNav</p>
				
				<a name="0">
					<h3>Estilos CSS</h3>
				</a>
				<p>Para asignar una columna vertical que permita agregar el menú se hizo necesario modificar la plantilla original de YII, basados en la explicación de estilos a continuación http://getbootstrap.com/css/; la plantilla original se encuentra en /frontend/views/layouts/main.php</p>

					<blockquote>
							<img src="images/img32.jpg"/>
					</blockquote>

				<p>Código en main.php</p>

				<blockquote>
						<?= highlight_file('../../views/wiki/layouts/main.php');	?>
				</blockquote>


				<a name="1">
					<h3>Agregar Links</h3>
				</a>
				<p>El menú vertical se puede cambiar en cada vista, para esto se debe crear el parámetro itemsmn y agregar los datos de enlaces.</p>
				<blockquote>
						<?= highlight_file('../../views/wiki/lview/list.php');	?>
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
