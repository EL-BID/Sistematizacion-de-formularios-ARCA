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
        <h2>Creacion de Excel</h2>
		<p>Módulo: Reportes</p>
		<ul>
			<li><a href="#1">Gneracion Excel HTML </a><a href="../index.php?r=documentoexcel/create" class="colora" target='blank'>Demo</a></li>
			<li><a href="#1">Gneracion Excel Modelos</a><a href="../index.php?r=documentoexcel/model" class="colora" target='blank'>Demo</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
				<h2>Creacion de Excel</h2>
				<p>Clase: common\general\documents\genExcel</p>
				
				
				<a name="1">
					<h3>Instalación Librerias</h3>
				</a>
					<ol>
						<li>Libreria kmoonlandsoft/yii2-phpexcel: 
                                                    
                                                    <p>La librearia que genera los documentos Excel se realizo modificando y basandose en el widget de moonlandsoft/yii2-phpexcel. Debido a lo anterior se hace necesario primero la intalacion de kartik-v/yii2-mpdf mediante la ejecucion de los siguientes comandos:</p>
                                                    <p>En Linux<br/>
                                                        <pre>php composer.phar require --prefer-dist moonlandsoft/yii2-phpexcel "*"</pre></p>
                                                    <p>En Windows<br/>
                                                    <pre>composer require --prefer-dist moonlandsoft/yii2-phpexcel "*"</pre></p>
                                                    <p>Se deja como back up la libreria ExcelARCA al final de esta sección, en caso de actualizar la libreria moonlandsoft/yii2-phpexcel realizar merge con los ajustes realizados para ARCA</p>
						</li>
						
						<li>Uso de la clase: 
                                                    <p>La clase contiene dos funcionalidades, la primera sirve para generar documentos Excel basandose en contenido HTML, y la seguda mediante el manejo de modelos.
                                                    <br/>En el controlador donde se quiera utilizar alguna de estas dos funcionalidades, se deben llamar las siguientes funciones:</p>
                                                    <p>Basado en HTML:</p>
                                                    <pre>  $GeneraExcel->generadorExcelHTML($datos,$nombre,$destino);</pre>
                                                    <p>Donde:
                                                         <br/>
                                                         
                                                         * $datos es un STRING o un ARRAY de STRING con el Contenido HTML del Excel
                                                        <br/> * $nombre es un STRING con el Nombre del archivo excel, si el destino es un archivo se debe colocar el path completo
                                                        <br/> * $destino es un String con la información del destino, en este caso si se desea descargar o crear en el servidor como archivo 
                                                        
                                                    </p>
                                                    <p>Basado en Modelos:</p>
                                                    <pre>  $GeneraExcel->generadorExcel($datos,$columnas,$nombre,$destino,$encabezados);</pre>
                                                    <p>Donde:
                                                         <br/>
                                                         
                                                         * $datos es un MODEL o ARRAY de MODEL con las cosnultas a la base de datos
                                                        <br/> * $columnas es un STRING o ARRAY de STRING (en caso que datos sea array ) con el nombre de las columnas que se quieren usar en cada modelo
                                                        <br/> * $nombre es un STRING con el Nombre del archivo excel, si el destino es un archivo se debe colocar el path completo
                                                        <br/> * $destino es un String con la información del destino, en este caso si se desea descargar o crear en el servidor como archivo 
                                                        <br/> * $encabezados es un ARRAY de STRING (en caso que datos sea array ) con el nombre nuevo que se le desea poner a las columnas
                                                        
                                                        
                                                    </p>
						</li>

                                                <li>Parametros de las funciones de Excel: 
                                                    
                                                    <p>Para la correcta generacion de las hojas de excel, es necesario definir correctamente los parametros en las funciones, para esto se mostrara con mas detalle como utilizarlo
                                                    <p> *Datos: <br></br>
                                                        Son los datos que se desean enviar a excel, ya sea por modelo o por HTML. Se puede presentar dos casos, que se quiere una sola hoja en el excel o varias de estas. Para el segundo caso se deben crear las variables como Arrays
                                                        <pre> Para HTML:<br>

Si es una sola hoja
$datos='html'
Si son Multiples Hojas
$datos = [
'sheet1' => 'html', 
'sheet2' => 'html', 
'sheet3' => 'html'
];

<br>
<br>
Para Models:<br>
Si es una sola hoja
$datos=$model
Si son Multiples Hojas
$datos = [
'sheet1' => $model1, 
'sheet2' => $model2, 
'sheet3' => $model3
];
Los valores en 'sheet1'... son los titulos con los que se generan las hojas.
                                                        </pre></p>
                                                     <p> *Columnas: <br></br>
                                                        En caso de ser generación de Excel con modelos, se puede enviar opcionalmente cuales son las columnas de la consulta que se quieren mostrar, pero esto varia de acuerdo a si el modelo es uno solo o es un array, asi:
                                                        <pre>Si es una sola hoja
$columnas = ['column1','column2','column3'];

Si son Multiples Hojas
$columnas=['sheet1' => ['column1','column2','column3'], 
'sheet2' => ['column1','column2','column3'], 
'sheet3' => ['column1','column2','column3']];
En este caso los nombres deben coincidir con los indicados en datos.
                                                        </pre></p>
                                                        <p> *Encabezados: <br></br>
                                                        En caso de querer cambiar los nombres de las columnas en la hoja se procede a enviar la siguiente variable:
                                                        <pre>Si es una sola hoja
$encabezado = ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'];

Si son Multiples Hojas
$encabezado = [
        'sheet1' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'], 
        'sheet2' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'], 
        'sheet3' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3']
];
                                                        </pre></p>
                                                        
						<li>Código fuente de la libreria:
                                                    <p>EL siguiente es el codigo fuente de la libreria generada</p>
							<blockquote>
									<?= highlight_file('../../../common/general/documents/genExcel.php');	?>	
							</blockquote>
						</li>
                                                        
                                                <li>Código fuente del widget modificado:
                                                    <p>EL siguiente es el codigo fuente de la libreria generada</p>
							<blockquote>
									<?= highlight_file('../../../vendor/moonlandsoft/yii2-phpexcel/ExcelARCA.php');	?>	
							</blockquote>
						</li>
						
						
					</ol>
			
				
                                <p>Generacion de Excel a traves de la libreria PHPEXCEL con estilos</p>
                                
                                <ol>
                                    <li>Para generar un archivo de excel de un contenido HTML de un formato, se utilizara la funcion "actionGenexcel",
                                        del controlador DetformatoController.php:
                                        <img src="images/img70.JPG" />
                                    
                                        <ul>
                                            <li>id_conjunto_rpta => id del conjunto respuesta del formato a pasar a excel.</li>
                                            <li>id_conjunto_prta => id del conjunto pregunta asociado al formato</li>
                                            <li>id_fmt => id del formato</li>
                                            <li>last=> ultima version del formato</li>
                                            <li>estado=> estado del formato</li>
                                            <li>nombre_formato => nombre del formato</li>
                                            <li>id_capitulo => id del capitulo, esto en caso de que se requiera solo un capitulo especifico del formato</li>
                                        </ul>
                                 </li>
                                    
                                    <li>Cuando se visualiza el formato a travès de detcapitulo/genvistaformato, la vista genera un boton para la generacion del archivo
                                        de excel, que invoca a la funcion "actionGenExcel" del controlador DetformatoController</li>
                                    
                                    <li>La funcion actionGenExcel, general el contenido HTML del capitulo o formato a través de la funcion actionGenhtml que esta en el mismo controlador.</li>
                                    <li>Luego ya con el contenido HTML listo, el nombre del formato, y la ubicacion del archivo css, que para el caso de los capitulos se encuentra en frontend/web/css/formato.css,
                                        genera el archivo de excel en la funcion generadorExcelHTML2, la diferencia con generadorExcel, es que esta funcion genera el excel solo en forma
                                        descarga y es capaz de interpretar los estilos basicos que se presentan en formato.css</li>
                                    
                                    <p>ANOTACION: El archivo de excel solo interpreta clases en el formato css, no es capaz de interpretar identificadores.</p>
                                    
                                    <blockquote>
                                                    <?= highlight_file('../css/formato.css');	?>	
                                    </blockquote>
                                    
                                    <p>Interpretacion de estilos para excel</p>
                                    
                                    <li>La intepretacion de estilos se realiza a traves de las funciones "classceldas" y "responsecss", la primera funciona a travès del metodo
                                        DOM entrega un array que relaciona la celda con la clase, de esta forma se tiene un array asi: $class=['class'=>'tbcapitulo','celda'=>'A1'],['class'=>'labelpregunta','celda'=>'A2']....
                                    </li>
                                    <li>La funcion responsecss, intepreta los estilos y los convierte a estilos de excel generando una matriz de estilos que es intepretada por la funcion
                                        generadora</li>
                                    
                                    <p>$styleArray['tbcapitulo'] = array(
                                                    'font' => array(
                                                        'bold' => true,
                                                    ),
                                                    'alignment' => array(
                                                        'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                                                    ),
                                                    'borders' => array(
                                                        'top' => array(
                                                            'style' => \PHPExcel_Style_Border::BORDER_THIN,
                                                        ),
                                                    ),
                                                    'fill' => array(
                                                        'type' => \PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                                                        'rotation' => 90,
                                                        'startcolor' => array(
                                                            'argb' => 'FFA0A0A0',
                                                        ),
                                                        'endcolor' => array(
                                                            'argb' => 'FFFFFFFF',
                                                        ),
                                                    ),
                                                    );</p>
                                    
                                    <li>Teniendo la celda en la que se debe aplicar la clase y los estilos organizados por clase convertidos a formato Excel, la funcion generador
                                        realiza un recorrido por las clases del archivo y aplica los estilos</li>
                                    
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
