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
		<h2>Componente Tooltip:</h2>
		<p>Módulo: Javascript</p>
				<ul>
					<li><a href="#0">Funcion Javascript</a></li>
					<li><a href="#1">Tooltip</a><a href="../index.php?r=tooltip/index" class="colora">Demo</a></li>
				</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Componente Tooltip:</h2>
				

				<p>Para el funcionamiento del tooltip se crea una funcion en javascript dentor del archivo /frontend/web/js/yioverride.js; la funcion se deja definida para uso en cualquier vista.</p>

				<blockquote>
						<img src="images/img30.jpg"/>
				</blockquote>


				<a name="0">
					<h3>Tooltip Ejemplo</h3>
				</a>




					<blockquote>
						<?= highlight_file('../../views/wiki/tooltip/index.php');	?>
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
