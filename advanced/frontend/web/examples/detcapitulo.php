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
		<h1><a href="#">Formularios Dinámicos POC</a></h1>
	</div>
	<div id="menu">
		<h2>Detcapitulo:</h2>
        <p>Módulo: Formularios dinámicos POC</p>
				<ul>
                                    <li><a href="#1">Generalizadas</a></li>
                                    <li><a href="#2">Controlador</a></li>
                                    <li><a href="#3">helperHTML</a></li>
                                    <li><a href="#4">SaveCapitulo</a>  
                                    <li><a href="#5">SaveCapitulo</a>  
				</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Detcapitulo:</h2>
				

        
				<a name="1">
					<h3>Generalidades</h3>
				</a>
                                    <p>El acceso a detcapitulo se obtiene desde la vista del dashboard, entrega el detalle de cada uno de los Capitulos
                                    generado en un string con el contenido html de la vista a través del Helperhtml.</p>
                                
                                    <img src="images/img64.JPG" />   
                                 


				<a name="2">
					<h3>Controlador</h3>
				</a>
                                    
                                    <blockquote>
                                                    <?= highlight_file('../../controllers/DetcapituloController.php');	?>
                                    </blockquote>
                                    
                                    <ol>
                                        <li> El controlador DetcapituloController.php se encuentra en el frontend, y su funcion de acceso es actionIndex, la cual solicita al formato las variables:</li>
                                        <ul>
                                            <li> $id_conj_rpta => id del conjunto respuesta</li>
                                            <li> $id_conj_prta => id del conjunto pregunta</li>
                                            <li> $id_fmt => id el formato</li>
                                            <li> $last => ultima version del formato, o version solicitada</li>
                                            <li> $estado => estado del formato</li>
                                            <li> $id_capitulo => id del capitulo a visualizar</li>
                                            <li> $_lastvista => vista desde la cual se realizo la solicitud Ej: dashboard/index</li>
                                        </ul>

                                        <li> La unica variable que puede ser null es el id del capitulo, si se encuentra nulla se redirige la pantalla a detalle Formato, si no es nulla
                                        se presenta la información del capitulo solicitado; el controlador retorna la informacion a la vista create_all como se muestra
                                        en el siguiente bloque en rojo, si se desea enviar la informacion</li>
                                        
                                        <blockquote>
                                                    return $this->render('create_all', [
                                                        'model' => $model,'vista'=>$_string,'permisos'=>$_permisos,'migadepan'=>$_migadepan,'modelgenerales' => $_modelgenerales,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado
                                                    ]);
                                        </blockquote>
                                        
                                        <ul>
                                            <li> Model: es el modelo dinamico creado para las preguntas, en este caso asigna un nombre a cada caja del formulario
                                                donde el usuario ingresa su respuesta con nombre rpta0, rpta1...etc.</li>
                                            <li> Vista:  es un array con el codigo html linea a linea para mostrar en pantalla</li>
                                            <li> Permisos: es un vector con la informacion de los permisos del usuario, las columnas que se encuentran en fd_adm_estado, ej: $permisos['p_actualizar']</li>
                                            <li> Miga de Pan: en un vector con la informacion asociada para regresar a la vista anterior</li>
                                            <li> Modelgenerales: es el modelo de asociacion que lleva los datos del capitulo INFORMACION GENERAL SOLICITANDO si es solicitado</li>
                                            <li> Las variables mencionadas anteriormente que entregan el formato</li>
                                        </ul>

                                    </ol>
                                    
                             <a name="3">
                                 <h3>helperHTML</h3>
                             </a>     
                                    
                                    <p>Dentro del clase helperHTML se encuentra la funcion gen_detacapituloview, la cual se encarga de crear la vista
                                        del detalle capitullo "string html", y ademas nos entrega el modelo de relaciones pregunta - respuesta en la variable
                                        _varpass</p>
                                    
                                    <p>Antes de invocar la funcion gen_detcapitulo, debemos entregar a la clase helperHTML la siguiente informacion:</p>
                                    <ol>
                                        <li>$_helperHTML->id_conj_rpta = id del conjunto pregunta</li>
                                        <li> $_helperHTML->id_fmt = id del formato</li>
                                        <li>$_helperHTML->id_version = version solicitada</li>
                                        <li>$_helperHTML->antvista = enlace a la vista anterior</li>
                                        <li>$_helperHTML->estado = estado del formato</li>
                                    </ol>
                                    
                                    <p> Para generar la vista de detalle capitulo la funcion gen_detacapituloview, solicita la siguiente informacion:</p>
                                    
                                    <ol>
                                        
                                        $_capitulos: array con la informacion del capitulo solicitado la cual se encuentra en la tabla fd_capitulos.
                                        $r_pnoseccion: array con la informacion de la tabla fd_preguntas, y su respuesta asignada en fd_respuestas, segun
                                        que no tiene seccion asociada.
                                        $r_secciones: array con la informacion de la tabla fd_seccion, de las secciones asociadas al capitulo.
                                        $r_pseccion: array con la informacion de las preguntas que tienen seccion asociada y las respuestas asignadas si exiten.
                                        $_numeracionpreg: 'S' si el formato tiene numeracion, 'N' sino se saca de la tabla fd_formato.
                                        $_permisos: array con la informacion de los permisos de la tabla fd_adm_estado del cliente que se encuentra en session.
                                        $_modelgenerales: informacion del modelo asociado a la tabla FdDatosGenerales con el id conjunto respuesta asociado al capitulo.
                                        
                                    </ol>
                                    
                                <a name="4">
                                    <h3>SaveCapitulo</h3>    
                                </a>    
                                    
                                    <p> Dentro de la carpeta helper del frontend, se encuentra la clase savecapitulo, esta clase solicita la informacion que se presenta
                                        a continuación, guarda todo tipo de preguntas excepto las de tipo soporte (Archivos) y el modelo de datos de INFORMACION GENERAL</p>
                                    
                                    $_savecapitulo->_vcapitulo = Yii::$app->request->post() -> array de respuestas entregadas por el usuario del formato.
                                    $_savecapitulo->_idconjprta = $id_conj_prta -> id del conjunto pregunta.
                                    $_savecapitulo->_idconjrpta = $id_conj_rpta -> id del conjunto respuesta.
                                    $_savecapitulo->_idformato = $id_fmt -> id del formato;
                                    $_savecapitulo->_idversion = $last -> ultima version;
                                    $_savecapitulo->_relaciones = variable var_pass entregada por el helper la cual relaciona tipo de pregunta con la respuesta.
                                    $_savecapitulo->_tipo11 = $_filesup -> informacion de los archivos que fueron guardados en la carpeta destino.
                                    $_savecapitulo->_agrupadas = $_helperHTML -> informacion que entrega la clase helper de las preguntas tipo agrupacion.
                                    
                                    
                                    <p> Dentro de este codigo se encuentra una funcion que genera un sql por cada tipo de pregunta que es enviada con su respuesta.</p>
                                    
                                    
                                    <a name="5">Modelo</a>
                                    
                                    <p>El modelo detcapitulo es un modelo dinamico este modelo genera una forma de validación de acuerdo a cada tipo de pregunta
                                        que tiene asociado</p>
                                    
                                    <ul>
                                        <li>r_pnoseccion => array de preguntas sin secciones asociado al capitulo</li>
                                        <li>r_secciones => array de seccion asociadas al capitulo</li>
                                        <li>r_pseccion=> Preguntas que estan asociadas a una seccion</li>
                                    </ul>    
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
