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
		<h2>Aplicacion Beta con CRUD Fachada</h2>
		<ul>
                    <li><a href="#1">Configuraci&oacute;n de la base de datos</a><a href="sql/POC_20171206.backup" class="colora">Archivo SQL AQUI</a></li>
                                    <li><a href="#5">Como crear un Formato</a></li>
                                    <li><a href="#2">Modelos</a></li>
                                    <li><a href="#3">Controladores</a></li>
                                    <li><a href="#4">Vistas</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
					
				
				<a name="1">
					<h3>Configuracion de la base de datos</h3>
				</a>
					<ol>
						<li>Se agrega nueva conexion a la base de datos con el fin de no deshabilitar los anteriores ejemplos de la wiki, la conexion se denomina db4 y se encuentra en ../../common/config/main-local.php
							<blockquote>
									<?= highlight_file('../../../common/config/main-local.php');	?>	
							</blockquote>
						</li>
						
					</ol>
                                <a name="5">
                                        <h3>Crear un Formato</h3>
                               </a>
                            
                                        <ol style="padding:12px">
                                            
                                            <p style="font-weight:bolder;color:#2f96b4">Tabla FD_FORMATO</p>
                                            
                                            <li> El formato debe estar vinculado a un registro en la tabla fd_modulo, actualmente la BD cuenta con 3 modulos registrados,
                                            para este ejemplo trabajaremos con el modulo </li>  
                                            <img src="images/img67.JPG" />
                                            <li> El formato debe tener una version la cual esta relacionada con un registro de fd_version, esta misma version la utilizaremos mas adelante</li>
                                            <li> El formato tiene tres tipos de vistas para el campo id_tipo_view, las cuales se activan al dar clic en ver 1-> Detalle Formato , 2-> Dashboard , 3-> Listado Capitulos</li>
                                            <li> El formato debe tener asignado un cod_rol que es el rol del perfil asignado con permisos para ver el formato (ver permisos para acceder a formato)</li>
                                            <li> La numeracion indica si el formato va a o no numerado 'S'-> si va numerado , 'N' -> no va numerado</li>
                                            <li><span style="font-weight:bolder">
                                                   INSERT INTO "public"."fd_formato" 
                                                    ("id_formato", "nom_formato", "num_formato", "id_tipo_view_formato", "id_modulo", "ult_id_version", "cod_rol", "numeracion") 
                                                            VALUES 
                                                    ('5', 'Nuevo Formato', '0002', '1', '2', '1', '1', 'S');
                                                </span></li> 
                                            <hr></hr>
                                            
                                            <p style="font-weight:bolder;color:#2f96b4;padding-top:10px">Tabla FD_CONJUNTO_PREGUNTA</p>
                                            
                                             <li>En el item anterior vimos como crear un formato, en este caso contamos con un formato sin preguntas, para empezar a crear
                                                 las preguntas debemos crear primero un registro en la tabla FD_CONJUNTO_PREGUNTA como se muestra a continuaciÃ³n</li>
                                             <li><span style="font-weight:bolder">
                                             INSERT INTO "public"."fd_conjunto_pregunta" 
                                                ("id_conjunto_pregunta", "id_formato", "id_version", "id_tipo_view_formato", "cod_rol") 
                                                VALUES 
                                                ('6', '5', '1', '1', '1');
                                                     
                                                 </span></li>
                                             <li> Los valores de id_formato, id_version, cod_rol e id_tipo_view_formato deben ser los mismo que tenga el formato actualmente y eso relacionara
                                                 el formato con el conjunto_pregunta</li>
                                            <hr></hr>
                                             
                                             
                                            <p style="font-weight:bolder;color:#2f96b4;padding-top:10px">Tabla FD_CONJUNTO_RESPUESTA</p>
                                             
                                            <li> Para las entidades que aplique el formato debe existir un conjunto_respuesta esperado, la entidad debe exitir en la tabla entidades.</li>
                                            <li> Debe existir el registro en la tabla fd_periodo_formato, relacionando el formato con el periodo </li>
                                            <li><span style="font-weight:bolder">
                                            INSERT INTO "public"."fd_periodo_formato" ("fecha_creacion", "id_formato", "id_periodo") 
                                            VALUES 
                                            ('2017-09-21', '2', '2017');
                                            </li>
                                            <li> Para crear el conjunto de respuesta debe existir un registro de relacion en la tabla fd_adm_estado,
                                            este registro es el que relaciona el rol del usuario, con el modulo asignado al formato y da los permisos, 
                                            para el ejemplo el cod_rol asignado al formato es el '1', el modulo que se asigno al formato es el '2' estos mismo valores deben quedar
                                            en el registro de fd_adm_estado, si se quiere dar permisos a la entidad que se relacionada con el conjunto_respuesta se debe dar el valor 'S'
                                            a los campos p_actualizar, p_crear, p_borrar y p_ejecutar</li>
                                            
                                            <img src="images/img68.JPG" />
                                            
                                            <li><span style="font-weight:bolder">
                                                
                                                INSERT INTO "public"."fd_conjunto_respuesta" 
                                                ("id_conjunto_respuesta", "id_conjunto_pregunta", "id_entidad", "id_formato", "ult_id_adm_estado", "id_periodo", "fecha_creacion") 
                                                VALUES 
                                                ('7', '2', '1', '2', '1', '2017', '2017-09-21');
                                                </span>
                                            </li>
                                             <hr></hr>
                                             
                                             
                                            <p style="font-weight:bolder;color:#2f96b4;padding-top:10px">Tabla FD_CAPITULO</p>
                                            
                                            <li>En esta tabla se crean los capitulos que se haran parte del formato, en la columna orden es un campo entero con la posicion que
                                                ocupara el capitulo en el formato, importante los campos id_conjunto_pregunta, el numero de columnas que contendra el capitulo, el icono
                                                actuamente se guarda en web/images/dashboard...</li>
                                            
                                            <li><span style="font-weight:bolder">
                                                INSERT INTO "public"."fd_capitulo" ("id_capitulo", "nom_capitulo", "orden", "id_tview_cap", "id_tcapitulo", "icono") VALUES ('8', 'INFORMACIÃ“N GENERAL', '1', '1', '1', 'images/');<br/>
                                                UPDATE "public"."fd_capitulo" SET "icono"='images/dashboard/icono20.jpg', "id_conjunto_pregunta"='2', "num_columnas"='2', "numeracion"='S' WHERE ("id_capitulo"='8');<br/>
                                                INSERT INTO "public"."fd_capitulo" ("id_capitulo", "nom_capitulo", "orden", "id_tview_cap", "id_tcapitulo", "icono", "id_conjunto_pregunta", "num_columnas", "numeracion") VALUES ('9', 'INFORMACION ESTADO', '2', '1', '1', 'images/dashboard/icono6.jpg', '2', '2', 'S');
                                                </span></li>
                                            
                                             <hr></hr>
                                             
                                             
                                            <p style="font-weight:bolder;color:#2f96b4;padding-top:10px">Tabla FD_SECCION</p>
                                            
                                            <li>Una pregunta puede pertenecer o no a una seccion, en este aso la seccion deb eestar relacionada a un
                                            capitulo en fd_capitulo, debe tener un orden numerico.</li>
                                            
                                            <li><span style="font-weight:bolder">
                                                    INSERT INTO "public"."fd_seccion" ("id_seccion", "nom_seccion", "orden", "id_capitulo", "num_columnas", "num_col") VALUES ('8', 'NOMBRE Y APELLIDOS', '1', '8', '2', '1');
                                                </span></li>
                                            
                                             <hr></hr>
                                             
                                             
                                            <p style="font-weight:bolder;color:#2f96b4;padding-top:10px">Tabla FD_PREGUNTAS</p>
                                            
                                            <li>Aqui se asignan las preguntas, las cuales tienen las descripciones dadas a continuaciÃ³n:</li>
                                            
                                            <ul>
                                                <li>nom_pregunta: nombre de la pregunta, si la pregunta tiene el mismo nombre de la seccion a la cual esta asignada
                                                    esta pregunta se amarra a la descripcion de la seccion.</li>
                                                <li>ayuda_pregunta: el texto aqui asignado se presenta en el tooltip</li>
                                                <li>obligatorio: Indica si es obligatorio para el usuario dar respuesta a la pregunta</li>
                                                <li>max_largo: cantidad maxima de caracteres para la respuesta</li>
                                                <li>min_largo: cantidadi minima de caracteres para la respuesta</li>
                                                <li>Orden: valor numerico que asigna el orden de las preguntas</li>
                                                <li>estado: 'S' si esta activa y se presenta la pregunta y 'N' si esta inactiva  y no se presenta.</li>
                                                <li>id_tpregunta: id del tipo de pregunta, segun las tablas de tipo de preguntas que estan en fd_tipo_pregunta</li>
                                                <li> id_capitulo: capitulo al cual pertenece la pregunta</li>
                                                <li>caracteristica_preg: 'S' si es simple o 'M' si es multiple</li>
                                                <li>id_conjunto_pregunta: id conjunto pregunta al cual pertenece la pregunta, este id_conjunto_pregunta debe estar
                                                    relacionado con el formato</li>
                                                <li>visible: campo que indica si la presenta es visible o no 'S' o 'N'</li>
                                                <li>visible descripcion: campo que indica si la descripcion en nom_pregunta se debe visualizar</li>
                                                <li>num_col_label: numero de columnas combinadas para el nombre de la pregunta</li>
                                                <li>num_col_input: numero de columnas combinadas para la caja de respuesta</li>
                                                <li>numerada: 'S' si debe ir numerada la pregunta, 'N' si no debe ir numerada</li>
                                               
                                            </ul>
                                            
                                            <li><span style="font-weight:bolder">
                                            INSERT INTO "public"."fd_pregunta" ("id_pregunta", "nom_pregunta", "ayuda_pregunta", "obligatorio", "max_largo", "min_largo", "orden", "estado", "id_tpregunta", "id_capitulo", "id_seccion", "caracteristica_preg", "id_conjunto_pregunta", "visible", "visible_desc_preg", "num_col_label", "num_col_input", "numerada") VALUES ('100', 'NOMBRE Y APELLIDOS', 'ingrese nombre y apellido en letras', 'S', '255', '10', '1', 'S', '15', '8', '8', 'S', '2', 'S', 'N', '1', '1', 'S');<br/>
                                            INSERT INTO "public"."fd_pregunta" ("id_pregunta", "nom_pregunta", "ayuda_pregunta", "obligatorio", "max_date", "min_date", "orden", "estado", "id_tpregunta", "id_capitulo", "id_seccion", "caracteristica_preg", "id_conjunto_pregunta", "visible", "visible_desc_preg", "num_col_label", "num_col_input", "numerada") VALUES ('101', 'FECHA DE NACIMIENTO', 'ingrese la fecha de nacimiento', 'S', '1995-12-31', '1950-01-01', '2', 'S', '1', '8', '8', 'S', '2', 'S', 'S', '1', '1', 'S');<br/>
                                            INSERT INTO "public"."fd_pregunta" ("id_pregunta", "nom_pregunta", "ayuda_pregunta", "obligatorio", "max_largo", "min_largo", "orden", "estado", "id_tpregunta", "id_capitulo", "id_seccion", "caracteristica_preg", "id_conjunto_pregunta", "visible", "visible_desc_preg", "num_col_label", "num_col_input") VALUES ('102', 'CORREO ELECTRONICO', 'ingrese correo', 'S', '255', '7', '3', 'S', '4', '8', '8', 'S', '2', 'S', 'S', '1', '1');<br/>
                                            UPDATE "public"."fd_pregunta" SET "reg_exp"='^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$', "numerada"='S' WHERE ("id_pregunta"='102');<br/>
                                            INSERT INTO "public"."fd_pregunta" ("id_pregunta", "nom_pregunta", "ayuda_pregunta", "obligatorio", "orden", "estado", "id_tpregunta", "id_capitulo", "id_seccion", "caracteristica_preg", "id_conjunto_pregunta", "visible", "visible_desc_preg", "num_col_label", "num_col_input", "numerada") VALUES ('103', 'ESTADO CIVIL', 'seleccione un estado', 'S', '1', 'S', '3', '9', NULL, 'S', '2', 'S', 'S', '1', '1', 'S');<br/>
                                            UPDATE "public"."fd_pregunta" SET "id_tselect"='1' WHERE ("id_pregunta"='103')
                                            </span></li>
                                        </ol>
                            
                            
                            
                            
                            
                            
                            
				
				<a name="2">
					<h3>Modelos</h3>
				</a>	
					<ol>
						<li>Los modelos utilizados aqui son para los filtros dado que se construye es una pagina de consulta, la tabla a continuacion presenta los modelos realizados,
                                                    y el codigo en el cual son usados; los modelos terminados en pry contienen las consultas a las bases de datos.
                                                    <table>
                                                        <tr>
                                                            <td>Codigo de Uso</td>
                                                            <td>Modelo</td>
                                                        </tr>
                                                        <tr>
                                                            <td >views/gestorformatos/form2</td>
                                                            <td>common\models\poc\FdFormato</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">GestorFormatos</td>
                                                            <td>common\models\autenticacion\Cantones</td>
                                                        </tr>
                                                        <tr>
                                                            <td>common\models\autenticacion\Parroquias</td>
                                                        </tr>
                                                        <tr>
                                                            <td>common\models\poc\FdAdmEstado;</td>
                                                        </tr>
                                                         <tr>
                                                            <td>common\models\poc\TrPeriodo</td>
                                                        </tr>
                                                        
                                                    </table>
						</li>
					</ol>
                                
                                <a name="3">
					<h3>Controladores</h3>
				</a>	
					<ol>
                                            
                                                <li>Gestorformatos: Este controlador contiene la comunicacion con las vistas index y _grilla.php; este controlador recibo los datos de las vistas -> transfiere al controlador Pry -> recibe la respuesta de Pry -> Envia a la vista.
                                                    
                                                    <blockquote>
									<?= highlight_file('../../controllers/gestorformatosController.php');	?>	
						   </blockquote>
						</li>
					</ol>
                                
                                <a name="4">
					<h3>Vistas</h3>
				</a>	
					<ol>
						<li>index.php: Esta vista solo hace un llamado a la vista _form2.php
                                                    <blockquote>
									<?= highlight_file('../../views/gestorformatos/index.php');	?>	
						   </blockquote>
						</li>
                                            
                                                <li>_form2.php: Esta en la vista principal la cual contiene los filtros con las acciones onchange, y una accion javascript .ajax, que carga en el div resultados la vista _grilla, esto
                                                    se realiza con el fin de no perder la seleccion de los filtros realizada por el usuario.
                                                    
                                                    <blockquote>
							<?= highlight_file('../../views/gestorformatos/_form2.php');	?>	
						   </blockquote>
						</li>
                                            
                                                <li>_grilla.php: Esta vista solo contiene la grilla que es cargada en resultados una vez se piden datos.
                                                    
                                                    <blockquote>
							<?= highlight_file('../../views/gestorformatos/_grilla.php');	?>	
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
