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
		<h1><a href="#">Reportes</a></h1>
	</div>
	<div id="menu">
		<h2>Generación de Documentos Word con la librería phpword</h2>
		<p>Módulo: Reportes</p>
		<ul>
		<li><a href="#1">Generación Word HTML </a><a href="../index.php?r=documentoword/create" class="colora" target='blank'>Demo</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			<h2>Generación de Documentos Word con la librería phpword</h2>	
			<a href="#1"></a>
			
				
				<a name="1">
					<h3>Instalación Librerias</h3>
				</a>
				
                                <ol>
                                    <li>En la carpeta donde se desee instalar, para nuestro caso se encuentra en common/general/documents/wordgenerator, crear
                                        un archivo composer.json, como lo muestra la imagen.</li>
                                    
                                    <img src="images/img71.JPG" />
                                    
                                    <li>Abrir la consola, asegurarse que composer esta instalado y ubicarse en la carpeta creada en este caso common/general/wordgenerator
                                        y ejecutar "composer require phpoffice/phpword".</li>
                                    
                                    <li>Modificar la clase HTML.php que se encuentra dentro de la carpeta "wordgenerator\vendor\phpoffice\phpword\src\PhpWord\Shared\Html.php", este
                                        archivo cuando se descarga del servidor contiene errores modificar por el contenido en este proyecto.</li>
                                    
                                    <li>El aplicativo cuenta con soporte "https://github.com/PHPOffice/PHPWord" o "http://phpoffice.github.io/PHPWord/docs/master/" o "https://github.com/PHPOffice/PHPWord/blob/develop/samples/Sample_26_Html.php", y contiene un listado de ejemplos en la carpeta samples</li>
                             
                                    <li>Si cuenta con la carpeta ubicada en common/general/documents/wordgenerator, basta con pegarla en la misma ubicaicon en su proyecto YII2</li>
                                     
                                </ol>
                            
                            <a href="#2">Configuracion Establecida</a>
                            
                            <ol>
                                <li>La funcion que genera el archivo de word a través del contenido HTML se denomina "genFile" y se encuentra en el algoritmo genWord_ex.php que esta en la raiz del
                                    la carpeta wordgenerator.</li>
                                <li>Esta funcion solicita el nombre del archivo, la ubicacion del archivo css, y el string html.</li>
                                <li>El interprete de estilos reconoce los estilos que se encuentra en el archivo web/css/formato.css, tales como bordes, fondos, fuentes, y margenes</li>
                                <li>El interprete solo reconoce clases no reconoce identificadores</li>
                                
                            </ol>
                            
                            <a href="#3"><h3>Ejemplo de uso para capitulos o Formatos</h3></a>
                            
                            <ol>
                                <li>Cualquier tipo de error en el contenido HTML causará que no sea posible generar el archivo de word</li>
                                <li>En la vista detcapitulo/genvistaformato se genera un link para genera el archivo de word del capitulo o del formato.</li>
                                
                                <blockquote>
						<?= highlight_file('../../views/detcapitulo/_form.php');	?>
				</blockquote>
                                
                                <li>Estos links hacen un llamando a la funcion "actionGenword" que se encuentra en el controlador DetformatoController.php,
                                    como se muestra a continuación</li>
                                
                                <blockquote>
						<?= highlight_file('../../controllers/DetformatoController.php');	?>
				</blockquote>
                                  
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
