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
		<h2>Combobox con Datos de BD:</h2>
		<p>Módulo: Javascript</p>
			<ul>
				<li><a href="#0">Vista Base</a></li>
				<li><a href="#1">Modelos</a></li>
				<li><a href="#2">Controlador</a></li>
                <li><a href="../index.php?r=clientesdropdown/create" class="colora">Demo</a>
			</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Combobox con Datos de BD:</h2>
				<p>Clase: yii\helpers\ArrayHelper;</p>
			
				<a name="0">
					<h3>Vista Base</h3>
				</a>
				<p>Se presenta la vista "_form" que es el formulario base de la vista create y update ubicada en '../../views/wiki/clientesdropdown/_form.php', a este codigo se le agrega el dropdownList y ademas el modelo ciudades.</p>
				<blockquote>
						<?= highlight_file('../../views/wiki/clientesdropdown/_form.php');	?>
				</blockquote>

                            <p> Es importante tener en cuenta lo presentado en la siguiente imagen</p>
                            <img src="images/img47.jpg"/>


				<a name="1">
					<h3>Vista Formulario Create</h3>
				</a>
				<p>Para visualizar los cambios se debe mirar el formulario create en el navegador:</p>
				<blockquote>
						<?= highlight_file('../../views/wiki/clientesdropdown/create.php');	?>
				</blockquote>


				<a name="2">
					<h3>Modelos</h3>
				</a>
				<p>Para el funcionamiento del drodown debe existe el modelo de la tabla donde se guardara el campo en este caso Clientesdropdown.php y el modelo de la tabla relacion en este caso Ciudades.php</p>

				<blockquote>
					<?= highlight_file('../../../common/models/wiki/Clientesdropdown.php');	?>
				</blockquote>

                                <blockquote>
					<?= highlight_file('../../../common/models/wiki/Ciudades.php');	?>
				</blockquote>


				<a name="2">
					<h3>Controlador:</h3>
				</a>
				<p>El controlador no sufre ningun cambio dado que la informacion se gestiona entre modelos:</p>

				<blockquote>
					<?= highlight_file('../../controllers/wiki/clientesdropdownController.php');	?>
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
