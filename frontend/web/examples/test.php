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
		<h1><a href="#">Unit Test</a></h1>
	</div>
	<div id="menu">
                <h2>Configuración y ejecucion de pruebas:</h2>
		<ul>
			<li><a href="#0">Unit Test</a></li>
			<li><a href="#1">Instalacion en proyecto</a></li>
			<li><a href="#2">Configuración</a></li>
                        <li><a href="#3">Generación</a></li>
                        <li><a href="#4">Ejecución de comandos</a></li>

		</ul>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
			<h2>Configuración y ejecucion de pruebas:</h2>
                                <br></br><br></br>
				<a name="0"><h3>Unit Test</h3></a>
				
				<p>Un unit test verifica que una pequeña unidad de código este funcionando como se esperaba, presentando los comportamientos correspondientes para casos tanto exitosos como de algún error o anomalía. 
                                    En la programación orientada a objetos, la unidad de código más básica es una clase. Por lo tanto, una unit test necesita principalmente verificar que cada uno de los métodos de la clase funciona correctamente. 
                                    Es decir, dados los diferentes parámetros de entrada, la prueba verifica que el método devuelve los resultados esperados. Las unit test suelen ser desarrolladas por personas que escriben las clases que se están probando. Para los generadores creados para el proyecto de la ARCA, se generará desde Gii una clase básica e inicial, con las pruebas mínimas necesarias para verificar las clases.
                                </p>
													

				<br></br><br></br>
				<a name="1"><h3>Instalación en proyecto</h3></a>
				
				<p>Cuando el proyecto que se este realizando, no tiene ninguna instalación de ninguno delos motores de pruebas necesarios para ejecutar las clases, para esto se hace necesario correr los siguientes comandos:
                                <br><br>
                                        <code>
                                            
                                            <srtrong>Codeception</strong>
                                            <br></br>
                                            composer require –dev codeception/codeception<br></br>
                                            composer require –dev codeception/specify<br></br>
                                            composer require –dev codeception/verify<br></br>
                                            <srtrong>PHPUnit</strong><br></br>
                                            composer require --dev phpunit/dbunit<br></br>
                                            composer require --dev phpunit/phpunit<br></br>
                                                <srtrong>Solo en linux:</strong><br></br>
                                                composer require --dev phpunit/php-invoker<br></br>

                                        </code>
                                        
                                        <br></br>
                                        En la siguiente image se parecia la ejecucción de los comandos:
                                </p>
					
                                <img src="images/commands.PNG" />
				
				<p>Una vez instalados debe aparecer en la carpeta de vendor las carpetas codeception y phpunit, adicional dedeb existir los archivos con la configuracion de los comandos para codecept y phpUnit. Encaso de que esots no esten se deben crear manualmente basandose en los siguiente:</p>
				
                                 <p>codecept</p>  							
						<blockquote>
										<?= highlight_file('../../../vendor/bin/codecept');	?>			
						</blockquote>
                                    <p>codecept.bat</p>  							
						<blockquote>
										<?= highlight_file('../../../vendor/bin/codecept.bat');	?>			
						</blockquote>
                                     <p>phpunit</p>  							
						<blockquote>
										<?= highlight_file('../../../vendor/bin/phpunit');	?>			
						</blockquote>
                                      <p>phpunit.bat</p>  							
						<blockquote>
										<?= highlight_file('../../../vendor/bin/phpunit.bat');	?>				
						</blockquote>
                                    
                                   <br></br><br></br>
				
				<a name="2"><h3>Configuración</h3></a>
				
				<p>
                                    Para realizar las pruebas, se debe realizar una pequeña configuracion antes de la ejecucion, primero se debe completar el archivo test-local.php, o donde se este realizando el cargue de condiguracion para test según si el proyecto se ha creado con Basic o Advanced, esta debe quedar como sigue:
                                </p>
						
				<blockquote>
									<?= highlight_file('../../../common/config/test-local.php');	?>			
				</blockquote>
						
			
				<p>
                                   Adicionalmente se deben configurar los comandos yii, codecept y phpunit, esto debe realizarse mediente la edicion de las variables de entorno.
                                </p>
                                <p>
                                  Para windows: <br><br>
                                        <code>
                                            
                                            Windows 10 y Windows 8<br></br>
                                            1. En Buscar, busque y seleccione: Sistema (Panel de control)<br></br>
                                            2. Haga clic en el enlace Configuración avanzada del sistema.<br></br>
                                            3. Haga clic en Variables de entorno. En la sección Variables del sistema, busque la variable de entorno PATH y selecciónela. Haga clic en Editar. Si no existe la variable de entorno PATH, haga clic en Nuevo.<br></br>
                                            4. En la ventana Editar la variable del sistema (o Nueva variable del sistema), debe especificar el valor de la variable de entorno PATH. Haga clic en Aceptar. Cierre todas las demás ventanas haciendo clic en Aceptar.<br></br><br></br>

                                            Windows 7<br></br>
                                            1. Desde el escritorio, haga clic con el botón derecho del mouse en el icono de la computadora.<br></br>
                                            2. Seleccione Propiedades en el menú contextual.<br></br>
                                            3. Haga clic en el enlace Configuración avanzada del sistema.<br></br>
                                            4. Haga clic en Variables de entorno. En la sección Variables del sistema, busque la variable de entorno PATH y selecciónela. Haga clic en Editar. Si no existe la variable de entorno PATH, haga clic en Nuevo.<br></br>
                                            5. En la ventana Editar la variable del sistema (o Nueva variable del sistema), debe especificar el valor de la variable de entorno PATH. Haga clic en Aceptar. Cierre todas las demás ventanas haciendo clic en Aceptar.<br></br>

                                        </code>
                                        
                                        <br></br>
                                </p>
                                
                                <p>
                                   para Linux:
                                   <br><br>
                                        <code>
                                            
                                            1. Edite el archivo de inicio (~/.bashrc)<br></br>
                                            2. Modifique la variable PATH<br></br>
                                            PATH=/ruta/ruta/ruta/codecept:$PATH 
                                            export PATH
                                            3. Guarde y cierre el archivo<br></br>
                                            4. Cargue el archivo de inicio<br></br>
                                            % . /.profile
                                            5. Verifique que la ruta está definida ejecutando el comando<br></br>
                                        </code>
                                        
                                        <br></br>
                                   

                                </p>
                                <br></br><br></br>
				<a name="3"><h3>Generación</h3></a>
				
				<p>El programador debe implementar las clases de testin e incluirlas dentor de la carpeta tests/unit/model o test/unit/controller
                                    <br></br>
                                    Para la ARCA se han creado genradores que automaticamente crean las clases que heredan de <a href="http://codeception.com/docs/05-UnitTests">\Codeception\Test\Unit</a>, en ellas se crea una funcion test por cada funcion existente en el modelo, con el código minimo necesario para realizar pruebas unitarias.
                                    Cada una de las funciones contiene funciones asserts, ellas son las encargadas de evaluar los diferentes objetos y valores calculados en las diferentes funciones test.
                                    Para una descripcion más detallada de cada una de las funciones assert se recomienda revisar la documentacion <a hrer="http://codeception.com/docs/modules/Asserts" ></a>correspondiente.
                                    <br></br>
                                    La siguiente es la imagen de como se generan los test del CRUD como ejemplo de esta generaciòn.
                                </p>
						 
                                <img src="images/generateExample.png" />
				
                                <br></br><br></br>
				<a name="4"><h3>Ejecución de comandos</h3></a>
				
				<p>Un vez se tienen las clases para ejecutar las pruebas el programador debe ingresar a la ventana de comandos y ubicarse en la ruta donde se encuentra la carpeta test, una vez ahi debe ejecutar el comando codecept junto con la opcion run, con el fin de ejecutar todas las pruebas que se tengan en la carpeta trest.
                                </p>
						 
                                <img src="images/codeceptrun.png" />
                                
                                <p>Al ejecutar se obtienen los resultados, en la imagen se aprecia un caso en el cual se realizó el test a la calse Destino, y se aprecia que se produjeron 3 errores al momento de realizar la consulta en la base de datos.
                                </p>
						 
                                <img src="images/failure.png" />
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
