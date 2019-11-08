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
			<li class="first"><a href="#" accesskey="1" title="">Generacion de PDFs</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
				<h2>Creacion de PDFs</h2>
				<p>Clase: common\general\documents\genPDF</p>
				<ul>
					<li><a href="#1">Gneracion de PDF </a><a href="../index.php?r=documentopdf/create" class="colora" target='blank'>Demo</a></li>
                                        <li><a href="#2">Ejemplo de Uso</a>
					
				</ul>
				
				<a name="1">
					<h3>Instalación Librerias</h3>
				</a>
					<ol>
						<li>Libreria kartik-v/yii2-mpdf: 
                                                    
                                                    <p>La librearia que genera los PDFs en el proyecto base, se realizo utilizando un modulo ya esxistente dentro del github y que permite la creacion de documentos de este tipo, utilizando etiquetas HTML. Debido a lo anterior se hace necesario primero la intalacion de kartik-v/yii2-mpdf mediante la ejecucion de los siguientes comandos:</p>
                                                    <p>En Linux<br/>
                                                        <pre>$ php composer.phar require kartik-v/yii2-mpdf "*"</pre></p>
                                                    <p>En Windows<br/>
                                                    <pre>composer require kartik-v/yii2-mpdf "*"</pre></p>
							
						</li>
						
						<li>Uso de la clase: 
                                                    <p>En el controlador que se realice para la generacion del pdf se debe crear la variable de tipo genPDF e invocar la función correspondiente, asi:</p>
                                                    <pre> $retorno=$GeneraPdf->generadorPDF($html,$nombre,$propiedadesPagina,$opciones,$metodos,$css,$cssDir); </pre>
                                                    <p>Donde:
                                                         <br/>
                                                         
                                                         * $html es un STRING con el Contenido HTML del pdf
                                                        <br/> * $nombre es un STRING con el Nombre del archivo pdf, si el destino es un archivo se debe colocar el path completo
                                                        <br/> * $propiedadesPagina es un ARRAY con La información de las diferentes propiedades aceptadas por el generedor como el modo, pathTemporal, formato, orientacion, destino, tamanoFuente, fuente, <br>margenIzquierdo, margenDerecho, margenSuperior, margenInferior, margeneEncabezado, margenPie. <br>Se debe llenar con la constantes de la clase o con un valor valido.
                                                        <br/> * $opciones es un ARRAY que Contiene los valores de información del archivo como el title, subject, keywords, autor, creator
                                                        <br/> * $metodos es un ARRAY que Sirve para llamar lo metodos de la libreria mpdf, debe ser un array que tenga la llave con el nombre de la funcion y el valor sea un array 'metodo' => ['SetFooter' =>['{PAGENO}']]
                                                        <br/> * $css es un STRING con la Definición del css incluido en las etiquetas html, no se debe encerrar entre etiquetas STYLE
                                                        <br/> * $cssDir es un STRING con las Ubicación de archivo css, con clases usadas en html, <br>debe tener la ruta de la forma @vendor/kartik-v/yii2-mpdf/assets/bootstrap.min.css
                                                         
                                                         <br/> En caso de necesitar la modificación de la libreria o de ver el uso de laugnas propiedades, se puede consultar el siguiente enlace:
                                                         Tomado de <a href='http://www.mpdfonline.com/repos/mpdfmanual.pdf'>http://www.mpdfonline.com/repos/mpdfmanual.pdf </a>
                                                    </p>
						</li>
                                                <li>Valores por defecto: 
                                                    <p>Dentro de la configuración en common/config/main-local.php es posible agregar los valores que se quieren tomar por defecto al momento de generar el pdf, para esto se debe agregar lo siguiente, utilizando las propiedades de yii2-mpdf</p>
<pre>'pdf' => [
    'class' => Pdf::classname(),
    'format' => Pdf::FORMAT_LETTER,
    'orientation' => Pdf::ORIENT_PORTRAIT,
    'destination' => Pdf::DEST_DOWNLOAD,
    'marginLeft'=>2.54,
    'marginRight'=>2.54,
    'marginTop'=>2.54,
    'marginBottom'=>2.54,
    // refer settings section for all configuration options
],</pre>
                                                </li>
                                            
                                                <li>Propiedades de la Página: 
                                                    
                                                    <p>Para la correcta generacion de las paginas en el pdf, es necesario enviar un Array a la funcion, que se encargue de modificar los valores por defecto. La libreria soporta todas las propiedades de mpdf, principalmente las siguientes:</p>
                                                    <p> *Modo: <br></br>
                                                        Se encarga de definir la codificacion del documento, pueden asignarse las siguientes constantes:
                                                        <pre>MODO_UTF8
MODO_CORE
MODO_BLANK
MODO_ASIAN
                                                        </pre></p>
                                                     <p> *Formato: <br></br>
                                                        Se encarga de definir el tamaño de las hojas, se utilizan los siguientes valores:
                                                        <pre>FORMATO_A3
FORMATO_A4
FORMATO_CARTA
FORMATO_OFICIO
FORMATO_LIBRO 
FORMATO_TABLA
FORMATO_PERIODICO
                                                        </pre></p>
                                                        <p> *Orientación: <br></br>
                                                        Se encarga de definir la orientacion de las hojas, pueden asignarse las siguientes constantes:
                                                        <pre>ORIENTACION_HORIZONTAL 
ORIENTACION_VERTICAL
                                                        </pre></p>
                                                        <p> *Destino: <br></br>
                                                        Se encarga de definir la forma en la que se desea obtener el PDF generado, pueden asignarse las siguientes constantes:
                                                        <pre>DESTINO_NAVEGADOR
DESTINO_DESCARGA
DESTINO_ARCHIVO
DESTINO_STRING
                                                        </pre></p>
                                                        <p> *Destino: <br></br>
                                                        Se encarga de definir la forma en la que se desea obtener el PDF generado, pueden asignarse las siguientes constantes:
                                                        <pre>DESTINO_NAVEGADOR
DESTINO_DESCARGA
DESTINO_ARCHIVO
DESTINO_STRING
                                                        </pre></p>

						</li>
                                            
                                                <li>Opciones:
							<p>Es un array opcional en donde se coloca la meta inforamción para la indexación del pdf del PDF. Estas propiedades pueden ser:
                                                            title, subject, keywords, autor, creator</p>
						</li>
						<li>Código fuente de la libreria:
                                                    <p>EL siguiente es el codigo fuente de la libreria generada</p>
							<blockquote>
									<?= highlight_file('../../../common/general/documents/genPDF.php');	?>	
							</blockquote>
						</li>
						
						
					</ol>
			
				<a name="2">
					<h3>Ejemplo de Uso</h3>
				</a>
                                
                                <p> Un ejemplo de uso se anexa en la funcion actionGenpdf, del controlador DetformatoController.php </p>
                                <blockquote>
                                    <?= highlight_file('../../../frontend/controllers/DetformatoController.php');	?>	
				</blockquote>
                                
                                <p> La invocacion se realiza en la vista "detcapitulo/_form.php", en la declaracion menu vertical</p>
                                <blockquote>
                                    <?= highlight_file('../../../frontend/views/detcapitulo/_form.php');	?>	
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
