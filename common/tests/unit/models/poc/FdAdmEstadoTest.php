<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdAdmEstado;
/**
 * Este es el unit test para la clase "fd_adm_estado".
 *
 * @property int4 $id_adm_estado
 * @property varchar $nom_adm_estado
 * @property varchar $cod_rol
 * @property int4 $id_modulo
 * @property varchar $p_actualizar
 * @property varchar $p_crear
 * @property varchar $p_borrar
 * @property varchar $p_ejecutar
 *
 * @property FdModulo $idModulo
 * @property Rol $codRol
 * @property FdConjuntoRespuesta[] $fdConjuntoRespuestas
 * @property FdElementoCondicion[] $fdElementoCondicions
 * @property FdHistoricoRespuesta[] $fdHistoricoRespuestas
 */
class FdAdmEstadoTest extends \Codeception\Test\Unit
{

    /**
     * @var \frontend\tests\UnitTester
     */

    public function _before()
    {
        
    }
                                                                                        
    public function _after()                                                              
    {             
                                                             
    }                
    
    
     /** en caso de querer utilizar Asserts por favor revisar la documentacion en http://codeception.com/docs/modules/Asserts */
    public function testValidate()                                                             
    {                                                                                        
        $tester = new FdAdmEstado();
        $tester->id_adm_estado = "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4";
        $tester->nom_adm_estado = "Ingresar valor de pruebas para el campo nom_adm_estado de tipo varchar";
        $tester->cod_rol = "Ingresar valor de pruebas para el campo cod_rol de tipo varchar";
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->p_actualizar = "Ingresar valor de pruebas para el campo p_actualizar de tipo varchar";
        $tester->p_crear = "Ingresar valor de pruebas para el campo p_crear de tipo varchar";
        $tester->p_borrar = "Ingresar valor de pruebas para el campo p_borrar de tipo varchar";
        $tester->p_ejecutar = "Ingresar valor de pruebas para el campo p_ejecutar de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdAdmEstado;
        $tester->id_adm_estado = "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4";
        $tester->nom_adm_estado = "Ingresar valor de pruebas para el campo nom_adm_estado de tipo varchar";
        $tester->cod_rol = "Ingresar valor de pruebas para el campo cod_rol de tipo varchar";
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->p_actualizar = "Ingresar valor de pruebas para el campo p_actualizar de tipo varchar";
        $tester->p_crear = "Ingresar valor de pruebas para el campo p_crear de tipo varchar";
        $tester->p_borrar = "Ingresar valor de pruebas para el campo p_borrar de tipo varchar";
        $tester->p_ejecutar = "Ingresar valor de pruebas para el campo p_ejecutar de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdAdmEstado  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdAdmEstado::findOne(                                                               
        [
           'id_adm_estado' => "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4",
           'nom_adm_estado' => "Ingresar valor de pruebas para el campo nom_adm_estado de tipo varchar",
           'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo varchar",
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'p_actualizar' => "Ingresar valor de pruebas para el campo p_actualizar de tipo varchar",
           'p_crear' => "Ingresar valor de pruebas para el campo p_crear de tipo varchar",
           'p_borrar' => "Ingresar valor de pruebas para el campo p_borrar de tipo varchar",
           'p_ejecutar' => "Ingresar valor de pruebas para el campo p_ejecutar de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdAdmEstado No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdAdmEstado Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdAdmEstado::findOne(                                                               
        [
           'id_adm_estado' => "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4",
           'nom_adm_estado' => "Ingresar valor de pruebas para el campo nom_adm_estado de tipo varchar",
           'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo varchar",
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'p_actualizar' => "Ingresar valor de pruebas para el campo p_actualizar de tipo varchar",
           'p_crear' => "Ingresar valor de pruebas para el campo p_crear de tipo varchar",
           'p_borrar' => "Ingresar valor de pruebas para el campo p_borrar de tipo varchar",
           'p_ejecutar' => "Ingresar valor de pruebas para el campo p_ejecutar de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdAdmEstado::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdAdmEstado();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdAdmEstado();
        $labels= $tester->attributeLabels();
         $this->assertNotEmpty($labels,
            'Se devolvio vacio array con los labels ');  
        
    }
    
    
    /**
    *  The following line indicates that the parameter values entered here are derived from testSelect Output 
    * @depends testSelect
    */
   public function testModelProperty($tester)
   {
         expect($tester->id_adm_estado)->equals('Ingresar valor de pruebas para el campo id_adm_estado de tipo int4');
         expect($tester->nom_adm_estado)->equals('Ingresar valor de pruebas para el campo nom_adm_estado de tipo varchar');
         expect($tester->cod_rol)->equals('Ingresar valor de pruebas para el campo cod_rol de tipo varchar');
         expect($tester->id_modulo)->equals('Ingresar valor de pruebas para el campo id_modulo de tipo int4');
         expect($tester->p_actualizar)->equals('Ingresar valor de pruebas para el campo p_actualizar de tipo varchar');
         expect($tester->p_crear)->equals('Ingresar valor de pruebas para el campo p_crear de tipo varchar');
         expect($tester->p_borrar)->equals('Ingresar valor de pruebas para el campo p_borrar de tipo varchar');
         expect($tester->p_ejecutar)->equals('Ingresar valor de pruebas para el campo p_ejecutar de tipo varchar');
      }

}
