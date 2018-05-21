<?php


namespace common\general\factory\commands;

/**
 * Clase Abstracta que estructura la intanciacion de los comandos
 * @author dtorrado
 * @version 1.0
 * @updated 10-sept.-2017 1:51:58 p.m.
 */
abstract class AComandoFactory
{



	/**
	 * Metodo abtrato que debe implementar cafa factory para la intacion de sus
	 * comandos
	 * 
	 * @param ClassName => tipo string
	 */
	abstract public function crearComando($ClassName);
	

	/**
	 * Metodo estatico para crear una instancia delfactory conforme el tipo que se
	 * solicite
	 * 
	 * @param tipo
	 */
	public static function getIntance($tipo)  //-> Para que el tipo que significa el tipo que se solicite no se esta usando....
	{
            return new ComandoPreguntaFactory();
	}

}
?>