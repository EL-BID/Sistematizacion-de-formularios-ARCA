<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdCaudalAguaPublicos;
/**
 * Este es el unit test para la clase "fd_caudal_agua_publicos".
 *
 * @property int4 $id_caudal_agua_publicos
 * @property varchar $codigo
 * @property numeric $enero
 * @property numeric $febrero
 * @property numeric $marzo
 * @property numeric $abril
 * @property numeric $mayo
 * @property numeric $junio
 * @property numeric $julio
 * @property numeric $agosto
 * @property numeric $septiembre
 * @property numeric $octubre
 * @property numeric $noviembre
 * @property numeric $diciembre
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 * @property int4 $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdCaudalAguaPublicosTest extends \Codeception\Test\Unit
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
        $tester = new FdCaudalAguaPublicos();
        $tester->id_caudal_agua_publicos = "Ingresar valor de pruebas para el campo id_caudal_agua_publicos de tipo int4";
        $tester->codigo = "Ingresar valor de pruebas para el campo codigo de tipo varchar";
        $tester->enero = "Ingresar valor de pruebas para el campo enero de tipo numeric";
        $tester->febrero = "Ingresar valor de pruebas para el campo febrero de tipo numeric";
        $tester->marzo = "Ingresar valor de pruebas para el campo marzo de tipo numeric";
        $tester->abril = "Ingresar valor de pruebas para el campo abril de tipo numeric";
        $tester->mayo = "Ingresar valor de pruebas para el campo mayo de tipo numeric";
        $tester->junio = "Ingresar valor de pruebas para el campo junio de tipo numeric";
        $tester->julio = "Ingresar valor de pruebas para el campo julio de tipo numeric";
        $tester->agosto = "Ingresar valor de pruebas para el campo agosto de tipo numeric";
        $tester->septiembre = "Ingresar valor de pruebas para el campo septiembre de tipo numeric";
        $tester->octubre = "Ingresar valor de pruebas para el campo octubre de tipo numeric";
        $tester->noviembre = "Ingresar valor de pruebas para el campo noviembre de tipo numeric";
        $tester->diciembre = "Ingresar valor de pruebas para el campo diciembre de tipo numeric";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdCaudalAguaPublicos;
        $tester->id_caudal_agua_publicos = "Ingresar valor de pruebas para el campo id_caudal_agua_publicos de tipo int4";
        $tester->codigo = "Ingresar valor de pruebas para el campo codigo de tipo varchar";
        $tester->enero = "Ingresar valor de pruebas para el campo enero de tipo numeric";
        $tester->febrero = "Ingresar valor de pruebas para el campo febrero de tipo numeric";
        $tester->marzo = "Ingresar valor de pruebas para el campo marzo de tipo numeric";
        $tester->abril = "Ingresar valor de pruebas para el campo abril de tipo numeric";
        $tester->mayo = "Ingresar valor de pruebas para el campo mayo de tipo numeric";
        $tester->junio = "Ingresar valor de pruebas para el campo junio de tipo numeric";
        $tester->julio = "Ingresar valor de pruebas para el campo julio de tipo numeric";
        $tester->agosto = "Ingresar valor de pruebas para el campo agosto de tipo numeric";
        $tester->septiembre = "Ingresar valor de pruebas para el campo septiembre de tipo numeric";
        $tester->octubre = "Ingresar valor de pruebas para el campo octubre de tipo numeric";
        $tester->noviembre = "Ingresar valor de pruebas para el campo noviembre de tipo numeric";
        $tester->diciembre = "Ingresar valor de pruebas para el campo diciembre de tipo numeric";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdCaudalAguaPublicos  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdCaudalAguaPublicos::findOne(                                                               
        [
           'id_caudal_agua_publicos' => "Ingresar valor de pruebas para el campo id_caudal_agua_publicos de tipo int4",
           'codigo' => "Ingresar valor de pruebas para el campo codigo de tipo varchar",
           'enero' => "Ingresar valor de pruebas para el campo enero de tipo numeric",
           'febrero' => "Ingresar valor de pruebas para el campo febrero de tipo numeric",
           'marzo' => "Ingresar valor de pruebas para el campo marzo de tipo numeric",
           'abril' => "Ingresar valor de pruebas para el campo abril de tipo numeric",
           'mayo' => "Ingresar valor de pruebas para el campo mayo de tipo numeric",
           'junio' => "Ingresar valor de pruebas para el campo junio de tipo numeric",
           'julio' => "Ingresar valor de pruebas para el campo julio de tipo numeric",
           'agosto' => "Ingresar valor de pruebas para el campo agosto de tipo numeric",
           'septiembre' => "Ingresar valor de pruebas para el campo septiembre de tipo numeric",
           'octubre' => "Ingresar valor de pruebas para el campo octubre de tipo numeric",
           'noviembre' => "Ingresar valor de pruebas para el campo noviembre de tipo numeric",
           'diciembre' => "Ingresar valor de pruebas para el campo diciembre de tipo numeric",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdCaudalAguaPublicos No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdCaudalAguaPublicos Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdCaudalAguaPublicos::findOne(                                                               
        [
           'id_caudal_agua_publicos' => "Ingresar valor de pruebas para el campo id_caudal_agua_publicos de tipo int4",
           'codigo' => "Ingresar valor de pruebas para el campo codigo de tipo varchar",
           'enero' => "Ingresar valor de pruebas para el campo enero de tipo numeric",
           'febrero' => "Ingresar valor de pruebas para el campo febrero de tipo numeric",
           'marzo' => "Ingresar valor de pruebas para el campo marzo de tipo numeric",
           'abril' => "Ingresar valor de pruebas para el campo abril de tipo numeric",
           'mayo' => "Ingresar valor de pruebas para el campo mayo de tipo numeric",
           'junio' => "Ingresar valor de pruebas para el campo junio de tipo numeric",
           'julio' => "Ingresar valor de pruebas para el campo julio de tipo numeric",
           'agosto' => "Ingresar valor de pruebas para el campo agosto de tipo numeric",
           'septiembre' => "Ingresar valor de pruebas para el campo septiembre de tipo numeric",
           'octubre' => "Ingresar valor de pruebas para el campo octubre de tipo numeric",
           'noviembre' => "Ingresar valor de pruebas para el campo noviembre de tipo numeric",
           'diciembre' => "Ingresar valor de pruebas para el campo diciembre de tipo numeric",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdCaudalAguaPublicos::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdCaudalAguaPublicos();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdCaudalAguaPublicos();
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
         expect($tester->id_caudal_agua_publicos)->equals('Ingresar valor de pruebas para el campo id_caudal_agua_publicos de tipo int4');
         expect($tester->codigo)->equals('Ingresar valor de pruebas para el campo codigo de tipo varchar');
         expect($tester->enero)->equals('Ingresar valor de pruebas para el campo enero de tipo numeric');
         expect($tester->febrero)->equals('Ingresar valor de pruebas para el campo febrero de tipo numeric');
         expect($tester->marzo)->equals('Ingresar valor de pruebas para el campo marzo de tipo numeric');
         expect($tester->abril)->equals('Ingresar valor de pruebas para el campo abril de tipo numeric');
         expect($tester->mayo)->equals('Ingresar valor de pruebas para el campo mayo de tipo numeric');
         expect($tester->junio)->equals('Ingresar valor de pruebas para el campo junio de tipo numeric');
         expect($tester->julio)->equals('Ingresar valor de pruebas para el campo julio de tipo numeric');
         expect($tester->agosto)->equals('Ingresar valor de pruebas para el campo agosto de tipo numeric');
         expect($tester->septiembre)->equals('Ingresar valor de pruebas para el campo septiembre de tipo numeric');
         expect($tester->octubre)->equals('Ingresar valor de pruebas para el campo octubre de tipo numeric');
         expect($tester->noviembre)->equals('Ingresar valor de pruebas para el campo noviembre de tipo numeric');
         expect($tester->diciembre)->equals('Ingresar valor de pruebas para el campo diciembre de tipo numeric');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
      }

}
