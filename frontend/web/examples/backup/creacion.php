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

				<h2>Componente Formulario:</h2>
				<p>Clase YII: CRUD</p>
				<ul>
					<li><a href="#1">Como Usar CRUD?</a></li>
					<li><a href="#2">Formulario Base</a></li>
					<li><a href="#3">Formulario de Creación</a><a href="../index.php?r=clientesprueba/create" class="colora">Demo</a></li>
					<li><a href="#4">Formulacion para Editar</a><a href="../index.php?r=clientesprueba/index" class="colora">Demo</a></li>
					<li><a href="#5">Delete</a></li>
					<li><a href="#6">Listado de Registros</a><a href="../index.php?r=clientesprueba/index" class="colora">Demo</a></li>
					<li><a href="#7">Controlador</a></li>
				</ul>

				<p>ANOTACION: Antes de iniciar se debe tener creada la base de datos ver <a href='createbd.php'>Crear BD</a>

				<a name="1">
					<h3>Como usar CRUD:</h3>
				</a>
				<p>CRUD es un generador que permite crear la base de los formularios para los registros en un tabla SQL</p>

				<p>Para personalizar el aplicativo se modificaron las plantillas que se encuentra en \vendor\yiisoft\yii2-gii\generators, las personalizacion incluyen barra de espera o progreso, ventana modal de confirmación para las distintas vistas, incluir libreria para personalización de fechas.</p>

				<ol>
					<li>Accediendo a CRUD:
						<blockquote>
							<img src="images/img20.jpg"/>
						</blockquote>
					</li>

					<li>Creando el Modelo</li>

					<p>Lo primero que crearemos será el modelo para eso en este ejemplo usamos la tabla Clientes, dado clic en el boton que aparece encerrado en negro:</p>
						<blockquote>
							<img src="images/img21.jpg"/>
						</blockquote>

						<blockquote>
							<img src="images/img22.jpg"/>
						</blockquote>

						<blockquote>
							<img src="images/img23.jpg"/>
						</blockquote>

					<p>Damos Click en PREVIEW y despues en GENERATE</p>
						<blockquote>
							<img src="images/img24.jpg"/>
						</blockquote>


						<blockquote>
							<img src="images/img25.jpg"/>
						</blockquote>

					<p>Ahora tenemos un modelo ya creado como se presenta en la imagen en la carpeta /frontend/models/..denominado Clientesprueba.php</p>

					<blockquote>
							<img src="images/img26.jpg"/>
					</blockquote>

					<p>El cual contiene el siguiente codigo:</p>

					<blockquote>
						<?= highlight_file('../../models/wiki/Clientesprueba.php');	?>
					</blockquote>

					<li>Generando el Controlador y las Vistas de Creación, Editación y Eliminación, dando clic en el boton que aparece en azul:</li>

					<blockquote>
						<img src="images/img27.jpg"/>
					</blockquote>

					<blockquote>
						<img src="images/img28.jpg"/>
					</blockquote>

					<blockquote>
						<img src="images/img29.jpg"/>
					</blockquote>


					<li>Vistas:</li>
					<a name="2">
						<h3>Formulario Base</h3>
					</a>


					<p>El formulario base contiene la vista del formulario según los campos de la tabla en la Base de Datos, para este ejemplo se crea la tabla Clientes como se presenta en la siguiente imagen, ubicado en Frontend/views/clientesprueba/_form2.php este es script que entrega el generador CRUD, para su correcto funcionamiento se deben agregar los modulos de fechas como lo presenta el codigo de Frontend/views/clientesprueba/_form.php </p>
						<blockquote>
									<img src="images/img14.jpg"/>
						</blockquote>

						<p>Formulario sin Personalizar entregado por el CRUD</p>
						<blockquote>
								<?= highlight_file('../../views/wiki/clientesprueba/_form2.php');	?>
						</blockquote>

						<p>Formulario Personalizado</p>
						<blockquote>
								<?= highlight_file('../../views/wiki/clientesprueba/_form.php');	?>
						</blockquote>

					<a name="3">
						<h3>Formulario Creación</h3>
					</a>

					<p>El formulario de Creación es una vista que realiza un llamado al formulario base, pero en el modelo NewRecord,  se aloja en /views/clientesprueba/create.php, el cual es llamado a través del controlador /controllers/clientespruebaController.php en la función create, la cual se encuentra explicada mas adelante.</p>

						<blockquote>
								<?= highlight_file('../../views/wiki/clientesprueba/create.php');	?>
						</blockquote>


					<a name="4">
						<h3>Formulario Edición</h3>
					</a>
					<p>El formulario de Edición es una vista que realiza un llamado al formulario base, pero en el modelo NewRecord,  se aloja en /views/clientesprueba/update.php, el cual es llamado a través del controlador /controllers/clientespruebaController.php en la función update, la cual se encuentra explicada mas adelante.</p>

						<blockquote>
								<?= highlight_file('../../views/wiki/clientesprueba/update.php');	?>
						</blockquote>

					<a name="5">
						<h3>Delete</h3>
					</a>
					<p>Para borrar registros no se cuenta con un formulario, la funcion deletep se encuentra dentro del controlador /controllers/clientespruebaController.php creado con el sistema CRUD esta funcion es llamada a través de la vista /views/clientesprueba/index.php a través del boton 'delete' del gridview, la cual llama a una ventana de confirmación con un mensaje modificable.</p>

					<a name="6">
						<h3>Listado de Registros</h3>
					</a>
					<p>El generador CRUD, ademas de las vistas basicas nos genera una vista de Listado de Registros la cual se encuentra para este ejemplo en /views/clientesprueba/index.php, esta vista no trae predefinidos los widget para fechas en los filtros por tanto debe ser personalizada (ver Listado Personalizado y Listados sin Personalizar), a través de esta vista es acceder al formulario de creación, el de modificación y a la acción de borrado.</p>

					<p>Listado sin Personalizar entregado por el CRUD</p>
					<blockquote>
							<?= highlight_file('../../views/wiki/clientesprueba/index2.php');	?>
					</blockquote>

					<p>Listado Personalizado</p>
					<blockquote>
							<?= highlight_file('../../views/wiki/clientesprueba/index.php');	?>
					</blockquote>

					<a name="7">
						<h3>Controlador</h3>
					</a>

					<p>El generador CRUD crea el Controlador para las acciones que se listan a continuación (/controllers/clientespruebaController.php):</p>

					<ul>
						<li>Barra de Progreso o de Espera "actionProgress"</li>
						<li>Vista de Listado de Registros "actionIndex"</li>
						<li>Vista visualizacion de un UNICO registro "actionView"</li>
						<li>Vista Formulario de Creación "actionCreate"</li>
						<li>Vista Formulario de Edición "actionUpdate"</li>
						<li>Accion de Borrado "actionDeletep"</li>
					</ul>

					<blockquote>
							<?= highlight_file('../../controllers/wiki/clientespruebaController.php');	?>
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
