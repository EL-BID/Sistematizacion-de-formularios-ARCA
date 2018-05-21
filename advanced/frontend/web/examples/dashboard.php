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
		<h2>Dashboard:</h2>
        <p>Módulo: Formularios Dinámicos POC</p>
				<ul>
                                    <li><a href="#1">Generalizadas</a></li>
                                    <li><a href="#2">Modelos</a></li>
                                    <li><a href="#3">Controladores</a></li>
                                    <li><a href="#4">Vistas</a> 
                                    <li><a href="#5">helperHTML->gen_dasboardview</a> 
				</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">

				<h2>Dashboard:</h2>
				<ul>
                                    <li><a href="#1">Generalizadas</a></li>
                                    <li><a href="#2">Modelos</a></li>
                                    <li><a href="#3">Controladores</a></li>
                                    <li><a href="#4">Vistas</a> 
				</ul>

        
				<a name="1">
					<h3>Generalidades</h3>
				</a>
                                    <p>El acceso a dashboard se da a través del link "ver" del gestor de formatos, este accede cuando el valor de la variable id_tipo_view_formato
                                        de la tabla fd_formatos es igual a "2", una vez se da clic en el link ver de la grilla se despliega un mensaje indicandole al usuaro que
                                        se dirigirá a el Dashboard</p>
                                
                                    <img src="images/img62.JPG" />   
                                    
                                    <p> Al acceder a la pantalla esta crea un icono en una caja para cada uno de los capitulos que contiene el formato</p>
                                    <img src="images/img63.JPG" />   


				<a name="2">
					<h3>Controlador</h3>
				</a>
                                    <ol>
                                        <li> El controlador DashboardController.php se encuentra en el frontend, y su funcion de acceso es actionIndex, la cual solicita al formato las variables:</li>
                                        <ul>
                                            <li> $id_conj_rpta => id del conjunto respuesta</li>
                                            <li> $id_conj_prta => id del conjunto pregunta</li>
                                            <li> $id_fmt => id el formato</li>
                                            <li> $last => ultima version del formato, o version solicitada</li>
                                            <li> $estado => estado del formato</li>                                        
                                        </ul>

                                        <li> Ninguna de las variables anterior puede encontrarse null o vacia</li>

                                         <li>Se buscan los permisos del usuario que se encuentro en sesion, si no existe usuario en session o este usuario no tiene permisos
                                         para actualizar se devuelve al index del sistema.</li>
                                        
                                        <li>Se buscan los capitulos asociados a través del modelo FdCapituloSearch en la clase searcCapFormato esta clase necesita las variables id del formato,
                                        id del conjunto pregunta, y el estado, la salida es un array con la informacion de los capitulos asociados al formato de la tabla fd_capitulo, y en el campo
                                        condiciones nos entrega un valor mayor que cero si el capitulo se encuentra condicionado.</li>
                                        
                                        <li>Se verifican las condiciones segun el campo "condiciones" del array obtenido en el item anterior, si las condiciones no
                                            se cumplen se elimina el capitulo del array obtenido en el item anterior</li>
                                        
                                        <li>Se envia la informacion de los capitulos a presenta a la clase HelperHTML en la funcion gen_dashboardview la cual solicita
                                            el array de capitulos que se obtuvo despues de evaluar condiciones, id del conjunto respuesta, id del conjunto pregunta, id formato,
                                            ultima version, estado del formato, ultima vista para retorno,y los permisos del usuario</li>
                                        
                                        <li>La clase HelperHTML nos devolvera un array con cada una de las lineas de codigo HTML a ejecutar en la vista</li>
                                        
                                        
                                        <p>Codigo Controlador DashboardController.php</p>
                                          <blockquote>
                                                    <?= highlight_file('../../controllers/DashboardController.php');	?>
                                           </blockquote>
                                    </ol>     
                                        
                                        
                                        

                                <a name="3">
					<h3>Modelos</h3>
				</a>
					<ol>
                                            <li>Los modelos utilizados son los establecidos en el common y se listas a continuación con su ruta</li>
                                            
                                            <ul>
                                                <li>common\models\poc\FdCapituloSearch: Se utiliza en la funcion Index para obtener los capitulos de un formato</li>
                                                <li>common\models\poc\FdAdmEstadoSearch: Se utiliza en la funcion Index para obtener los permisos del usuario</li>
                                                <li>common\models\poc\FdElementoCondicion: Se utiliza en la funcion evaluarcondicion permite traer las condiciones asociadas a un capitulo</li>;
                                                <li>common\models\poc\FdPregunta: Se utiliza en a funcion valor_pregunta esta funcion nos entrega la respuesta a una pregunta, se utiliza
                                                    cuando se necesita evaluar la condicion del capitulo asociada a una pregunta habilitadora</li>
                                                <li>common\models\poc\FdRespuesta: Se utiliza en la funcion valor_pregunta para obtener la respuesta a la pregunta</li>
                                            </ul>
					</ol>

                                    
                                    
                                <a name="4">
					<h3>Vista</h3>
				</a>
                                <p> El dashboard cuenta con una unica vista "Index".</p>
                                        <blockquote>
                                                                  <?= highlight_file('../../views/dashboard/index.php');	?>
                                        </blockquote>
                                
                                
                                 <a name="4">
					<h3>HelperHTML</h3>
				</a>
                                
                                <p> A traves de la funcion gen_dashboardview del helperHTML se genera la vista del dashboard, en la funcion se presentan
                                    los campos que recibe</p>
                                
                                <img src="images/img69.JPG">
                                     
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
