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

				<h2>Componente TabIndex:</h2>
				<p>Clase YII: html Options</p>
				<ul>
					<li><a href="#0">Ejemplo de Uso</a><a href="../index.php?r=tabs/tabs" class="colora">Demo</a></li>
				</ul>


				<ol>
					<li>Controlador: Para el funcionamiento no se ejecutaran cambios en el contrador, todo se efectuará en la vista:</p>

					<blockquote>
								<?= highlight_file('../../controllers/wiki/TabsController.php');	?>
					</blockquote>
					</li>

					<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/tabs/form.php"
						<blockquote>
								<?= highlight_file('../../views/wiki/tabs/form.php');	?>
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
