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
		<h2>Componente Gráficas</h2>
		<p>Módulo: Javascript</p>
		<ul>
			<li><a href="#0">Instalación de la Clase</a></li>
			<li><a href="#1">Grafica Pie</a><a href="../index.php?r=graph/indexpie" class="colora">Demo</a></li>
			<li><a href="#2">Grafica Bar</a><a href="../index.php?r=graph/indexbar" class="colora">Demo</a></li>
			<li><a href="#3">Grafica Lineal</a><a href="../index.php?r=graph/indexline" class="colora">Demo</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Componente Gráficas</h2>
				<p>Clase YII: redactor with yii</p>
				
				<a name="0"><h3>Instalación de la Clase</h3></a>
					<p>Para intalar dentro del composer.json ubicado en la raíz del proyecto verifique la información que aparece seleccionada en la siguiente figura:</p>
					<img src="images/img15.jpg" />

					<p>Luego desde la consola ubicada en la raiz del proyecto (donde se encuentra el archivo composer.json ejecute "composer update" como se ve en la siguiente imagen</p>
					<img src="images/img16.jpg" />

					<p>Para ver los demos tenga en cuenta tener creada la base de datos <a href='examples/createbd.php'>Creando Base de Datos</a></p>


				<a name="1">
					<h3>Grafica Pie (X,Y)</h3>
				</a>
					<ol>
						<li>Controlador: Para crear un modelo de grafica se debe crear el siguiente controlador con la funcion actionIndexpie:</p>

						<blockquote>
									<?= highlight_file('../../controllers/wiki/GraphController.php');	?>
						</blockquote>
						</li>

						<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/graph/graphpie.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/graph/graphpie.php');	?>
							</blockquote>
						</li>


					</ol>


				<a name="2">
					<h3>Grafica Bar (X,Y)</h3>
				</a>

				<ol>
					<li>Controlador: Para crear un modelo de grafica se debe crear el siguiente controlador con la funcion actionIndexbar:</p>

					<blockquote>
						<?= highlight_file('../../controllers/wiki/GraphController.php');	?>
					</blockquote>
					</li>

					<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/graph/graphbar.php"
						<blockquote>
							<?= highlight_file('../../views/wiki/graph/graphbar.php');	?>
						</blockquote>
					</li>
				</ol>

				<a name="3">
					<h3>Grafica Linea (X,Y)</h3>
				</a>

				<ol>
					<li>Controlador: Para crear un modelo de grafica se debe crear el siguiente controlador con la funcion actionIndexline:</p>

					<blockquote>
						<?= highlight_file('../../controllers/wiki/GraphController.php');	?>
					</blockquote>
					</li>

					<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/graph/graphline.php"
						<blockquote>
							<?= highlight_file('../../views/wiki/graph/graphline.php');	?>
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
