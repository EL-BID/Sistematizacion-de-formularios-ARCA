<?php

namespace common\tests\unit\models\hidricos;

use common\models\hidricos\PsActividadRuta;

/**
 * Este es el unit test para la clase "ps_actividad_ruta".
 *
 * @property varchar         $estado
 * @property int4            $id_actividad_origen
 * @property int4            $id_actividad_destino
 * @property varchar         $cod_rol
 * @property int4            $id_eproceso
 * @property varchar         $obligatorio_diligenciamiento
 * @property varchar         $tipo_pantalla_ruta
 * @property int4            $id_actividad_ruta
 * @property PsActividad     $idActividadOrigen
 * @property PsActividad     $idActividadDestino
 * @property PsEstadoProceso $idEproceso
 * @property Rol             $codRol
 */
class PsActividadRutaTest extends \Codeception\Test\Unit
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
        $tester = new PsActividadRuta();
        $tester->estado = 'Ingresar valor de pruebas para el campo estado de tipo varchar';
        $tester->id_actividad_origen = 'Ingresar valor de pruebas para el campo id_actividad_origen de tipo int4';
        $tester->id_actividad_destino = 'Ingresar valor de pruebas para el campo id_actividad_destino de tipo int4';
        $tester->cod_rol = 'Ingresar valor de pruebas para el campo cod_rol de tipo varchar';
        $tester->id_eproceso = 'Ingresar valor de pruebas para el campo id_eproceso de tipo int4';
        $tester->obligatorio_diligenciamiento = 'Ingresar valor de pruebas para el campo obligatorio_diligenciamiento de tipo varchar';
        $tester->tipo_pantalla_ruta = 'Ingresar valor de pruebas para el campo tipo_pantalla_ruta de tipo varchar';
        $tester->id_actividad_ruta = 'Ingresar valor de pruebas para el campo id_actividad_ruta de tipo int4';

        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }

    public function testInsert()
    {
        $tester = new PsActividadRuta();
        $tester->estado = 'Ingresar valor de pruebas para el campo estado de tipo varchar';
        $tester->id_actividad_origen = 'Ingresar valor de pruebas para el campo id_actividad_origen de tipo int4';
        $tester->id_actividad_destino = 'Ingresar valor de pruebas para el campo id_actividad_destino de tipo int4';
        $tester->cod_rol = 'Ingresar valor de pruebas para el campo cod_rol de tipo varchar';
        $tester->id_eproceso = 'Ingresar valor de pruebas para el campo id_eproceso de tipo int4';
        $tester->obligatorio_diligenciamiento = 'Ingresar valor de pruebas para el campo obligatorio_diligenciamiento de tipo varchar';
        $tester->tipo_pantalla_ruta = 'Ingresar valor de pruebas para el campo tipo_pantalla_ruta de tipo varchar';
        $tester->id_actividad_ruta = 'Ingresar valor de pruebas para el campo id_actividad_ruta de tipo int4';

        expect_that($tester->save());

        /*
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,
            'PsActividadRuta  Errors no se puede insertar en la base de datos.');
            */

        return $tester;
    }

    public function testSelect()
    {
        $tester = PsActividadRuta::findOne(
        [
           'estado' => 'Ingresar valor de pruebas para el campo estado de tipo varchar',
           'id_actividad_origen' => 'Ingresar valor de pruebas para el campo id_actividad_origen de tipo int4',
           'id_actividad_destino' => 'Ingresar valor de pruebas para el campo id_actividad_destino de tipo int4',
           'cod_rol' => 'Ingresar valor de pruebas para el campo cod_rol de tipo varchar',
           'id_eproceso' => 'Ingresar valor de pruebas para el campo id_eproceso de tipo int4',
           'obligatorio_diligenciamiento' => 'Ingresar valor de pruebas para el campo obligatorio_diligenciamiento de tipo varchar',
           'tipo_pantalla_ruta' => 'Ingresar valor de pruebas para el campo tipo_pantalla_ruta de tipo varchar',
           'id_actividad_ruta' => 'Ingresar valor de pruebas para el campo id_actividad_ruta de tipo int4',
          ]);

        // caso exitoso de consulta
        $this->assertNotNull($tester,
            'PsActividadRuta No se puede consultar en la base de datos, retorna nulo produciendose un error');
        /* Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,
            'PsActividadRuta Ee puede consultar en la base de datos.');   */

        return $tester;
    }

    public function testDelete()
    {
        $tester = PsActividadRuta::findOne(
        [
           'estado' => 'Ingresar valor de pruebas para el campo estado de tipo varchar',
           'id_actividad_origen' => 'Ingresar valor de pruebas para el campo id_actividad_origen de tipo int4',
           'id_actividad_destino' => 'Ingresar valor de pruebas para el campo id_actividad_destino de tipo int4',
           'cod_rol' => 'Ingresar valor de pruebas para el campo cod_rol de tipo varchar',
           'id_eproceso' => 'Ingresar valor de pruebas para el campo id_eproceso de tipo int4',
           'obligatorio_diligenciamiento' => 'Ingresar valor de pruebas para el campo obligatorio_diligenciamiento de tipo varchar',
           'tipo_pantalla_ruta' => 'Ingresar valor de pruebas para el campo tipo_pantalla_ruta de tipo varchar',
           'id_actividad_ruta' => 'Ingresar valor de pruebas para el campo id_actividad_ruta de tipo int4',
         ]);

        expect_that($tester->delete());
    }

    public function testTableName()
    {
        $table = PsActividadRuta::tableName();
        $this->assertNotEmpty($table,
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table);
    }

    public function testRules()
    {
        $tester = new PsActividadRuta();
        $rules = $tester->rules();
        $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');
    }

    public function testAttributeLabels()
    {
        $tester = new PsActividadRuta();
        $labels = $tester->attributeLabels();
        $this->assertNotEmpty($labels,
            'Se devolvio vacio array con los labels ');
    }

    /**
     *  The following line indicates that the parameter values entered here are derived from testSelect Output.
     *
     * @depends testSelect
     */
    public function testModelProperty($tester)
    {
        expect($tester->estado)->equals('Ingresar valor de pruebas para el campo estado de tipo varchar');
        expect($tester->id_actividad_origen)->equals('Ingresar valor de pruebas para el campo id_actividad_origen de tipo int4');
        expect($tester->id_actividad_destino)->equals('Ingresar valor de pruebas para el campo id_actividad_destino de tipo int4');
        expect($tester->cod_rol)->equals('Ingresar valor de pruebas para el campo cod_rol de tipo varchar');
        expect($tester->id_eproceso)->equals('Ingresar valor de pruebas para el campo id_eproceso de tipo int4');
        expect($tester->obligatorio_diligenciamiento)->equals('Ingresar valor de pruebas para el campo obligatorio_diligenciamiento de tipo varchar');
        expect($tester->tipo_pantalla_ruta)->equals('Ingresar valor de pruebas para el campo tipo_pantalla_ruta de tipo varchar');
        expect($tester->id_actividad_ruta)->equals('Ingresar valor de pruebas para el campo id_actividad_ruta de tipo int4');
    }
}
