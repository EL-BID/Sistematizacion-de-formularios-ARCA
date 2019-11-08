<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdAgrupacion;
/**
 * Este es el unit test para la clase "fd_agrupacion".
 *
 * @property int4 $id_agrupacion
 * @property varchar $nom_agrupacion
 * @property int4 $id_tagrupacion
 * @property int4 $num_col
 * @property int4 $num_row
 *
 * @property FdTipoAgrupacion $idTagrupacion
 * @property FdPregunta[] $fdPreguntas
 */
class FdAgrupacionTest extends \Codeception\Test\Unit
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
        $tester = new FdAgrupacion();
        $tester->id_agrupacion = "Ingresar valor de pruebas para el campo id_agrupacion de tipo int4";
        $tester->nom_agrupacion = "Ingresar valor de pruebas para el campo nom_agrupacion de tipo varchar";
        $tester->id_tagrupacion = "Ingresar valor de pruebas para el campo id_tagrupacion de tipo int4";
        $tester->num_col = "Ingresar valor de pruebas para el campo num_col de tipo int4";
        $tester->num_row = "Ingresar valor de pruebas para el campo num_row de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdAgrupacion;
        $tester->id_agrupacion = "Ingresar valor de pruebas para el campo id_agrupacion de tipo int4";
        $tester->nom_agrupacion = "Ingresar valor de pruebas para el campo nom_agrupacion de tipo varchar";
        $tester->id_tagrupacion = "Ingresar valor de pruebas para el campo id_tagrupacion de tipo int4";
        $tester->num_col = "Ingresar valor de pruebas para el campo num_col de tipo int4";
        $tester->num_row = "Ingresar valor de pruebas para el campo num_row de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdAgrupacion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdAgrupacion::findOne(                                                               
        [
           'id_agrupacion' => "Ingresar valor de pruebas para el campo id_agrupacion de tipo int4",
           'nom_agrupacion' => "Ingresar valor de pruebas para el campo nom_agrupacion de tipo varchar",
           'id_tagrupacion' => "Ingresar valor de pruebas para el campo id_tagrupacion de tipo int4",
           'num_col' => "Ingresar valor de pruebas para el campo num_col de tipo int4",
           'num_row' => "Ingresar valor de pruebas para el campo num_row de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdAgrupacion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdAgrupacion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdAgrupacion::findOne(                                                               
        [
           'id_agrupacion' => "Ingresar valor de pruebas para el campo id_agrupacion de tipo int4",
           'nom_agrupacion' => "Ingresar valor de pruebas para el campo nom_agrupacion de tipo varchar",
           'id_tagrupacion' => "Ingresar valor de pruebas para el campo id_tagrupacion de tipo int4",
           'num_col' => "Ingresar valor de pruebas para el campo num_col de tipo int4",
           'num_row' => "Ingresar valor de pruebas para el campo num_row de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdAgrupacion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdAgrupacion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdAgrupacion();
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
         expect($tester->id_agrupacion)->equals('Ingresar valor de pruebas para el campo id_agrupacion de tipo int4');
         expect($tester->nom_agrupacion)->equals('Ingresar valor de pruebas para el campo nom_agrupacion de tipo varchar');
         expect($tester->id_tagrupacion)->equals('Ingresar valor de pruebas para el campo id_tagrupacion de tipo int4');
         expect($tester->num_col)->equals('Ingresar valor de pruebas para el campo num_col de tipo int4');
         expect($tester->num_row)->equals('Ingresar valor de pruebas para el campo num_row de tipo int4');
      }

}
