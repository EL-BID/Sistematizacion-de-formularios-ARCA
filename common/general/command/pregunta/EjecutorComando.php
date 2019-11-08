<?php

namespace common\general\command\pregunta;

use common\general\factory\commands\AComandoFactory;

/**
 * Cliente principal que contiene la logica para crear el factory, cargar la clase
 * y ejecutar el comando.
 * @author dtorrado
 * @version 1.0
 * @created 10-sept.-2017 1:48:29 p.m.
 */
class EjecutorComando
{


	/**
	 * Metodo para realizar la creaci�n del factory, instanciaci�n del comando y
	 * ejecuci�n del comando
	 * 
	 * @param className
	 * @param preguntas todas preguntas con las respuestas
	 * @param idConjuntoPregunta
	 * @param pregunta
	 */
	public function ejecutar(String $className, array $preguntas, int $idConjuntoPregunta, FdPregunta $pregunta)
	{
           $factory = AComandoFactory::getIntance();
           $commando = $factory->crearComando($className);
           $message = $commando->ejecutar( $preguntas,  $idConjuntoPregunta,  $pregunta);
           return message;
 	}

}
?>