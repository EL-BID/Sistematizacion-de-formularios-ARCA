<?php

namespace common\tests\unit\models\pqrs;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\pqrs\Pqrs;
/**
 * Este es el unit test para la clase "pqrs".
 *
 * @property int4 $id_pqrs
 * @property date $fecha_recepcion
 * @property int4 $num_consecutivo
 * @property varchar $sol_nombres
 * @property int4 $sol_doc_identificacion
 * @property varchar $sol_direccion
 * @property varchar $sol_email
 * @property varchar $sol_telefono
 * @property varchar $en_nom_nombres
 * @property int4 $en_nom_ruc
 * @property varchar $en_nom_direccion
 * @property varchar $en_nom_email
 * @property varchar $en_nom_telefono
 * @property varchar $aquien_dirige
 * @property text $objeto_peticion
 * @property text $descripcion_peticion
 * @property varchar $subtipo_queja
 * @property varchar $subtipo_reclamo
 * @property varchar $subtipo_controversia
 * @property varchar $por_quien_qrc
 * @property varchar $lugar_hechos
 * @property date $fecha_hechos
 * @property text $naracion_hechos
 * @property text $elementos_probatorios
 * @property varchar $denunc_nombre
 * @property varchar $denunc_direccion
 * @property varchar $denunc_telefono
 * @property varchar $subtipo_sugerencia
 * @property varchar $subtipo_felicitacion
 * @property text $descripcion_sugerencia
 * @property varchar $sol_cod_provincia
 * @property varchar $sol_cod_canton
 * @property varchar $en_nom_cod_provincia
 * @property varchar $en_nom_cod_canton
 * @property int4 $id_cproceso
 *
 * @property Cantones $solCodProvincia
 * @property Cantones $enNomCodProvincia
 * @property Provincias $solCodProvincia0
 * @property Provincias $enNomCodProvincia0
 * @property PsCproceso $idCproceso
 */
class PqrsTest extends \Codeception\Test\Unit
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
        $tester = new Pqrs();
        $tester->id_pqrs = "Ingresar valor de pruebas para el campo id_pqrs de tipo int4";
        $tester->fecha_recepcion = "Ingresar valor de pruebas para el campo fecha_recepcion de tipo date";
        $tester->num_consecutivo = "Ingresar valor de pruebas para el campo num_consecutivo de tipo int4";
        $tester->sol_nombres = "Ingresar valor de pruebas para el campo sol_nombres de tipo varchar";
        $tester->sol_doc_identificacion = "Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4";
        $tester->sol_direccion = "Ingresar valor de pruebas para el campo sol_direccion de tipo varchar";
        $tester->sol_email = "Ingresar valor de pruebas para el campo sol_email de tipo varchar";
        $tester->sol_telefono = "Ingresar valor de pruebas para el campo sol_telefono de tipo varchar";
        $tester->en_nom_nombres = "Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar";
        $tester->en_nom_ruc = "Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4";
        $tester->en_nom_direccion = "Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar";
        $tester->en_nom_email = "Ingresar valor de pruebas para el campo en_nom_email de tipo varchar";
        $tester->en_nom_telefono = "Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar";
        $tester->aquien_dirige = "Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar";
        $tester->objeto_peticion = "Ingresar valor de pruebas para el campo objeto_peticion de tipo text";
        $tester->descripcion_peticion = "Ingresar valor de pruebas para el campo descripcion_peticion de tipo text";
        $tester->subtipo_queja = "Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar";
        $tester->subtipo_reclamo = "Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar";
        $tester->subtipo_controversia = "Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar";
        $tester->por_quien_qrc = "Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar";
        $tester->lugar_hechos = "Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar";
        $tester->fecha_hechos = "Ingresar valor de pruebas para el campo fecha_hechos de tipo date";
        $tester->naracion_hechos = "Ingresar valor de pruebas para el campo naracion_hechos de tipo text";
        $tester->elementos_probatorios = "Ingresar valor de pruebas para el campo elementos_probatorios de tipo text";
        $tester->denunc_nombre = "Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar";
        $tester->denunc_direccion = "Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar";
        $tester->denunc_telefono = "Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar";
        $tester->subtipo_sugerencia = "Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar";
        $tester->subtipo_felicitacion = "Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar";
        $tester->descripcion_sugerencia = "Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text";
        $tester->sol_cod_provincia = "Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar";
        $tester->sol_cod_canton = "Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar";
        $tester->en_nom_cod_provincia = "Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar";
        $tester->en_nom_cod_canton = "Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new Pqrs;
        $tester->id_pqrs = "Ingresar valor de pruebas para el campo id_pqrs de tipo int4";
        $tester->fecha_recepcion = "Ingresar valor de pruebas para el campo fecha_recepcion de tipo date";
        $tester->num_consecutivo = "Ingresar valor de pruebas para el campo num_consecutivo de tipo int4";
        $tester->sol_nombres = "Ingresar valor de pruebas para el campo sol_nombres de tipo varchar";
        $tester->sol_doc_identificacion = "Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4";
        $tester->sol_direccion = "Ingresar valor de pruebas para el campo sol_direccion de tipo varchar";
        $tester->sol_email = "Ingresar valor de pruebas para el campo sol_email de tipo varchar";
        $tester->sol_telefono = "Ingresar valor de pruebas para el campo sol_telefono de tipo varchar";
        $tester->en_nom_nombres = "Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar";
        $tester->en_nom_ruc = "Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4";
        $tester->en_nom_direccion = "Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar";
        $tester->en_nom_email = "Ingresar valor de pruebas para el campo en_nom_email de tipo varchar";
        $tester->en_nom_telefono = "Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar";
        $tester->aquien_dirige = "Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar";
        $tester->objeto_peticion = "Ingresar valor de pruebas para el campo objeto_peticion de tipo text";
        $tester->descripcion_peticion = "Ingresar valor de pruebas para el campo descripcion_peticion de tipo text";
        $tester->subtipo_queja = "Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar";
        $tester->subtipo_reclamo = "Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar";
        $tester->subtipo_controversia = "Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar";
        $tester->por_quien_qrc = "Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar";
        $tester->lugar_hechos = "Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar";
        $tester->fecha_hechos = "Ingresar valor de pruebas para el campo fecha_hechos de tipo date";
        $tester->naracion_hechos = "Ingresar valor de pruebas para el campo naracion_hechos de tipo text";
        $tester->elementos_probatorios = "Ingresar valor de pruebas para el campo elementos_probatorios de tipo text";
        $tester->denunc_nombre = "Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar";
        $tester->denunc_direccion = "Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar";
        $tester->denunc_telefono = "Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar";
        $tester->subtipo_sugerencia = "Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar";
        $tester->subtipo_felicitacion = "Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar";
        $tester->descripcion_sugerencia = "Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text";
        $tester->sol_cod_provincia = "Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar";
        $tester->sol_cod_canton = "Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar";
        $tester->en_nom_cod_provincia = "Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar";
        $tester->en_nom_cod_canton = "Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'Pqrs  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = Pqrs::findOne(                                                               
        [
           'id_pqrs' => "Ingresar valor de pruebas para el campo id_pqrs de tipo int4",
           'fecha_recepcion' => "Ingresar valor de pruebas para el campo fecha_recepcion de tipo date",
           'num_consecutivo' => "Ingresar valor de pruebas para el campo num_consecutivo de tipo int4",
           'sol_nombres' => "Ingresar valor de pruebas para el campo sol_nombres de tipo varchar",
           'sol_doc_identificacion' => "Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4",
           'sol_direccion' => "Ingresar valor de pruebas para el campo sol_direccion de tipo varchar",
           'sol_email' => "Ingresar valor de pruebas para el campo sol_email de tipo varchar",
           'sol_telefono' => "Ingresar valor de pruebas para el campo sol_telefono de tipo varchar",
           'en_nom_nombres' => "Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar",
           'en_nom_ruc' => "Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4",
           'en_nom_direccion' => "Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar",
           'en_nom_email' => "Ingresar valor de pruebas para el campo en_nom_email de tipo varchar",
           'en_nom_telefono' => "Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar",
           'aquien_dirige' => "Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar",
           'objeto_peticion' => "Ingresar valor de pruebas para el campo objeto_peticion de tipo text",
           'descripcion_peticion' => "Ingresar valor de pruebas para el campo descripcion_peticion de tipo text",
           'subtipo_queja' => "Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar",
           'subtipo_reclamo' => "Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar",
           'subtipo_controversia' => "Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar",
           'por_quien_qrc' => "Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar",
           'lugar_hechos' => "Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar",
           'fecha_hechos' => "Ingresar valor de pruebas para el campo fecha_hechos de tipo date",
           'naracion_hechos' => "Ingresar valor de pruebas para el campo naracion_hechos de tipo text",
           'elementos_probatorios' => "Ingresar valor de pruebas para el campo elementos_probatorios de tipo text",
           'denunc_nombre' => "Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar",
           'denunc_direccion' => "Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar",
           'denunc_telefono' => "Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar",
           'subtipo_sugerencia' => "Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar",
           'subtipo_felicitacion' => "Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar",
           'descripcion_sugerencia' => "Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text",
           'sol_cod_provincia' => "Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar",
           'sol_cod_canton' => "Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar",
           'en_nom_cod_provincia' => "Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar",
           'en_nom_cod_canton' => "Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'Pqrs No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'Pqrs Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = Pqrs::findOne(                                                               
        [
           'id_pqrs' => "Ingresar valor de pruebas para el campo id_pqrs de tipo int4",
           'fecha_recepcion' => "Ingresar valor de pruebas para el campo fecha_recepcion de tipo date",
           'num_consecutivo' => "Ingresar valor de pruebas para el campo num_consecutivo de tipo int4",
           'sol_nombres' => "Ingresar valor de pruebas para el campo sol_nombres de tipo varchar",
           'sol_doc_identificacion' => "Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4",
           'sol_direccion' => "Ingresar valor de pruebas para el campo sol_direccion de tipo varchar",
           'sol_email' => "Ingresar valor de pruebas para el campo sol_email de tipo varchar",
           'sol_telefono' => "Ingresar valor de pruebas para el campo sol_telefono de tipo varchar",
           'en_nom_nombres' => "Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar",
           'en_nom_ruc' => "Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4",
           'en_nom_direccion' => "Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar",
           'en_nom_email' => "Ingresar valor de pruebas para el campo en_nom_email de tipo varchar",
           'en_nom_telefono' => "Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar",
           'aquien_dirige' => "Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar",
           'objeto_peticion' => "Ingresar valor de pruebas para el campo objeto_peticion de tipo text",
           'descripcion_peticion' => "Ingresar valor de pruebas para el campo descripcion_peticion de tipo text",
           'subtipo_queja' => "Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar",
           'subtipo_reclamo' => "Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar",
           'subtipo_controversia' => "Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar",
           'por_quien_qrc' => "Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar",
           'lugar_hechos' => "Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar",
           'fecha_hechos' => "Ingresar valor de pruebas para el campo fecha_hechos de tipo date",
           'naracion_hechos' => "Ingresar valor de pruebas para el campo naracion_hechos de tipo text",
           'elementos_probatorios' => "Ingresar valor de pruebas para el campo elementos_probatorios de tipo text",
           'denunc_nombre' => "Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar",
           'denunc_direccion' => "Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar",
           'denunc_telefono' => "Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar",
           'subtipo_sugerencia' => "Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar",
           'subtipo_felicitacion' => "Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar",
           'descripcion_sugerencia' => "Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text",
           'sol_cod_provincia' => "Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar",
           'sol_cod_canton' => "Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar",
           'en_nom_cod_provincia' => "Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar",
           'en_nom_cod_canton' => "Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= Pqrs::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new Pqrs();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new Pqrs();
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
         expect($tester->id_pqrs)->equals('Ingresar valor de pruebas para el campo id_pqrs de tipo int4');
         expect($tester->fecha_recepcion)->equals('Ingresar valor de pruebas para el campo fecha_recepcion de tipo date');
         expect($tester->num_consecutivo)->equals('Ingresar valor de pruebas para el campo num_consecutivo de tipo int4');
         expect($tester->sol_nombres)->equals('Ingresar valor de pruebas para el campo sol_nombres de tipo varchar');
         expect($tester->sol_doc_identificacion)->equals('Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4');
         expect($tester->sol_direccion)->equals('Ingresar valor de pruebas para el campo sol_direccion de tipo varchar');
         expect($tester->sol_email)->equals('Ingresar valor de pruebas para el campo sol_email de tipo varchar');
         expect($tester->sol_telefono)->equals('Ingresar valor de pruebas para el campo sol_telefono de tipo varchar');
         expect($tester->en_nom_nombres)->equals('Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar');
         expect($tester->en_nom_ruc)->equals('Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4');
         expect($tester->en_nom_direccion)->equals('Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar');
         expect($tester->en_nom_email)->equals('Ingresar valor de pruebas para el campo en_nom_email de tipo varchar');
         expect($tester->en_nom_telefono)->equals('Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar');
         expect($tester->aquien_dirige)->equals('Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar');
         expect($tester->objeto_peticion)->equals('Ingresar valor de pruebas para el campo objeto_peticion de tipo text');
         expect($tester->descripcion_peticion)->equals('Ingresar valor de pruebas para el campo descripcion_peticion de tipo text');
         expect($tester->subtipo_queja)->equals('Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar');
         expect($tester->subtipo_reclamo)->equals('Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar');
         expect($tester->subtipo_controversia)->equals('Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar');
         expect($tester->por_quien_qrc)->equals('Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar');
         expect($tester->lugar_hechos)->equals('Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar');
         expect($tester->fecha_hechos)->equals('Ingresar valor de pruebas para el campo fecha_hechos de tipo date');
         expect($tester->naracion_hechos)->equals('Ingresar valor de pruebas para el campo naracion_hechos de tipo text');
         expect($tester->elementos_probatorios)->equals('Ingresar valor de pruebas para el campo elementos_probatorios de tipo text');
         expect($tester->denunc_nombre)->equals('Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar');
         expect($tester->denunc_direccion)->equals('Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar');
         expect($tester->denunc_telefono)->equals('Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar');
         expect($tester->subtipo_sugerencia)->equals('Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar');
         expect($tester->subtipo_felicitacion)->equals('Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar');
         expect($tester->descripcion_sugerencia)->equals('Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text');
         expect($tester->sol_cod_provincia)->equals('Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar');
         expect($tester->sol_cod_canton)->equals('Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar');
         expect($tester->en_nom_cod_provincia)->equals('Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar');
         expect($tester->en_nom_cod_canton)->equals('Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar');
         expect($tester->id_cproceso)->equals('Ingresar valor de pruebas para el campo id_cproceso de tipo int4');
      }

}
