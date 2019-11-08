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
		<h2>Barra de Progreso</h2>
		<p>Módulo: Javascript</p>
			<ul>
				<li><a href="#0">Instalación de la Clase</a></li>
				<li><a href="#1">Barra de Progreso</a><a href="../index.php?r=reloaddata/pbar" class="colora">Demo</a></li>
			</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Barra de Progreso:</h2>
				<p>Clase YII: Pace YII</p>
				

				<a name="0"><h3>Instalación de la Clase</h3></a>
					<p>Para intalar dentro del composer.json ubicado en la raíz del proyecto verifique la información que aparece seleccionada en la siguiente figura:</p>
					<img src="images/img40.jpg" />

					<p>Luego desde la consola ubicada en la raiz del proyecto (donde se encuentra el archivo composer.json ejecute "composer update" como se ve en la siguiente imagen</p>
					<img src="images/img16.jpg" />


                                        <p> El ejemplo se presenta en una ventana emergente pero se puede utilizar tanto en la vista principal como en emergentes</p>

				<a name="1">
					<h3>Utilizar la Barra de Progreso</h3>
				</a>
					<ol>
						<li>La barra de progreso se debe asignar el parte superior de la vista antes de ejecutar cualquier acción, esta barra detecta la finalización de los script PHP, HTML y Javascript que se ejecuten en la vista.


						<blockquote>
									<?= highlight_file('../../views/wiki/reloaddata/list.php');	?>
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
