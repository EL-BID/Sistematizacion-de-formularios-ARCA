<?php

namespace common\helpers\general\command\pregunta;
use common\helpers\general\factory\commands\AComandoFactory;

/**
 * Cliente principal que contiene la logica para crear el factory, cargar la clase
 * y ejecutar el comando.
 * @author dtorrado
 * @modifica dbautista
 * @version 1.1
 * @created 16-sept.-2017 p.m.
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
	 * @param pregunta => modelo de la pregunta
	 */
	public function ejecutar($className, $preguntas, $idConjuntoPregunta, $pregunta)
	{
           $factory = AComandoFactory::getIntance();
           $commando = $factory->crearComando($className);
           $message = $commando->ejecutar( $preguntas,  $idConjuntoPregunta,  $pregunta);
           return message;
 	}

}
?>