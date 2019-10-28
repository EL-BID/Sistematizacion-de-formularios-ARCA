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
			<li class="first"><a href="#" accesskey="1" title="">Componente Trazabilidad</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Componente Trazabilidad:</h2>
				<p>Modulo:Log Target</p>
				<ul>
				     <li><a href="#1">Codigos Modificados</a></li>
                                     <li><a href="#2">Modelo de Base de Datos</a></li>
                                     <li><a href="#3">Ejemplo para depuración</a></li>
                                     <li><a href="#4">Modulo de administración</a></li>
				</ul>

				<p>ANOTACION: Antes de iniciar se debe tener creada la base de datos ver <a href='createbd.php'>Crear BD</a>

				<a name="1">
					<h3>Codigos Modificados:</h3>
				</a>
                                    <ul>
                                        <li>/vendor/yiisoft/yii2/log/Target.php</li>
                                        <li>/vendor/yiisoft/yii2/log/DbTarget.php</li>
                                        <li>/common/config/main-local.php</li>
                                        <li>/common/config/params.php</li>
                                        <li>/config/log/</li>
                                        <li>frontend/web/index.php</li>
                                        <li>frontend/controllers/clientespruebaController.php (ejemplo depuracion)</li>
                                        <li>runtime/logs</li>


                                        <!--Web service error-->
                                        <li>frontend/controllers/RestController.php</li>
                                        <li>frontend/controllers/LogAuditoriaController.php</li>
                                        <li>frontend/models/Auditoria.php</li>
                                        <li>frontend/models/AuditoriaSearch.php</li>
                                        <li>frontend/models/AudTipoMensaje.php</li>
                                        <li>frontend/models/AudTipoEvento.php</li>
                                        <li>frontend/models/AudTipoAccion.php</li>
                                        <li>frontend/models/Pagina.php</li>
                                        <li>frontend/config/main.php</li>

                                    </ul>




				<p>A continuación se explica el paso a paso para el funcionamiento del modulo de trazabilidad. </p>


					<a name="2">
						<h3>Target.php</h3>
					</a>


					<p>Target es un script que se ubica en la carpeta /vendor/yiisoft/yii2/log/Target.php este archivo en la raiz del log de errores de trazabilidad con el que cuenta Yii,
                                            en este caso se modifico la funcion <i>"getMessagePrefix"</i> esta funcion entrega la información de la IP, id del usuario, usuario y hora  </p>
						<blockquote>
								<?= highlight_file('../../../vendor/yiisoft/yii2/log/Target.php');	?>
						</blockquote>


                                        <p>DbTarget permite guardar en la base de datos los errores generados por yii, se ubica en la carpeta  /vendor/yiisoft/yii2/log/DbTarget.php </p>

                                                <blockquote>
								<?= highlight_file('../../../vendor/yiisoft/yii2/log/DbTarget.php');	?>
						</blockquote>

                                        <p>Main-Local: se debe agregar al main-local el enable para el log, con el componente que recibe el mismo nombre "log":</p>

                                        <blockquote>
								<?= highlight_file('../../../common/config/main-local.php');	?>
					</blockquote>

                                        <p>Params: En el archivo /common/config/params.php se encuentra definido el parametro "ipvalidate" a traves del cual se ingresa la lista de IP validadas como servidor para recibir información de auditoria,
                                            esta lista se debe separa por "::" :</p>

                                        <blockquote>
						<?= highlight_file('../../../common/config/params.php');	?>
					</blockquote>


                                        <p>Log Texto: El sistema creará por dia un archivo log con la información entregada a la base de datos dentro de la carpeta frontend/config/log/ cada error se encuentra separado por "===================":</p>

                                        <blockquote>
						<?= highlight_file('../../config/log/log2017-06-16.txt');	?>
					</blockquote>

                                <a name="2">
					<h3>Modelo de Base de Datos:</h3>
				</a>
                                        <p>Se crea el siguiente modelo de base de datos, en la tabla aud_auditoria se agrega el campo "status" que se encarga de indicarle al trigger asignado bajo la funcion "aud_event_add()" la cual se muestra en la imagen a continuación,
                                            al igual que el campo "pagina" tambien utilizado por la funcion anteriormente nombre, para poder enlazar a la tabla aud_tipoaccion.

                                            En la tabla aud_tipoaccion se parametrizan el status  que entrega yii de acuerdo al error, warning o evento ocurrido para relacionarlo con el tipo de mensaje.
                                            En la tabla pagina se parametrizan las paginas relacionadas con los modulos del sistema.


                                            <img src="images/img043.png"/>
                                            <img src="images/img44.jpg"/>

                                            <p>Anotación: El archivo sql de las tablas relacionadas se adjunta  <a href="trazabilidad.sql">aqui</a></p>

                                <a name="3">
					<h3>Ejemplo Depuracion:</h3>
				</a>

                                            <p> Para el modelo de depuracion el sistema debe tener la variable defined('YII_DEBUG') or define('YII_DEBUG', true); en true en la ubicacion frontend/web/index.php</p>
                                            <blockquote>
						<?= highlight_file('../index.php');	?>
                                            </blockquote>

                                            <p>Dentro del script main-local.php se debe asignar la forma de recoleccion de los datos, el modelo debugger se trabajo con la sintaxis TRACE a la categoria "DEBUG":</p>
                                            <blockquote>
							<?= highlight_file('../../../common/config/main-local.php');	?>
                                            </blockquote>

                                            <p> El modelo DEBUGG se encuentra guardado en un archivo de texto dado que dara un crecimiento alto y solo se puede usar en modo DESARROLLADOR, esto para el caso de realizar depuraciones
                                                en YII, las que se generen a través del servicio web REST, si seran agregadas a la base de datos.</p>

                                            <p>Los datos asignados por depuracion se guardan en "runtime/logs/debug.log", y se envian como se presenta a continuacion</p>
                                            <blockquote>
							<?= highlight_file('../../runtime/logs/debug.log');	?>
                                            </blockquote>

                                            <img src="images/img45.jpg"/>


                               <a name="4">
					<h3>Vista Modulo Administracion:</h3>
				</a>

                                        <p>La vista trazabilidad presenta un gridview como se muestra en la figura, esta vista presenta todos los registros de la tabla "aud_auditoria", y cuenta con un boton de ver por registros
                                            para visualizar la informacion completa</p>

                                            <p>Codigo en Index.php vista de la grilla "/views/logauditoria/index.php"</p>
                                        <blockquote>
							<?= highlight_file('../../views/wiki/logauditoria/index.php');	?>
                                        </blockquote>

                                            <p>Codigo de la vista individual de un registro "/views/logauditoria/view.php"</p>
                                       <blockquote>
							<?= highlight_file('../../views/wiki/logauditoria/view.php');	?>
                                        </blockquote>

                                            <p>Codigo del controlador "/Controllers/LogAuditoriaController.php"</p>
                                       <blockquote>
							<?= highlight_file('../../Controllers/LogAuditoriaController.php');	?>
                                        </blockquote>


                                        <p>Codigo del modelo principal "/models/Auditoria.php"</p>
                                        <blockquote>
							<?= highlight_file('../../models/wiki/Auditoria.php');	?>
                                        </blockquote>

                                        <p>Codigo del modelo para busquedas en la grilla "/models/AuditoriaSearch.php"</p>
                                        <blockquote>
							<?= highlight_file('../../models/wiki/AuditoriaSearch.php');	?>
                                        </blockquote>

                                         <p>Configuracion de "/frontend/config/main.php" -> se agrega : "'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],"</p>
                                        <blockquote>
							<?= highlight_file('../../config/main.php');	?>
                                        </blockquote>

                                <a name="5">
					<h3>Servicio Web REST:</h3>
				</a>

                                        <p> Para el servicio web se construyo un Controllador y un Modelo, el controlador se invoca a traves de POST enviando un JSON con los datos,
                                            como se muestra a continuación, se usa POSTMAN para la presentación. (En rojo URL y metodo de envio al servicio, En azul JSON que se envia al servicio, En naranja respuesta del servicio).</p>

                                        <img src="images/img46.jpg"/>

                                        <p>A continuacion se presentan los registro de las relaciones tipo_accion, tipo_mensaje y tipo_evento</p>

                                        <h4>TIPO DE ACCIONES</h4>
                                         <blockquote>
							<?= highlight_file('tipoaccion.csv');	?>
                                         </blockquote>

                                        <h4>TIPO DE EVENTOS</h4>
                                         <blockquote>
							<?= highlight_file('tipoeventos.csv');	?>
                                         </blockquote>

                                        <h4>TIPO DE MENSAJES</h4>
                                         <blockquote>
							<?= highlight_file('tipomensajes.csv');	?>
                                         </blockquote>

                                <a name="6">
                                    <h3>Consumo del servicio</h3>

                                    <p>El consumo del servicio se encuentra en la carpeta adjunta consumeservice.rar, la funcion abc_rest presentada en el codigo a continuaciòn, desarrolla el proceso de comunicacion con servicio REST,
                                        para su uso se debe habilitar la libreria curl de PHP.</p>

                                    <blockquote>
							<?= highlight_file('consumeservice/restconsume.php');	?>
                                    </blockquote>

                                    <p>Ejemplos de uso</p>
                                    <blockquote>
							<?= highlight_file('consumeservice/example_ingreso.php');	?>
                                    </blockquote>
                                </a>

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
