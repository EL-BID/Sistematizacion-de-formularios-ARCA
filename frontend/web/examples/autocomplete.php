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
		<h2>Componente Autocomplete</h2>
		<p>Modulo:Componente Javascript</p>
		<ul>
			 <li><a href="#1">Vista base</a></li>
             <li><a href="#2">Vista formulario Create</a><a href="../index.php?r=clientesauto/create" class="colora">Demo</a></li>
             <li><a href="#3">Vista formulario Update</a></li>
             <li><a href="#4">Controlador</a></li>
      
            
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Componente Autocomplete:</h2>
				<p>Clase: yii\jui\AutoComplete</p>
				<p>Clase Javascript: use yii\web\JsExpression </p>	
				<p>El modelo no tiene cambios para la aplicación del autocomplete.</p>


				<a name="1">
					<h3>Vista Base</h3>
				</a>
				<p>Se presenta la vista "_form" que es el formulario base de la vista create y update ubicada en '../../views/wiki/clientesauto/_form.php'</p>
				<blockquote>
						<?= highlight_file('../../views/wiki/clientesauto/_form.php');	?>
				</blockquote>


				<a name="2">
					<h3>Vista Formulario Create</h3>
				</a>
				<p>Se pasan las variables nuevas del controlador, las cuales contienen las listas  para diligenciar el autocomplete (autocomplete,autocomplete2):</p>
				<blockquote>
						<?= highlight_file('../../views/wiki/clientesauto/create.php');	?>
				</blockquote>


				<a name="3">
					<h3>Vista Formulario Update</h3>
				</a>
				<p>El formulario update ademas del array para el autocomplete debe enviar la variable que contiene el nombre del campo guardado en el registro, aqui se denomina $custom</p>

				<blockquote>
					<?= highlight_file('../../views/wiki/clientesauto/update.php');	?>
				</blockquote>


				<a name="4">
					<h3>Controlador:</h3>
				</a>
				<p>En el controlador se deben modificar las funciones que tengan relacion con el fomulario en este caso CREATE Y UPDATE 'controllers/clientesautoController.php', si se manejan los datos desde una BD se debe agregar el modelo relacionado a la tabla/vista que contiene la información a listar en el autocomplete en este ejemplo 'ciudades', ademas de agregar en las funciones las busquedas con salida de datos array ver $data,$data2 y $custom:</p>

				<blockquote>
					<?= highlight_file('../../controllers/wiki/clientesautoController.php');	?>
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
