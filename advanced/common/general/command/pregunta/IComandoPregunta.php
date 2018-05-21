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
	 * @param preguntas
	 * @param idConjuntoPregunta
	 * @param Pregunta
	 */
	public function ejecutar(array $preguntas, int $idConjuntoPregunta, FdPregunta $Pregunta);

}
?>