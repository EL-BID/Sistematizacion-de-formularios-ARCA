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

				<h2>Componente Multiples Tablas / Multiples Insert:</h2>
				<p>Clase YII: Se realiza con el nuevo CRUD </p>
				<ul>
                                        <li><a href="../index.php?r=proyectos" class="colora">Demo</a>
					<li><a href="#1">Creacion de Modelos</a></li>
					<li><a href="#2">Creacion del CRUD y Modificaciones</li>
                                        <li><a href="#3">SQL<a href="public_proyectos.sql">Descargar</a></li>
				</ul>


                                <p> Se diseña una pequeña aplicacion en la cual interfieren tres tablas como muestra la figura a continuación, en este aplicativo
                                    la tabla ciudades_p guarda un listado de ciudades general, la tabla ciudadesproyecto relaciona una ciudad con un proyecto y la tabla proyectos
                                    contiene la informacion del proyecto para este ejemplo nombre, fechainicio y fechafinal.</p>

                                    <img src="images/img52.jpg"/>

                                    <p> Se diseño un formulario que permite guardar los datos del proyecto y ademas asociar las ciudades. Los datos del proyecto son gestionados en la tabla
                                        proyectos con el modelo "proyectos" el cual hereda todas las funciones de "proyectospry" y Los datos de las ciudades asociadas al proyecto se gestionan
                                        con el modelo "ciudadesproyecto" el cual hereda todas las funciones de "ciudadesproyectospry".</p>

                                    <img src="images/img54.jpg"/>

				<a name="1">
					<h3>Creacion de Modelos</h3>
				</a>
					<ol>
						<li>Proyectos: A traves del modelo GII ARCA se crea el modelo Proyectos como lo muestra la imagen asociado a la tabla proyectos,
                                                    este generador de modelos crea dos modelos Proyectos y Proyectospry.

                                                         <img src="images/img53.jpg"/>

                                                    Teniendo en cuenta que el formulario de creacion contiene no solo los campos asociados a proyectos, sino que ademas posee un combobox
                                                    de seleccion multiple que contiene las ciudades que se encuentran en la tabla ciudadesp, entonce se agrega de forma manual en Proyectospry
                                                    una funcion denominada getCiudadesDropdown, que permite enviarle a este combobox los valores.

                                                    Modelo Proyecto:
							<blockquote>
									<?= highlight_file('../../models/wiki/Proyectos.php');	?>
							</blockquote>

                                                     Modelo Proyectopry:
							<blockquote>
									<?= highlight_file('../../models/wiki/Proyectospry.php');	?>
							</blockquote>
						</li>

						<li>Ciudadesp: El modelo ciudadesp se realiza para hacer el llamado en getCiudadesDropdown de la tabla ciudadesp.

                                                    Modelo Ciudadesp:
                                                        <blockquote>
									<?= highlight_file('../../models/wiki/Ciudadesp.php');	?>
							</blockquote>

                                                    Modelo Ciudadesppry:
                                                        <blockquote>
									<?= highlight_file('../../models/wiki/Ciudadesppry.php');	?>
							</blockquote>
						</li>

                                                <li>Ciudadesproyectos: El modelo ciudadesproyectos realiza el llamado a la tabla ciudadesproyecto.
							<blockquote>
									<?= highlight_file('../../models/wiki/Ciudadesproyectos.php');	?>
							</blockquote>

                                                        <blockquote>
									<?= highlight_file('../../models/wiki/Ciudadesproyectospry.php');	?>
							</blockquote>
						</li>
					</ol>


				<a name="2">
					<h3>Creacion del CRUD y Modificaciones</h3>
                                </a>
                                    <p>A través del CRUD se crea el modelo de vistas y controlador para crear editar y borrar el listado general de ciudades y los proyectos</p>
					<ol>
						<li><p>Ciudades:  La imagen a continuacion muestra lo realizado en el CRUD para la generacion de las vistas y el controlador del listado
                                                        general de ciudades que alimentará al combobox "ciudadesp"</p>
                                                    <img src="images/img55.jpg"/>

                                                    <p>El unico cambio que se le aplica a esta generacion es en la vista "frontend/view/ciudadesp/index.php" al cual se le agrega en la parte superior
                                                        las caracteristicas del menu horizotal que contiene el acceso a proyectos y al listado general de ciudades.</p>

                                                    <p> Vista <i>"frontend/view/ciudadesp/index.php" Cambio -> ($this->params['itemsmn'])</i></p>
							<blockquote>
									<?= highlight_file('../../views/wiki/ciudadesp/index.php');	?>
							</blockquote>

                                                    <p>Otros codigos (sin cambios)</p>
                                                    <ul>
                                                        <li>frontend/view/ciudadesp/_form.php</li>
                                                        <li>frontend/view/ciudadesp/create.php</li>
                                                        <li>frontend/view/ciudadesp/update.php</li>
                                                        <li>frontend/view/ciudadesp/view.php</li>
                                                        <li>frontend/controllers/Ciudadespcontroller.php</li>
                                                        <li>frontend/controllers/Ciudadespcontrollerfachada.php</li>
                                                    </ul>
						</li>
						<li>Proyectos: Se genera con el CRUD las vistas y los controladores como se realizo en el item anterior solo que esta vez
                                                    se llama a la tabla proyectos.

                                                    <p>Se realiza el primer cambio en la vista "frontend/views/proyectos/_form.php, se agrega el combobox de multiples selecciones que hace llamado a un modelo "$model2" como lo muestra la imagen </p>
                                                    <img src="images/img56.jpg"/>

                                                        <blockquote>
									<?= highlight_file('../../views/wiki/proyectos/_form.php');	?>
							</blockquote>

                                                    <p>Se realiza el segundo cambio en la vista "frontend/views/proyectos/create.php, se agrega el modelo2 "model2" al render que se realiza a _form.php</p>
                                                    <img src="images/img57.jpg"/>

                                                    <p>Se realiza el tercer cambio en la vista "frontend/views/proyectos/update.php, se agrega el modelo2 "model2" al render que se realiza a _form.php</p>
                                                    <img src="images/img57.jpg"/>

                                                    <p><i>Create</i></p>

                                                     <blockquote>
									<?= highlight_file('../../views/wiki/proyectos/create.php');	?>
                                                     </blockquote>

                                                    <p><i>Update</i></p>

                                                     <blockquote>
									<?= highlight_file('../../views/wiki/proyectos/update.php');	?>
                                                     </blockquote>

                                                    <p>Se realiza el cuarto cambio sobre el controlador ProyectosController.php en las acciones create update para enviar o renderizar el modelo 2</p>
                                                    <img src="images/img58.jpg"/>
                                                    <img src="images/img59.jpg"/>

                                                    <p>Se realiza un quinto cambio en la funcion create, update del controlador ProyectosControllerFachada.php,
                                                        se agregan las funciones FindModel2() y updateciudades se presentan los comentario en el codigo</p>
                                                        <?= highlight_file('../../controllers/wiki/ProyectosControllerFachada.php');	?>
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
