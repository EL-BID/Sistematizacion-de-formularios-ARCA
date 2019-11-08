<?php
require_once ('IComandoPregunta.php');

namespace common\general\command\pregunta;


use common\models\poc\FdPregunta;
/**
 * Comando de prueba para la implementacion, los comandos incorporados a las
 * preguntas del sistema deben de tener esta misma confiuraci�n
 * @author dtorrado
 * @version 1.0
 * @created 10-sept.-2017 1:46:23 p.m.
 */
class CMDPreguntaPrueba implements IComandoPregunta
{



	/**
	 * 
	 * @param preguntas
	 * @param idConjuntoPregunta
	 * @param Pregunta
	 */
	public function ejecutar(array $preguntas, int $idConjuntoPregunta, FdPregunta $Pregunta)
	{
	}

}
?>