<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdPreguntaDescendiente;
/**
 * Este es el unit test para la clase "fd_pregunta_descendiente".
 *
 * @property int4 $id_pregunta_padre
 * @property int4 $id_pregunta_descendiente
 * @property int4 $id_version_descendiente
 * @property int4 $id_version_padre
 *
 * @property FdPregunta $idPreguntaPadre
 * @property FdPregunta $idPreguntaDescendiente
 * @property FdVersion $idVersionDescendiente
 * @property FdVersion $idVersionPadre
 */
class FdPreguntaDescendienteTest extends \Codeception\Test\Unit
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
        $tester = new FdPreguntaDescendiente();
        $tester->id_pregunta_padre = "Ingresar valor de pruebas para el campo id_pregunta_padre de tipo int4";
        $tester->id_pregunta_descendiente = "Ingresar valor de pruebas para el campo id_pregunta_descendiente de tipo int4";
        $tester->id_version_descendiente = "Ingresar valor de pruebas para el campo id_version_descendiente de tipo int4";
        $tester->id_version_padre = "Ingresar valor de pruebas para el campo id_version_padre de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdPreguntaDescendiente;
        $tester->id_pregunta_padre = "Ingresar valor de pruebas para el campo id_pregunta_padre de tipo int4";
        $tester->id_pregunta_descendiente = "Ingresar valor de pruebas para el campo id_pregunta_descendiente de tipo int4";
        $tester->id_version_descendiente = "Ingresar valor de pruebas para el campo id_version_descendiente de tipo int4";
        $tester->id_version_padre = "Ingresar valor de pruebas para el campo id_version_padre de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdPreguntaDescendiente  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdPreguntaDescendiente::findOne(                                                               
        [
           'id_pregunta_padre' => "Ingresar valor de pruebas para el campo id_pregunta_padre de tipo int4",
           'id_pregunta_descendiente' => "Ingresar valor de pruebas para el campo id_pregunta_descendiente de tipo int4",
           'id_version_descendiente' => "Ingresar valor de pruebas para el campo id_version_descendiente de tipo int4",
           'id_version_padre' => "Ingresar valor de pruebas para el campo id_version_padre de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdPreguntaDescendiente No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdPreguntaDescendiente Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdPreguntaDescendiente::findOne(                                                               
        [
           'id_pregunta_padre' => "Ingresar valor de pruebas para el campo id_pregunta_padre de tipo int4",
           'id_pregunta_descendiente' => "Ingresar valor de pruebas para el campo id_pregunta_descendiente de tipo int4",
           'id_version_descendiente' => "Ingresar valor de pruebas para el campo id_version_descendiente de tipo int4",
           'id_version_padre' => "Ingresar valor de pruebas para el campo id_version_padre de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdPreguntaDescendiente::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdPreguntaDescendiente();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdPreguntaDescendiente();
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
         expect($tester->id_pregunta_padre)->equals('Ingresar valor de pruebas para el campo id_pregunta_padre de tipo int4');
         expect($tester->id_pregunta_descendiente)->equals('Ingresar valor de pruebas para el campo id_pregunta_descendiente de tipo int4');
         expect($tester->id_version_descendiente)->equals('Ingresar valor de pruebas para el campo id_version_descendiente de tipo int4');
         expect($tester->id_version_padre)->equals('Ingresar valor de pruebas para el campo id_version_padre de tipo int4');
      }

}
