<?php
/**
 * This is the template for generating a CRUD controller class file.
 */

use yii\db\ActiveRecordInterface;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$controllerClass = StringHelper::basename($generator->baseEntidadFachadaTest);
$controller = StringHelper::basename($generator->baseEntidadFachada);
$modelClass = StringHelper::basename($generator->modelClass);
$searchModelClass = StringHelper::basename($generator->searchModelClass);
if ($modelClass === $searchModelClass) {
    $searchModelAlias = $searchModelClass . 'Search';
}

/* @var $class ActiveRecordInterface */
$class = $generator->modelClass;
$pks = $class::primaryKey();
$urlParams = $generator->generateUrlParams();
$actionParams = $generator->generateActionParams();
$actionParamComments = $generator->generateActionParamComments();

echo "<?php\n";
?>

namespace <?= StringHelper::dirname(ltrim($generator->nsa, '\\')) ?>;

use Yii;
use <?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>\<?= $controller ?>;
/**
 * <?= $controllerClass ?> implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo <?= $modelClass ?>.
 */
class <?= $controllerClass ?> extends \Codeception\Test\Unit
{

/**para mayor informacion sobre asserts => http://codeception.com/docs/modules/Asserts y http://codeception.com/10-04-2013/specification-phpunit.html**/
    
    public function _before()
    {
       // declaraciones y asignacion de valores que se deben tener para realizar las funciones test
    }

                                                               
                                                                                             
    public function _after()                                                              
    {             
            // funcion que se ejecuta despues de los test                                                      
    }                
    
 
    public function testBehaviors()
    {
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>\<?= $controller ?>', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,                                                          
            'Se devolvio vacio behaviors');  
            
    }
	
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>\<?= $controller ?>', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
         $urlroute='/<?=  strtolower ($modelClass) ?>/index';
         $id=null;
        //Se obtiene los valores para la barra de progreso
           $progressbar= $tester->actionProgress($urlroute,$id);
        //Se evalua caso exitoso   
        $this->assertNotEmpty($progressbar,
           'Se devolvio Vacio el html de actionProgress ');  

    }

	
	
    /**
     * Listado todos los datos del modelo <?= $modelClass ?> que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>\<?= $controller ?>', $tester);
        
        
        // Se declaran los $queryParams a enviar
            $queryParams = ['<?= $searchModelClass ?>' => [
                 <?php foreach ($generator->tableSchema->columns as $column): ?>
                            '<?= "{$column->name}" ?>' => "<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>",       
                  <?php endforeach; ?>
            ]];
             
       
        // Se obtiene el resultado de action index
                $actionindex= $tester->actionIndex($queryParams);
        <?php if (!empty($generator->searchModelClass)): ?>
                 
              // se evaluan los casos exitosos
                $this->assertNotNull($actionindex['dataProvider'],                                                          
                    'Se devolvio nullo dataProvider de actionIndex ');  
                $this->assertNotNull($actionindex['searchModel'],                                                          
                    'Se devolvio nullo searchModel de actionIndex '); 
                    

        <?php else: ?>
              // se evaluan el caso exitoso
               $this->assertNotNull($actionindex['dataProvider'],                                                          
                    'Se devolvio nullo dataProvider de actionIndex'); 

        <?php endif; ?>
                    
    }

    /**
     * Presenta un dato unico en el modelo <?= $modelClass ?>.
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>\<?= $controller ?>', $tester);
    
        // se deben declarar los valores de <?= $actionParams ?>
        
        <?php $arrayparams=split(',', $actionParams); ?>
        <?php foreach ($arrayparams as $column): ?>
        <?= $column ?> = 'valor adecuado para el tipo de dato del paramtero <?= $column ?>';
        <?php endforeach; ?>
      
        
             // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros <?= $actionParams ?>
             
             $actionView= $tester->actionView(<?= $actionParams ?>);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,
                    'Se devolvio nullo actionView ');  
 
    }

    /**
     * Crea un nuevo dato sobre el modelo <?= $modelClass ?> .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>\<?= $controller ?>', $tester);
             
            // Se declaran el rquest
              $request =  ['<?= $controller ?>' => [
                <?php foreach ($generator->tableSchema->columns as $column): ?>
                '<?= "{$column->name}" ?>' => '<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>',
             <?php endforeach; ?>
             ]];
            
                $actionCreate = $tester->actionCreate($request,false);
                
                // se evaluan que se devuleva la informacion          
                $this->assertCount(0,$actionCreate['model']['_errors'],                                                          
                        'Se devolvieron errores en el model de actionCreate, verifique por favor');   
                $this->assertNotEmpty($actionCreate['create'],                                                          
                        'Se devolvio nulo el create de actionCreate '); 
                        
        /**Para imprimir los errores 
         * $this->assert($actionCreate['model']['_errors'],
                        'Se devolvieron errores en el model de actionCreate, verifique por favor')***/


    }

   
     /**
     * Modifica un dato existente en el modelo <?= $modelClass ?>.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function testActionUpdate(<?= $actionParams ?>)
    {
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>\<?= $controller ?>', $tester);
        
         // Se declaran el rquest
              $request =  ['<?= $controller ?>' => [
                <?php foreach ($generator->tableSchema->columns as $column): ?>
                '<?= "{$column->name}" ?>' => '<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>',
             <?php endforeach; ?>
             ]];
        
        
        //se valida que sea exitoso
        $actionUpdate= $tester->actionUpdate(<?= $actionParams ?>,$request,false);
        $this->assertCount(0,$actionUpdate['model']['_errors'],                                                                                                    
                        'Se devolvieron errores en el model de actionUpdate, verifique por favor');  
        $this->assertNotEmpty($actionUpdate['update'],                                                          
                'Se devolvio nulo el create de actionUpdate '); 

                
        /**Para imprimir los errores 
         * $this->assert($actionUpdate['model']['_errors'],
                        'Se devolvieron errores en el model de actionCreate, verifique por favor')***/

        
    }

    
     /**
     * Deletes an existing <?= $modelClass ?> model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function testActionDeletep()
    {
    
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>\<?= $controller ?>', $tester);
        
        
        // se deben llenar los siguientes valores
        <?php $arrayparams=split(',', $actionParams); ?>
        <?php foreach ($arrayparams as $column): ?>
        <?= $column ?> = 'valor adecuado para el tipo de dato del paramtero <?= $column ?>';
        <?php endforeach; ?>
        
        // se valida que se pueda realizar el borrado del registro
        expect($tester->actionDeletep(<?= $actionParams ?>));

    }
    

}
