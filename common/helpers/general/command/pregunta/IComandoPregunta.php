<?php

namespace common\general\command\pregunta;


/**
 * Interace para definir la estructura de los comandos
 * @author dtorrado
 * @version 1.0
 * @created 10-sept.-2017 1:58:04 p.m.
 */
interface IComandoPregunta
{

	/**
	 * Metodo que todos los comandos deben de tener para
	 * 
	 * @param preguntas => array de preguntas
	 * @param idConjuntoPregunta => id conjunto pregunta
	 * @param Pregunta => Modelo FdPregunta
	 */
	public function ejecutar($preguntas, $idConjuntoPregunta, $Pregunta);

}
?>