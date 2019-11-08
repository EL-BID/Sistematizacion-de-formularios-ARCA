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
		<h2>Componente Formularios en Ventana Emergente:</h2>
		<p>Módulo: Javascript</p>
				<ul>
					<li><a href="#1">Aclaraciones</a></li>
					<li><a href="#2">Formulario Base</a></li>
					<li><a href="#3">Listado de Registros</a><a href="../index.php?r=clientesmodal/index" class="colora">Demo</a></li>
					<li><a href="#4">Controlador</a></li>
					<li><a href="#5">Javascript</a></li>
					<li><a href="#6">Main.php</a></li>
				</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Componente Formularios en Ventana Emergente:</h2>
				<p>Clase YII: Modal Widget - GridView - *</p>
				

				<p>ANOTACION: Antes de iniciar se debe tener creada la base de datos ver <a href='createbd.php'>Crear BD</a>

				<a name="1">
					<h3>Aclaraciones:</h3>
				</a>
				<p>A continuación se explica el paso a paso para el funcionamiento de los formularios en ventanas emergentes, el trabajo se realiza sobre las plantillas generadas por el sistema CRUD en vistas, controladores y modelos, el archivo yioverride.js se agrega en el archivo AppAsset.php (ver agregar Javascript). </p>


					<a name="2">
						<h3>Formulario Base</h3>
					</a>


					<p>El formulario base contiene la vista del formulario según los campos de la tabla en la Base de Datos, para este ejemplo se crea la tabla Clientes como se presenta en la siguiente imagen, ubicado en Frontend/views/clientesprueba/_form2.php este es script que entrega el generador CRUD, para su correcto funcionamiento se deben agregar los modulos de fechas, y sobre el botton de submit la opcion 'data-confirm' con el mensaje a presentar; Como lo presenta el codigo de Frontend/views/clientesmodal/_form.php </p>
						<blockquote>
									<img src="images/img14.jpg"/>
						</blockquote>

						<p>Formulario sin Personalizar entregado por el CRUD</p>
						<blockquote>
								<?= highlight_file('../../views/wiki/clientesprueba/_form2.php');	?>
						</blockquote>

						<p>Formulario Personalizado</p>
						<blockquote>
								<?= highlight_file('../../views/wiki/clientesmodal/_form.php');	?>
						</blockquote>


					<a name="3">
						<h3>Listado de Registros</h3>
					</a>
					<p>El generador CRUD, ademas de las vistas basicas nos genera una vista de Listado de Registros la cual se encuentra para este ejemplo en /views/clientesprueba/index.php, esta vista no trae predefinidos los widget para fechas en los filtros por tanto debe ser personalizada (ver Listado Personalizado y Listados sin Personalizar), a través de esta vista es acceder al formulario de creación, el de modificación y a la acción de borrado, para habilitar las ventanas emergentes la figura a continuación presenta los cambios en los links de acceso a Crear, Editar y Borrar.</p>

					<p>Comparación listado con formularios ventana completa (Izquierda) y ventana emergente (Derecha) </p>
					<blockquote>
								<img src="images/img34.jpg"/>
								<img src="images/img35.jpg"/>
					</blockquote>

					<p>Listado sin Personalizar entregado por el CRUD</p>
					<blockquote>
							<?= highlight_file('../../views/wiki/clientesprueba/index2.php');	?>
					</blockquote>

					<p>Listado Personalizado</p>
					<blockquote>
							<?= highlight_file('../../views/wiki/clientesmodal/index.php');	?>
					</blockquote>

					<a name="4">
						<h3>Controlador</h3>
					</a>

					<p>Se modifican las acciones "create" y "update" dentro del controlador que entrega el generador CRUD ver "/controllers/clientesmodalController.php":</p>

					<blockquote>
								<img src="images/img36.jpg"/>
								<img src="images/img37.jpg"/>
					</blockquote>

					<blockquote>
							<?= highlight_file('../../controllers/wiki/clientesmodalController.php');	?>
					</blockquote>



					<a name="5">
						<h3>Javascript</h3>
					</a>

					<p>Se crea la funcion de javascript que realizará el llamado a la vistas URL que se encuentran dentro del value de los bottones de Crear, Editar y Borrar, dentro del archivo frontend/web/js/yiioverride.js:</p>

					<blockquote>
								<img src="images/img38.jpg"/>
					</blockquote>

					<a name="6">
						<h3>Main.php</h3>
					</a>

					<p>El widget de la ventana modal se puede agregar tanto en el main.php que se encuentra en "frontend/views/layouts/main.php" para usarse en todas las vistas, o se puede agregar en la vista a usar antes del gridview:</p>

					<blockquote>
								<img src="images/img39.jpg"/>
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
