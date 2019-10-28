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

				<h2>Componente Validador Formulario:</h2>
				<p>Clase: yii\validators\Validator</h2>
				<ul>
					<li><a href="#1">Validación de requeridos </a><a href="../index.php?r=clientev/create" class="colora">Demo</a></li>
					<li><a href="#2">Validación de longitud </a><a href="../index.php?r=clientelong/create" class="colora">Demo</a>  </li>
					<li><a href="#3">Validación de expresiones regulares </a><a href="../index.php?r=clienteexpress/create" class="colora">Demo</a> </li>
					<li><a href="#4">Validación de tipo de dato Entero</a><a href="../index.php?r=tipodato/create" class="colora">Demo</a></li>
					<li><a href="#7">Validación de cadena alfanumerico </a><a href="../index.php?r=clientestring/create" class="colora">Demo</a> </li>
					<li><a href="#8">Validación de Moneda </a><a href="../index.php?r=tipomoneda/create" class="colora">Demo</a> </li>
					<li><a href="#5">Validación de tipo de dato Fecha</a><a href="../index.php?r=tipofechas/create" class="colora">Demo</a></li>
					<li><a href="#6">Validación de máximo/minimo de un valor</a><a href="../index.php?r=tiponumerico/create" class="colora">Demo</a></li> </li>
                                        <li><a href="#9">Mascara Numérica</a><a href="../index.php?r=decimalmask/create" class="colora">Demo</a></li> </li>

				</ul>

				<a name="1">
					<h3>Validar un campo Requerido</h3>
				</a>
					<ol>
						<li>Modelo 1: Crear el modelo con las reglas de validación "Frontend o Backend/models/Clientesvalidator.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/Clientesvalidator.php');	?>
							</blockquote>
						</li>

						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/ClientevController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/ClientevController.php');	?>
							</blockquote>
						</li>
						<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/clientev/create.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/clientev/create.php');	?>
							</blockquote>
						</li>


					</ol>


				<a name="2">
					<h3>Validar Longitud</h3>
				</a>
					<ol>
						<li>Modelo 1: Crear el modelo con las reglas de validación "Frontend o Backend/models/Clientelongvalidator.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/Clientelongvalidator.php');	?>
							</blockquote>
						</li>

						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/ClientelongController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/ClientelongController.php');	?>
							</blockquote>
						</li>
						<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/clientelong/create.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/clientelong/create.php');	?>
							</blockquote>
						</li>
					</ol>



				<a name="3">
					<h3>Validar Expresiones Regulares</h3>
				</a>
					<ol>
						<li>Modelo 1: Crear el modelo con las reglas de validación "Frontend o Backend/models/Clienteexpressvalidator.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/Clienteexpressvalidator.php');	?>
							</blockquote>
						</li>

						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/ClienteexpressController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/ClienteexpressController.php');	?>
							</blockquote>
						</li>
						<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/clienteexpress/create.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/clienteexpress/create.php');	?>
							</blockquote>
						</li>
					</ol>


				<a name="4">
					<h3>Validar Tipo de Dato Entero</h3>
				</a>
					<ol>
						<li>Modelo 1: Crear el modelo con las reglas de validación "Frontend o Backend/models/Tipodatovalidator.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/Tipodatovalidator.php');	?>
							</blockquote>
						</li>

						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/TipodatoController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/TipodatoController.php');	?>
							</blockquote>
						</li>
						<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/tipodato/create.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/tipodato/create.php');	?>
							</blockquote>
						</li>
					</ol>




				<a name="5">
					<h3>Validar Tipo de Dato Fecha:</h3>
				</a>
					<ol>
						<li>Habilitar Libreria DatePicker:</li>
							<blockquote>
								<ol type="a">
									<li>Agregar al archivo composer.json el cual se encuentra en la raiz del proyecto la linea ""yiisoft/yii2-jui": "~2.0.0""</li>
									<li>Instalar composer a través del siguiente enlace https://getcomposer.org/download/</li>
									<li>Ejecutar en un terminal o consola "composer update"</li>
								</ol>
							</blockquote>
						<li>Vista:  Crear modulo de fechas con DatePicker </li>
							<blockquote>
									<?= highlight_file('../../views/wiki/tipofechas/create.php');	?>
							</blockquote>

						<li>Modelo 1: Crear el modelo con las reglas de validación "Frontend o Backend/models/Tipofechasvalidator.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/Tipofechasvalidator.php');	?>
							</blockquote>
						</li>

						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/TipofechasController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/TipofechasController.php');	?>
							</blockquote>
						</li>
					</ol>


				<a name="6">
					<h3>Validación de máximo/minimo de un valor:</h3>
				</a>
					<ol>
						<li>Modelo 1: Crear el modelo con las reglas de validación "Frontend o Backend/models/Tiponumericovalidator.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/Tiponumericovalidator.php');	?>
							</blockquote>
						</li>

						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/TiponumericoController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/TiponumericoController.php');	?>
							</blockquote>
						</li>
						<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/tiponumerico/create.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/tiponumerico/create.php');	?>
							</blockquote>
						</li>
					</ol>

				<a name="7">
					<h3>Validar Cadena Alfanumérico</h3>
				</a>
					<ol>
						<li>Modelo 1: Crear el modelo con las reglas de validación "Frontend o Backend/models/Clientestringvalidator.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/Clientestringvalidator.php');	?>
							</blockquote>
						</li>

						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/ClienteexpressController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/ClientestringController.php');	?>
							</blockquote>
						</li>
						<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/clientestring/create.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/clientestring/create.php');	?>
							</blockquote>
						</li>
					</ol>


				<a name="8">
					<h3>Validar Moneda</h3>
				</a>
					<ol>
						<li>Modelo 1: Crear el modelo con las reglas de validación "Frontend o Backend/models/Tipomonedavalidator.php"
							<blockquote>
									<?= highlight_file('../../models/wiki/Tipomonedavalidator.php');	?>
							</blockquote>
						</li>

						<li>Controlador: Crear el siguiente controlador en el "Frontend o Backend/controllers/TipomonedaController.php"
							<blockquote>
									<?= highlight_file('../../controllers/wiki/TipomonedaController.php');	?>
							</blockquote>
						</li>
						<li>Vista: Crear la siguiente vista en el "Frontend o Backend/views/tipomoneda/create.php"
							<blockquote>
									<?= highlight_file('../../views/wiki/tipomoneda/create.php');	?>
							</blockquote>
						</li>
					</ol>

                                <a name="9">
					<h3>Mascara Numérica: widgets\MaskedInput</h3>
				</a>
					<ol>


						<li>Vista: Dentro de la vista se debe asignar la propiedad al campo de texto, como se presenta para el campo moneda en el "Frontend o Backend/views/decimalmask/create.php", groupSeparator -> "." o "," es para el separador de los miles, los decimales deben ser separados por el usuario pues el sistema no tiene como detectar si es un decimal o hace parte del numero entero, 'autoGroup' => true esta propiedad es para que el vaya agrupando los decimales automaticamente, si no se desea guardar el campo con los separadores se asigna 'removeMaskOnSubmit' => true.
							<blockquote>
									<?= highlight_file('../../views/wiki/decimalmask/create.php');	?>
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
