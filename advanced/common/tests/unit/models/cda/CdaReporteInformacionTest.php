<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\CdaReporteInformacion;
/**
 * Este es el unit test para la clase "cda_reporte_informacion".
 *
 * @property varchar $sector_solicitado
 * @property varchar $institucion_solicitante
 * @property varchar $solicitante
 * @property varchar $fuente_solicitada
 * @property numeric $q_solicitado
 * @property int4 $tiempo_years
 * @property int4 $id_tfuente
 * @property int4 $id_subtfuente
 * @property int4 $id_caracteristica
 * @property int4 $id_treporte
 * @property int4 $id_destino
 * @property int4 $id_uso_solicitado
 * @property int4 $id_ubicacion
 * @property int4 $id_reporte_informacion
 * @property numeric $abscisa
 * @property int4 $id_cda
 * @property varchar $observaciones
 * @property numeric $proba_excedencia_obtenida
 * @property numeric $proba_excedencia_certificado
 * @property varchar $decision
 * @property varchar $observaciones_decision
 * @property int4 $id_actividad
 * @property int4 $id_cactividad_proceso
 *
 * @property Cda $idCda
 * @property CdaCaracteristica $idCaracteristica
 * @property CdaDestino $idDestino
 * @property CdaSubtipoFuente $idSubtfuente
 * @property CdaTipoFuente $idTfuente
 * @property CdaTipoReporte $idTreporte
 * @property CdaUsoSolicitado $idUsoSolicitado
 * @property FdUbicacion $idUbicacion
 * @property PsActividad $idActividad
 * @property PsCactividadProceso $idCactividadProceso
 * @property FdCoordenada[] $fdCoordenadas
 * @property FdCoordenada[] $fdCoordenadas0
 */
class CdaReporteInformacionTest extends \Codeception\Test\Unit
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
        $tester = new CdaReporteInformacion();
        $tester->sector_solicitado = "Ingresar valor de pruebas para el campo sector_solicitado de tipo varchar";
        $tester->institucion_solicitante = "Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar";
        $tester->solicitante = "Ingresar valor de pruebas para el campo solicitante de tipo varchar";
        $tester->fuente_solicitada = "Ingresar valor de pruebas para el campo fuente_solicitada de tipo varchar";
        $tester->q_solicitado = "Ingresar valor de pruebas para el campo q_solicitado de tipo numeric";
        $tester->tiempo_years = "Ingresar valor de pruebas para el campo tiempo_years de tipo int4";
        $tester->id_tfuente = "Ingresar valor de pruebas para el campo id_tfuente de tipo int4";
        $tester->id_subtfuente = "Ingresar valor de pruebas para el campo id_subtfuente de tipo int4";
        $tester->id_caracteristica = "Ingresar valor de pruebas para el campo id_caracteristica de tipo int4";
        $tester->id_treporte = "Ingresar valor de pruebas para el campo id_treporte de tipo int4";
        $tester->id_destino = "Ingresar valor de pruebas para el campo id_destino de tipo int4";
        $tester->id_uso_solicitado = "Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4";
        $tester->id_ubicacion = "Ingresar valor de pruebas para el campo id_ubicacion de tipo int4";
        $tester->id_reporte_informacion = "Ingresar valor de pruebas para el campo id_reporte_informacion de tipo int4";
        $tester->abscisa = "Ingresar valor de pruebas para el campo abscisa de tipo numeric";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->proba_excedencia_obtenida = "Ingresar valor de pruebas para el campo proba_excedencia_obtenida de tipo numeric";
        $tester->proba_excedencia_certificado = "Ingresar valor de pruebas para el campo proba_excedencia_certificado de tipo numeric";
        $tester->decision = "Ingresar valor de pruebas para el campo decision de tipo varchar";
        $tester->observaciones_decision = "Ingresar valor de pruebas para el campo observaciones_decision de tipo varchar";
        $tester->id_actividad = "Ingresar valor de pruebas para el campo id_actividad de tipo int4";
        $tester->id_cactividad_proceso = "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CdaReporteInformacion;
        $tester->sector_solicitado = "Ingresar valor de pruebas para el campo sector_solicitado de tipo varchar";
        $tester->institucion_solicitante = "Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar";
        $tester->solicitante = "Ingresar valor de pruebas para el campo solicitante de tipo varchar";
        $tester->fuente_solicitada = "Ingresar valor de pruebas para el campo fuente_solicitada de tipo varchar";
        $tester->q_solicitado = "Ingresar valor de pruebas para el campo q_solicitado de tipo numeric";
        $tester->tiempo_years = "Ingresar valor de pruebas para el campo tiempo_years de tipo int4";
        $tester->id_tfuente = "Ingresar valor de pruebas para el campo id_tfuente de tipo int4";
        $tester->id_subtfuente = "Ingresar valor de pruebas para el campo id_subtfuente de tipo int4";
        $tester->id_caracteristica = "Ingresar valor de pruebas para el campo id_caracteristica de tipo int4";
        $tester->id_treporte = "Ingresar valor de pruebas para el campo id_treporte de tipo int4";
        $tester->id_destino = "Ingresar valor de pruebas para el campo id_destino de tipo int4";
        $tester->id_uso_solicitado = "Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4";
        $tester->id_ubicacion = "Ingresar valor de pruebas para el campo id_ubicacion de tipo int4";
        $tester->id_reporte_informacion = "Ingresar valor de pruebas para el campo id_reporte_informacion de tipo int4";
        $tester->abscisa = "Ingresar valor de pruebas para el campo abscisa de tipo numeric";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->proba_excedencia_obtenida = "Ingresar valor de pruebas para el campo proba_excedencia_obtenida de tipo numeric";
        $tester->proba_excedencia_certificado = "Ingresar valor de pruebas para el campo proba_excedencia_certificado de tipo numeric";
        $tester->decision = "Ingresar valor de pruebas para el campo decision de tipo varchar";
        $tester->observaciones_decision = "Ingresar valor de pruebas para el campo observaciones_decision de tipo varchar";
        $tester->id_actividad = "Ingresar valor de pruebas para el campo id_actividad de tipo int4";
        $tester->id_cactividad_proceso = "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CdaReporteInformacion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CdaReporteInformacion::findOne(                                                               
        [
           'sector_solicitado' => "Ingresar valor de pruebas para el campo sector_solicitado de tipo varchar",
           'institucion_solicitante' => "Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar",
           'solicitante' => "Ingresar valor de pruebas para el campo solicitante de tipo varchar",
           'fuente_solicitada' => "Ingresar valor de pruebas para el campo fuente_solicitada de tipo varchar",
           'q_solicitado' => "Ingresar valor de pruebas para el campo q_solicitado de tipo numeric",
           'tiempo_years' => "Ingresar valor de pruebas para el campo tiempo_years de tipo int4",
           'id_tfuente' => "Ingresar valor de pruebas para el campo id_tfuente de tipo int4",
           'id_subtfuente' => "Ingresar valor de pruebas para el campo id_subtfuente de tipo int4",
           'id_caracteristica' => "Ingresar valor de pruebas para el campo id_caracteristica de tipo int4",
           'id_treporte' => "Ingresar valor de pruebas para el campo id_treporte de tipo int4",
           'id_destino' => "Ingresar valor de pruebas para el campo id_destino de tipo int4",
           'id_uso_solicitado' => "Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4",
           'id_ubicacion' => "Ingresar valor de pruebas para el campo id_ubicacion de tipo int4",
           'id_reporte_informacion' => "Ingresar valor de pruebas para el campo id_reporte_informacion de tipo int4",
           'abscisa' => "Ingresar valor de pruebas para el campo abscisa de tipo numeric",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'proba_excedencia_obtenida' => "Ingresar valor de pruebas para el campo proba_excedencia_obtenida de tipo numeric",
           'proba_excedencia_certificado' => "Ingresar valor de pruebas para el campo proba_excedencia_certificado de tipo numeric",
           'decision' => "Ingresar valor de pruebas para el campo decision de tipo varchar",
           'observaciones_decision' => "Ingresar valor de pruebas para el campo observaciones_decision de tipo varchar",
           'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",
           'id_cactividad_proceso' => "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CdaReporteInformacion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CdaReporteInformacion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CdaReporteInformacion::findOne(                                                               
        [
           'sector_solicitado' => "Ingresar valor de pruebas para el campo sector_solicitado de tipo varchar",
           'institucion_solicitante' => "Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar",
           'solicitante' => "Ingresar valor de pruebas para el campo solicitante de tipo varchar",
           'fuente_solicitada' => "Ingresar valor de pruebas para el campo fuente_solicitada de tipo varchar",
           'q_solicitado' => "Ingresar valor de pruebas para el campo q_solicitado de tipo numeric",
           'tiempo_years' => "Ingresar valor de pruebas para el campo tiempo_years de tipo int4",
           'id_tfuente' => "Ingresar valor de pruebas para el campo id_tfuente de tipo int4",
           'id_subtfuente' => "Ingresar valor de pruebas para el campo id_subtfuente de tipo int4",
           'id_caracteristica' => "Ingresar valor de pruebas para el campo id_caracteristica de tipo int4",
           'id_treporte' => "Ingresar valor de pruebas para el campo id_treporte de tipo int4",
           'id_destino' => "Ingresar valor de pruebas para el campo id_destino de tipo int4",
           'id_uso_solicitado' => "Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4",
           'id_ubicacion' => "Ingresar valor de pruebas para el campo id_ubicacion de tipo int4",
           'id_reporte_informacion' => "Ingresar valor de pruebas para el campo id_reporte_informacion de tipo int4",
           'abscisa' => "Ingresar valor de pruebas para el campo abscisa de tipo numeric",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'proba_excedencia_obtenida' => "Ingresar valor de pruebas para el campo proba_excedencia_obtenida de tipo numeric",
           'proba_excedencia_certificado' => "Ingresar valor de pruebas para el campo proba_excedencia_certificado de tipo numeric",
           'decision' => "Ingresar valor de pruebas para el campo decision de tipo varchar",
           'observaciones_decision' => "Ingresar valor de pruebas para el campo observaciones_decision de tipo varchar",
           'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",
           'id_cactividad_proceso' => "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CdaReporteInformacion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CdaReporteInformacion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CdaReporteInformacion();
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
         expect($tester->sector_solicitado)->equals('Ingresar valor de pruebas para el campo sector_solicitado de tipo varchar');
         expect($tester->institucion_solicitante)->equals('Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar');
         expect($tester->solicitante)->equals('Ingresar valor de pruebas para el campo solicitante de tipo varchar');
         expect($tester->fuente_solicitada)->equals('Ingresar valor de pruebas para el campo fuente_solicitada de tipo varchar');
         expect($tester->q_solicitado)->equals('Ingresar valor de pruebas para el campo q_solicitado de tipo numeric');
         expect($tester->tiempo_years)->equals('Ingresar valor de pruebas para el campo tiempo_years de tipo int4');
         expect($tester->id_tfuente)->equals('Ingresar valor de pruebas para el campo id_tfuente de tipo int4');
         expect($tester->id_subtfuente)->equals('Ingresar valor de pruebas para el campo id_subtfuente de tipo int4');
         expect($tester->id_caracteristica)->equals('Ingresar valor de pruebas para el campo id_caracteristica de tipo int4');
         expect($tester->id_treporte)->equals('Ingresar valor de pruebas para el campo id_treporte de tipo int4');
         expect($tester->id_destino)->equals('Ingresar valor de pruebas para el campo id_destino de tipo int4');
         expect($tester->id_uso_solicitado)->equals('Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4');
         expect($tester->id_ubicacion)->equals('Ingresar valor de pruebas para el campo id_ubicacion de tipo int4');
         expect($tester->id_reporte_informacion)->equals('Ingresar valor de pruebas para el campo id_reporte_informacion de tipo int4');
         expect($tester->abscisa)->equals('Ingresar valor de pruebas para el campo abscisa de tipo numeric');
         expect($tester->id_cda)->equals('Ingresar valor de pruebas para el campo id_cda de tipo int4');
         expect($tester->observaciones)->equals('Ingresar valor de pruebas para el campo observaciones de tipo varchar');
         expect($tester->proba_excedencia_obtenida)->equals('Ingresar valor de pruebas para el campo proba_excedencia_obtenida de tipo numeric');
         expect($tester->proba_excedencia_certificado)->equals('Ingresar valor de pruebas para el campo proba_excedencia_certificado de tipo numeric');
         expect($tester->decision)->equals('Ingresar valor de pruebas para el campo decision de tipo varchar');
         expect($tester->observaciones_decision)->equals('Ingresar valor de pruebas para el campo observaciones_decision de tipo varchar');
         expect($tester->id_actividad)->equals('Ingresar valor de pruebas para el campo id_actividad de tipo int4');
         expect($tester->id_cactividad_proceso)->equals('Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4');
      }

}
