<?php

namespace common\tests\unit\models\notificaciones;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\notificaciones\CorCorreo;
/**
 * Este es el unit test para la clase "cor_correo".
 *
 * @property int4 $id_correo
 * @property varchar $nom_correo
 * @property varchar $asunto
 * @property text $cuerpo
 * @property int4 $id_tarea_programada
 *
 * @property TarTareaProgramada $idTareaProgramada
 * @property CorDestinatario[] $corDestinatarios
 * @property CorMensajeEnviado[] $corMensajeEnviados
 * @property CorParametro[] $corParametros
 */
class CorCorreoTest extends \Codeception\Test\Unit
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
        $tester = new CorCorreo();
        $tester->id_correo = "Ingresar valor de pruebas para el campo id_correo de tipo int4";
        $tester->nom_correo = "Ingresar valor de pruebas para el campo nom_correo de tipo varchar";
        $tester->asunto = "Ingresar valor de pruebas para el campo asunto de tipo varchar";
        $tester->cuerpo = "Ingresar valor de pruebas para el campo cuerpo de tipo text";
        $tester->id_tarea_programada = "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CorCorreo;
        $tester->id_correo = "Ingresar valor de pruebas para el campo id_correo de tipo int4";
        $tester->nom_correo = "Ingresar valor de pruebas para el campo nom_correo de tipo varchar";
        $tester->asunto = "Ingresar valor de pruebas para el campo asunto de tipo varchar";
        $tester->cuerpo = "Ingresar valor de pruebas para el campo cuerpo de tipo text";
        $tester->id_tarea_programada = "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CorCorreo  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CorCorreo::findOne(                                                               
        [
           'id_correo' => "Ingresar valor de pruebas para el campo id_correo de tipo int4",
           'nom_correo' => "Ingresar valor de pruebas para el campo nom_correo de tipo varchar",
           'asunto' => "Ingresar valor de pruebas para el campo asunto de tipo varchar",
           'cuerpo' => "Ingresar valor de pruebas para el campo cuerpo de tipo text",
           'id_tarea_programada' => "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CorCorreo No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CorCorreo Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CorCorreo::findOne(                                                               
        [
           'id_correo' => "Ingresar valor de pruebas para el campo id_correo de tipo int4",
           'nom_correo' => "Ingresar valor de pruebas para el campo nom_correo de tipo varchar",
           'asunto' => "Ingresar valor de pruebas para el campo asunto de tipo varchar",
           'cuerpo' => "Ingresar valor de pruebas para el campo cuerpo de tipo text",
           'id_tarea_programada' => "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CorCorreo::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CorCorreo();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CorCorreo();
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
         expect($tester->id_correo)->equals('Ingresar valor de pruebas para el campo id_correo de tipo int4');
         expect($tester->nom_correo)->equals('Ingresar valor de pruebas para el campo nom_correo de tipo varchar');
         expect($tester->asunto)->equals('Ingresar valor de pruebas para el campo asunto de tipo varchar');
         expect($tester->cuerpo)->equals('Ingresar valor de pruebas para el campo cuerpo de tipo text');
         expect($tester->id_tarea_programada)->equals('Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4');
      }

}
