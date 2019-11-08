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
		<h1><a href="#">Generadores Gii</a></h1>
	</div>
	<div id="menu">
		<h2>Creación de modelARCA</h2>
		<p>Módulo: Generadores</p>
				<ul>
					<li><a href="#0">Clases</a></li>
					<li><a href="#1">Generator.php</a></li>
					<li><a href="#2">modelpry.php</a></li>
                    <li><a href="#3">endidadmodel.php</a></li>
                    <li><a href="#4">endidadmodeltest.php</a></li>
				</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
				<h2>Creación de modelARCA</h2>
				<p>Generadores código personalizado</p>
						
                                <br></br><br></br>
				<a name="0"><h3>Clases</h3></a>
				
				<p>Para los generadores de arca se propone un conjunto de clases como se se aprecia en la siguiente imagen, en este para el modelo se generaran dos clases. 
                                    <br></br>
                                    La primera de estas se genera con la plantilla modelpry.php, esta clase herada de ActiveRecords de Yii2, adicional en esta se define el modelo. 
                                    <br></br>
                                    La segunda plantilla es entidadmodel.php, esta genera una clase que hereda de modelpry, en ella se utilizan las funcionalidades de la clase padre, en la clase generada por esta plantilla se deben agregar los ajustes adicionales a la información obtenida del modelo; un objeto de esta clase es el que debe ser instanciado en el controlador.
                           
                                   </p>
													
                                <img src="images/modelo.png" />
                                <br></br><br></br>
				
                              	<p>Adicional a las dos clases mencionadas, se creo una plantilla para la generacion de pruebas unitarias, esta plantilla es entidadmodeltest.php, en ella se generan las funciones necesarias para que el motor de pruebas unitarias relice las correspondientes acciones.
                                    <br></br>
                                    Una clase que es muy importante dentyro del modelARCA es generator.php, en esta se encuentran las validaciones del formulario que aparece para generar el código del modelo, y dentor de sus funciones la mas importate es generate(), en donde se incluyen las plantillas que generan el código fuente y se instancias y se envian los parametros necesatios para el funcionemiento de estas palntillas.
                                    <br></br>
                          
                                </p>
                                
                                <img src="images/modelARCA.png" />
				<br></br><br></br>
				<a name="1"><h3>Generator.php</h3></a>
				
                                <p>Esta es la clase central del generador, hereda todas las capacidades de <a href="http://www.yiiframework.com/doc-2.0/yii-gii-generators-model-generator.html">\yii\gii\Generator</a>.
                                     Gii la utiliza para realizar las validaciones en el formulario de generar el código fuente del modelo, tiene una funcione llamada requiredTemplates, en donde se deben definir cuales plantillas deben existir para realizar la generacion del código fuente.
                                     <br></br>
                                     La función mas importante de esta clase es generate(), en ella se debe crear un nuevo objeto dentro del array Files, en el cual se indica el lugar de creacion de la clase a generar y la funcion que se encargara de renderizarlas y pasarle los parametros necesarios para crear el código fuente.
                                     A continuacion se puede ver como quedó el código fuente de esta clase al momento de realizar este WIKI
                                
                                </p>
					
                                    		<blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/modelARCA/Generator.txt');	?>			
						</blockquote>
				
				
                                <br></br><br></br>
				
				<a name="2"><h3>modelpry.php</h3></a>
				
				<p>La siguiente clase que se genero es modelpry.php, esta herada de <a href="http://www.yiiframework.com/doc-2.0/yii-db-activerecord.html">\yii\db\ActiveRecord</a>. Esta genera las reglas para el manejo de los datos, en ella se debe generar la comunicación con la base de datos.
                                    <br></br>
                                    Al momento de la creacion de este wiki se generan las funciones tableName(),rules(),attributeLabels() y las funciones get[campoRelacion] (por ejemplo getFuentes()). Estas ultimas funciones se encargan de realizar la busqueda de datos solbre las llaves foraneas que pertenezcan a la table que se le esta generando el modelo.
                                    <br></br>
                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se generan estas funciones:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/modelARCA/default/modelpry.php');	?>			
						</blockquote>
				
                                <br></br><br></br>
				
				<a name="3"><h3>entidadmodel.php</h3></a>
				
				<p>Otra clase que se genero es entidadmodel.php, esta herada de modelpry.php. En ella se utilizan las funcionalidades de la clase que hereda, adicionalmente en ella se debe realizar las acciones de persistencia de datos.
                                    <br></br>
                                    Al momento de la creacion de este wiki se generan las funciones tableName(),rules(),attributeLabels() y las funciones get[campoRelacion] (por ejemplo getFuentes()). 
                                     En cada una de ellas se ve como reutiliza las funcionalidades de la clase que hereda mediente el uso de la palabra resevada parent.
                                    <br></br>
                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se generan estas funciones:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/modelARCA/default/entidadmodel.php');	?>			
						</blockquote>
			
                                 <br></br><br></br>
				
				<a name="4"><h3>entidadmodeltest.php</h3></a>
				
				<p>Esta clase genera el código necesario para realizar las pruebas unitarias. La clase generada queda ubicada en la carpeta test del frontend, backend o common, segun se indique la ubicacion de la clase del modelo.
                                    <br></br>
                                    Esta clase hereda de <a href="http://codeception.com/docs/05-UnitTests">\Codeception\Test\Unit</a>, en ella se crea una funcion test por cada funcion existente en el modelo, en ella se genera el código minimo necesario para realizar pruebas unitarias.
                                    Cada una de las funciones contiene funciones asserts, ellas son las encargadas de evaluar los diferentes objetos y valores calculados en las diferentes funciones test.
                                    Para una descripcion mas de tallada de cada una de las funciones assert se recomienda revisar la documentacion <a hrer="http://codeception.com/docs/modules/Asserts" ></a>correspondiente.
                                    <br></br>
                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se generan estas funciones:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/modelARCA/default/entidadmodeltest.php');	?>			
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
		<p>Manual YII 2017-06-19</p>
	</div>
</div>
</body>
</html>
