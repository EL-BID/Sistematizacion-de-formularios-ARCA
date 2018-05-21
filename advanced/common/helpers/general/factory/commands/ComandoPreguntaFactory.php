<?php
require_once ('AComandoFactory.php');


namespace common\general\factory\commands;

/**
 * Clase concreta para crear comandos que estan relacionados a una pregunta
 * @author dtorrado
 * @version 1.0
 * @updated 10-sept.-2017 1:57:23 p.m.
 */
class ComandoPreguntaFactory extends AComandoFactory
{

	/**
	 * Metodo estatico que crea la clase
	 * 
	 * @param ClassName    ClassName
	 */
	public function crearComando($ClassName)
	{
            return eval("new " + $ClassName +"();");
	}

}
?>