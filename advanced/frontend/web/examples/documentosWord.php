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
		<h2>Creación de Word libreria vsword</h2>
				<p>Módulo: Reportes</p>
				<ul>
					<li><a href="#1">Generación Word HTML </a><a href="../index.php?r=documentoword/create" class="colora" target='blank'>Demo</a></li>
				</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
				<h2>Creación de Word libreria vsword</h2>
				<p>Clase: common\general\documents\genWord</p>
				
				
				<a name="1">
					<h3>Instalación Librerias</h3>
				</a>
					<ol>
						<li>Libreria  phpclasses/vsword: 
                                                    
                                                    <p>La librearia que genera los documentos Word se realizo tomando utilidades de la libreria phpclasses/vsword. Debido a lo anterior se hace necesario primero la intalación con los siguientes pasos:</p>
                                                    <p>Actualizar el composer.js<br/>
                                                        <pre>{
  "require":
{
  "phpclasses/vsword": ">=1.0.14"
},
"repositories":
[
  {
    "type": "composer",
    "url": "https:\/\/www.phpclasses.org\/"
  },
  {
    "packagist": false
  }
]
}</pre></p>
                                                    <p>Tambien se debe crear un usuario en el portal phpclasses.org, una vez se ingresa se obtiene un código (https://www.phpclasses.org/package/8991-PHP-Create-DOCX-Word-document-dynamically-from-HTML.html#download) en el boton composer para poder realizar la intalacion. POr ultimo se debe ejecutar el siguiente comando<br/>
                                                    <pre>composer require phpclasses/vsword</pre></p>
                                                    
						</li>
						
						<li>Uso de la clase: 
                                                    <p>La clase contiene una funcionalidad para generar documentos Word basandose en contenido HTML.
                                                    <br/>En el controlador donde se quiera utilizar esta funcionalidad, se debe llamar la siguiente función:</p>
                                                    <pre>  $GeneraWord->generadorWordHTML($contenido,$nombre,$destino,$portada=null,$indice=null);</pre>
                                                    <p>Donde:
                                                         <br/>
                                                         
                                                         * $contenido es un STRING o un ARRAY de STRING con el Contenido HTML del Word
                                                        <br/> * $nombre es un STRING con el Nombre del archivo word, si el destino es un archivo se debe colocar el path completo
                                                        <br/> * $destino es un String con la información del destino, en este caso si se desea descargar o crear en el servidor como archivo 
                                                        <br/> * $portada es un String opcional con HTML que sera tomado como la portada del documento
                                                        <br/> * $indice  es un String opcional con HTML que sera tomado como la tabla de contenido del documento
                                                        
                                                    </p>
                                                    
						</li>

                                                <li>Parametros de las funciónes de Word: 
                                                    
                                                    <p>Para la correcta generación de las hojas de word, es necesario definir correctamente los parametros en las funciónes, para esto se mostrara con mas detalle como utilizarlo
                                                    <p> *contenido: <br></br>
                                                        Son los datos que se desean enviar a word. Se puede presentar dos casos, que se quiere una sola conjunto de contenido continuo en el word o varias secciones. Para el segundo caso se deben crear las variables como Arrays
                                                        <pre> 
Si es un solo contenido
$contenido='html'
Si son Multiples Hojas
$contenido = [
'seccion1' => 'html', 
'seccion2' => 'html', 
'seccion3' => 'html'
];

<br>                                                        </pre></p>
</li>                                                        
                                            
                                                <li>Interpertacion de estilos: 
                                                    
                                                    <p>Para la correcta interpretancion de los estilos dentro del documento, se debe usar la propiedad class con un nombre, o lllenar la propiedad style en la etiqueta que se quire modificar, y luego dentro de la libreria common/general/documents/initNodesStyles.php se deben ajustar de forma programatica. A continuacion se muestran dos ejemplos de esto
                                                    <p> Propiedad Class<br></br>
                                                       Se busca los tipos de etiquetas a los que se les quiera permitir el uso de la clase y se busca si el valor corresponde a la misma para realizar la modificacion:
                                                        <pre> 
if($tagName == 'div' && isset($attributes['class']) && $attributes['class'] == 'titulo') {
             $p = new \PCompositeNode();
             $r = new \RCompositeNode();
             $p->addNode($r); 
             $r->addTextStyle(new \BoldStyleNode());
             $r->addTextStyle(new \FontSizeStyleNode(16));  
             return $p;
 }

<br>                                                        </pre></p>
                                                        <p> Propiedad Style<br></br>
                                                       Se busca los tipos de etiquetas a los que se les quiera permitir el uso de la clase y se busca la propiedad style, para proceder a parsearla y saber que proiedad poner, como por ejemplo el tamaño de letra:
                                                        <pre> 
if(isset($attributes['style'])) {
        $style = $this->parseStyle($attributes['style']);
        $fontSize = isset($style['font-size']) ? intval($style['font-size']) : 12; 	
        $p = new \PCompositeNode();
        $r = new \RCompositeNode();
        $p->addNode($r);  
        $r->addTextStyle(new \FontSizeStyleNode(   $fontSize ));  
        return $p;
}

<br>                                                        </pre></p>
                                                </li>
						<li>Código fuente de la libreria:
                                                    <p>EL siguiente es el codigo fuente de la libreria generada</p>
							<blockquote>
									<?= highlight_file('../../../common/general/documents/genWord.php');	?>	
							</blockquote>
						</li>
                                                        
                                                <li>Código fuente del widget modificado:
                                                    <p>EL siguiente es el codigo fuente de la libreria para los stilos</p>
							<blockquote>
									<?= highlight_file('../../../common/general/documents/initNodeStyles.php');	?>		
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
