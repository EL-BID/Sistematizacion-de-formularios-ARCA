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

				<h2>Detalle Formato:</h2>
				<ul>
                                    <li><a href="#1">Generalizadas</a></li>
				</ul>

        
				<a name="1">
					<h3>Generalidades</h3>
				</a>
                                    <p>El acceso a detalleformato se obtiene desde la vista del gestor de formato, cuando tipo_view = '1', este requerimiento
                                        se ejecuta sobre el mismo controlador de detcapitulo, con algunas variaciones:.</p>
                                
                                <ul>
                                    <li>Detalle formato se abre desde el gestor de formatos, mientras que detalle capitulo se abre desde el dashboard,
                                    esto cambia la variable $antvista => 'gestorformatos/index'.</li>
                                    <li>Detalle formato entrega todos los capitulos del formato para su visualización</li>
                                    <li>Las variables son las mismas, pero en detalle capitulo la variable $id_capitulo=> no va nulla, en cambio en detalle
                                        formato va nulla</li>
                                    <li>La vista es misma en "detcapitulo/createall"</li>
                                    
                                </ul>
                                
                                
                                <a name="2">
                                    <h3>Controlador</h3>
                                </a>
                                
                                <p> Se utiliza el mismo controlador de detalle capitulo DetcapituloController.php</p>
                                
                                <p> A continuacion se muestra un ejemplo del valor de las variables de solicitud del controlador a través de la funcion index, para presentar 
                                    la informacion de detalle formato en la vista detcapitulo/createall</p>
                                
                                <ul>
                                    <li>'r' => 'detcapitulo/genvistaformato' : accion a la que redirecciona index</li>
                                    <li>'capitulo' => '' : informacion en la variable capitulo vacia</li>
                                    <li>'id_conj_rpta' => '1': id del conjunto de respuestas seleccionado en gestor formatos.</li>
                                    <li>'id_conj_prta' => '1': id del conjunto pregunta relacionado al formato seleccionado.</li>
                                    <li>'id_fmt' => '1': id del formato seleccionado.</li>
                                    <li>'last' => '1': id de la version de formato solicitado.</li>
                                    <li>'estado' => '1': id del estado del formato solicitado.</li>
                                    <li>'provincia' => '4': seleccion en el combo provincia en gestor formatos.</li>
                                    <li>'cantones' => '': seleccion en el combo cantones en gestor formatos.</li>
                                    <li>'parroquias' => '': seleccion en el combo parroquias en gestor formatos.</li>
                                    <li>'periodos' => '': seleccion en el combo periodoe en gestor formatos.</li>
                                    <li>'antvista' => 'gestorformatos/index': vista anterior a la vista actual.</li>
                                </ul>
                                
                                <a name="3">
                                 <h3>helperHTML</h3>
                                </a>     
                                    
                                    <p>Dentro del clase helperHTML se encuentra la funcion gen_detacapituloview, la cual se encarga de crear la vista
                                        del detalle formato "string html", y ademas nos entrega el modelo de relaciones pregunta - respuesta en la variable
                                        _varpass, para ver un ejemplo se entrega una imagen de un Yii:trace realizado a las variables de salida (ver linea
                                        352 a la 354 en la funcion genvistaformato de DetcapituloController.php):</p>
                                     
                                    <li>helperHTML-> agrupadas: En un array que entrega los id_agrupacion al cual pertenece una pregunta el "key" asociativo
                                        en el array es el id de la pregunta en la tabla fd_preguntas. Ej: ['194'=>1,'291'=>1,'970'=>1,'1164'=>1...],
                                        esa variable es utilizada por la clase savecapitulo, para diferenciar si una pregunta hace parte de una agrupacion de preguntas
                                        dado que de la agrupacion solo se guarda una respuesta.</li>
                                
                                    <li>helperHTML-> string: En un array que entrega todo el codigo html que se imprimirá en la vista,
                                        esta variable lleva todo el formulario asociado al modelo de datos que permite las validaciones, este array
                                        contiene asociaciones de codigo php, pues html es estatico y se necesitan eventos para las validaciones; cada una
                                    de las lineas es una posicion en el array.</li>
                                
                                    <img src="images/img65.JPG" />
                                    
                                     <li>helperHTML-> _varpass: En un string que entrega las asocaciones id_pregunta contra valor respuesta en el modelo,
                                     cada elemento del string se encuentra separado por "%%", y dentro de cada elemento se encuentra no_cajaformaulario::id_pregunta::id_tpregunta::id_respuesta::id_capitulo,
                                     un ejemplo es el siguiente: 0:::8:::4:::841:::2%%1:::9:::4:::842:::2, en esta caso el string trae dos elementos,
                                     el primero pertenece al elemento del formaulario con nombre rpta0, que guarda el id_pregunta=8 que es de tipo pregunta 4, y anteriormente
                                     se guardo una respuesta con id_respuesta 841 y pertenece al capitulo 2.</li>
                                
                                    
                                    <p>Antes de invocar la funcion gen_detcapitulo, debemos entregar a la clase helperHTML la siguiente informacion:</p>
                                    <ol>
                                        <li>$_helperHTML->id_conj_rpta = id del conjunto pregunta</li>
                                        <li> $_helperHTML->id_fmt = id del formato</li>
                                        <li>$_helperHTML->id_version = version solicitada</li>
                                        <li>$_helperHTML->antvista = enlace a la vista anterior</li>
                                        <li>$_helperHTML->estado = estado del formato</li>
                                        <li> $_helperHTML->periodos = id del periodo seleccionado en la anterior vista</li>
                                        <li>$_helperHTML->cantones = id del canton seleccionado en la anterior vista</li>
                                        <li>$_helperHTML->parroquias = id de la parroquia seleccionada en la anterior vista</li>
                                        <li>$_helperHTML->provincia = id de la provincia seleccionada en al anterior vista</li>
                                    </ol>
                                    
                                    <p> Para generar la vista de detalle capitulo la funcion gen_detacapituloview, solicita la siguiente informacion:</p>
                                    
                                    <ol>
                                        
                                        $_capitulos: para detalle formato esta variable va vacia.
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
