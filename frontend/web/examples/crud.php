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
		<h1><a href="#">Generadores</a></h1>
	</div>
	<div id="menu">
        <h2>Creación de crudARCA</h2>
		<p>Generadores código personalizado</p>
		<ul>
			<li><a href="#0">Clases</a></li>
			<li><a href="#1">Generator.php<</a></li>
			<li><a href="#2">fachadapry.php</a></li>
            <li><a href="#3">entidadfachada.php</a></li>
            <li><a href="#4">controllerpry.php</a></li>
            <li><a href="#5">entidadcontroller.php</a></li>
            <li><a href="#6">search.php</a></li>
            <li><a href="#7">entidadfachadatest.php</a></li>
            <li><a href="#8">entidadcontrollertest.php</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			
				<h2>Creación de crudARCA</h2>
				<p>Generadores código personalizado</p>
				
				
                                <br></br><br></br>
				<a name="0">Clases</a>
				
				<p>Para los generadores de arca se propone un conjunto de clases como se se aprecia en la siguiente imagen, en este para el controlador se proponen 4 clases, que estan agrupadas de a dos. 
                                    <br></br>
                                    La primera de estas se genera con la plantilla fachadapry.php, en esta se definen las funciones basicas de la fachada. 
                                    <br></br>
                                    La segunda plantilla es entidadfachada.php, esta genera una clase que hereda de fachadapry.php, en ella se implementan las funciones, aqui es donde tambie se instancia el objeto de la clase obtenida de entidadModel.
                                    <br></br>
                                    La tercera plantilla es controllerpry.php, esta clase herada de Controler de Yii2, adicional en esta se definen las funciones basicas del controlador. 
                                    <br></br>
                                    La cuarta plantilla es entidadcontroller.php, esta define una clase que hereda de controllerpry.php, en ella se implementan las funciones que son usadas por la vista o cualquier otra calse que necesite instanciar un objeto del controlador, adicionalmente esta clase se comunica con entidadFachada mediante la cracion de un objeto de la misma.
                                   </p>
													
                                <img src="images/modelo.png" />
                                <br></br><br></br>
				
                              	<p>Adicional a las dos clases mencionadas, se creo dos plantillas para la generacion de pruebas unitarias, estas plantillas son entidadfachadatest.php y entidadcontrollertest.php,
                                     en ella se generan las funciones necesarias para que el motor de pruebas unitarias relice las correspondientes acciones.
                                    <br></br>
                                    Una clase que es muy importante dentyro del crudlARCA es generator.php, en esta se encuentran las validaciones del formulario que aparece para generar el código del CRUD, y dentro de sus funciones la mas importate es generate(), en donde se incluyen las plantillas que generan el código fuente y se instancias y se envian los parametros necesatios para el funcionamiento de estas palntillas.
                                    <br></br>
                          
                                </p>
                                
                                <img src="images/crudARCA.png" />
				<br></br><br></br>
                                <p>En la siguiente imagen se puede ver la secuencia de como es el funcionamiento completo del conjunto de clases planteado.
                                    <br></br>
                                    Como se aprecia, al momento de que un actor interactua con una de las vistas, esta realiza el llamado al controlador, que seria la calse generada por entidadcontroller.php, luego esta va a la fachada, esta a su vez utiliza las utilidades que estan el clases del modelo (entidadmodel.php), una vez se obtenga la respuesta, la fachada (entidadfachada.php) realiza la verificación de los valores, aplica las regals de negocio, para devolver la respuesta al controlador y que esta informacion sea mostrada por la vista.
                                    <br></br>
                          
                                </p>
                                
                                <img src="images/secuencia.png" />
				<br></br><br></br>
                                
				<a name="1">Generator.php</a>
				
                                <p>Esta es la clase central del generador, hereda todas las capacidades de <a href="http://www.yiiframework.com/doc-2.0/yii-gii-generators-model-generator.html">\yii\gii\Generator</a>.
                                     Gii la utiliza para realizar las validaciones en el formulario de generar el código fuente del CRUD, tiene una funcione llamada requiredTemplates, en donde se deben definir cuales plantillas deben existir para realizar la generacion del código fuente.
                                     <br></br>
                                     La función mas importante de esta clase es generate(), en ella se debe crear un nuevo objeto dentro del array Files, en el cual se indica el lugar de creacion de la clase a generar y la funcion que se encargara de renderizarlas y pasarle los parametros necesarios para crear el código fuente.
                                     A continuacion se puede ver como quedó el código fuente de esta clase al momento de realizar este WIKI
                                
                                </p>
					
                                    		<blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/crudARCA/Generator.txt');	?>			
						</blockquote>
				
				
                                <br></br><br></br>
				
				<a name="2">fachadapry.php</a>
				
				<p>La siguiente clase que se genero es fachadapry.php. Esta genera las funciones de la fachada para que sean redefinidas en entidadfachada.php.
                                    <br></br>
                                    Al momento de la creacion de este wiki se generan las funciones actionProgress($urlroute=null,$id=null), actionIndex(), actionView($cod_anexo, $cod_ficha), actionCreate(), actionUpdate($cod_anexo, $cod_ficha), actionDeletep($cod_anexo, $cod_ficha), y findModel($cod_anexo, $cod_ficha).
                                    <br></br>
                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se generan estas funciones:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/crudARCA/default/fachadapry.php');	?>			
						</blockquote>
				
                                <br></br><br></br>
				
				<a name="3">entidadfachada.php</a>
				
				<p>Otra clase que se genero es entidadfachada.php, esta herada de fachadapry.php. En ella se utilizan se redefinen las funciones de la clase fachadapry, en ella se reallizan las acciones de verificacion de valors, formateo de informacion, aplicar las reglas de negocion y ejecuta las acciones.
                                    <br></br>
                                    Al momento de la creacion de este wiki se redefinen las funciones actionProgress($urlroute=null,$id=null), actionIndex(), actionView($cod_anexo, $cod_ficha), actionCreate(), actionUpdate($cod_anexo, $cod_ficha), actionDeletep($cod_anexo, $cod_ficha), y findModel($cod_anexo, $cod_ficha).
                                     En cada una de ellas se ve como se ejecutan las acciones indicadas.
                                    <br></br>
                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se generan estas funciones:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/crudARCA/default/entidadfachada.php');	?>			
						</blockquote>
			
                                 <br></br><br></br>
				
				<a name="4">controllerpry.php</a>
				
                                <p>Esta clase genera el código necesario para definir las clases y obtener las funcionalidades de la clase que hereda de Yii, la cual es <a href="http://www.yiiframework.com/doc-2.0/yii-base-controller.html">yii\base\Controller</a>, esto nos permite utilizar funciones como redirect y render, las cuales son muy utilizadas para el llamado a las vistas.
                                    <br></br>

                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se genera:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/crudARCA/default/controllerpry.php');	?>			
						</blockquote>
				 <br></br><br></br>
				
				<a name="5">entidadcontroller.php</a>
				
                                <p>Esta clase genera el código necesario para definir las clases y obtener las funcionalidades de la clase que hereda de Yii, la cual es <a href="http://www.yiiframework.com/doc-2.0/yii-base-controller.html">yii\base\Controller</a>, esto nos permite utilizar funciones como redirect y render, las cuales son muy utilizadas para el llamado a las vistas.
                                    <br></br>
                                    En esta clase se genera la instancia de la clase generada con entidadfachada, utilizando todas las funcionalidades que esta ofrece, adicionalmente se realiza la asignacion de valores para la ejecucion de las mismas, y se deben manipular los diferentes errores generados.
                                    <br></br>

                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se genera:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/crudARCA/default/entidadcontroller.php');	?>			
						</blockquote>
                                 <br></br><br></br>
				
				<a name="6">search.php</a>
				
                                <p>Esta clase genera el código necesario para el formulario de busqueda , esta clase hereda y extiende las funcionalidades de la clases generada con la plantilla entidadmodel.php<a href="model.php#3">entidadmodel.php</a>.
                                    
                                    <br></br>
                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se genera:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/crudARCA/default/search.php');	?>			
						</blockquote>
                                
                                <a name="7">entidadfachadatest.php</a>
				
                               <p>Esta clase genera el código necesario para realizar las pruebas unitarias de la clase generada con entidadfachada.php. La clase generada queda ubicada en la carpeta test del frontend, backend o common, segun se indique la ubicacion de la clase del modelo.
                                    <br></br>
                                    Esta clase hereda de <a href="http://codeception.com/docs/05-UnitTests">\Codeception\Test\Unit</a>, en ella se crea una funcion test por cada funcion existente en entidadfachada.php y que sea publica, en ella se genera el código minimo necesario para realizar pruebas unitarias.
                                    Cada una de las funciones contiene funciones asserts, ellas son las encargadas de evaluar los diferentes objetos y valores calculados en las diferentes funciones test.
                                    Para una descripcion mas de tallada de cada una de las funciones assert se recomienda revisar la documentacion <a hrer="http://codeception.com/docs/modules/Asserts" ></a>correspondiente.
                                    <br></br>
                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se generan estas funciones:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/crudARCA/default/entidadfachadatest.php');	?>			
						</blockquote>
                                
                                <a name="8">entidadcontrollertest.php</a>
				
                                <p>Esta clase genera el código necesario para realizar las pruebas unitarias de la calse entidadcontroler.php. La clase generada queda ubicada en la carpeta test del frontend, backend o common, segun se indique la ubicacion de la clase del modelo.
                                    <br></br>
                                    Esta clase hereda de <a href="http://codeception.com/docs/05-UnitTests">\Codeception\Test\Unit</a>, en ella se crea una funcion test por cada funcion existente en entidadcontroler.php y que sea publica, en ella se genera el código minimo necesario para realizar pruebas unitarias.
                                    Cada una de las funciones contiene funciones asserts, ellas son las encargadas de evaluar los diferentes objetos y valores calculados en las diferentes funciones test.
                                    Para una descripcion mas de tallada de cada una de las funciones assert se recomienda revisar la documentacion <a hrer="http://codeception.com/docs/modules/Asserts" ></a>correspondiente.
                                    <br></br>
                                    El siguiente código es el que actualmente tiene la plantilla y muestra como se generan estas funciones:
                                </p>
						
					        <blockquote>
									<?= highlight_file('../../../vendor/yiisoft/yii2-gii/generators/crudARCA/default/entidadcontrollertest.php');	?>			
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
