<?php
/**
 * This is the template for generating a CRUD controller class file.
 */

use yii\db\ActiveRecordInterface;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$controllerClass = StringHelper::basename($generator->controllerClassTest);
$controller = StringHelper::basename($generator->controllerClass);
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
use <?= ltrim($generator->controllerClass, '\\') ?>;


/**
 * <?= $controllerClass ?> implementa las acciones a través del sistema CRUD para el modelo <?= $modelClass ?>.
 */
class <?= $controllerClass ?> extends \Codeception\Test\Unit
{
    public function _before()
    {
       // declaraciones y asignacion de valores que se deben tener para realizar las funciones test
    }

                                                               
                                                                                             
    protected function _after()                                                              
    {             
            // funcion que se ejecuta despues de los test                                                      
    }                
   
    
    public function testBehaviors()
    {
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>('<?= $controller ?>','<?= ltrim($generator->controllerClass, '\\') ?>');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= ltrim($generator->controllerClass, '\\') ?>', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>('<?= $controller ?>','<?= ltrim($generator->controllerClass, '\\') ?>');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= ltrim($generator->controllerClass, '\\') ?>', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/<?=  strtolower ($modelClass) ?>/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo <?= $modelClass ?> que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>('<?= $controller ?>','<?= ltrim($generator->controllerClass, '\\') ?>');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= ltrim($generator->controllerClass, '\\') ?>', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['<?= $searchModelClass ?>' => [
                 <?php foreach ($generator->tableSchema->columns as $column): ?>
                            '<?= "{$column->name}" ?>' => "<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>",       
                  <?php endforeach; ?>
            ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('<?=$controller?>/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>('<?= $controller ?>','<?= ltrim($generator->controllerClass, '\\') ?>');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= ltrim($generator->controllerClass, '\\') ?>', $tester);
        
        // se deben declarar los valores de <?= $actionParams ?> para enviar la llave
        
        <?php $arrayparams=split(',', $actionParams);
            $llave="";
        ?>
        <?php foreach ($arrayparams as $column): ?>
        <?= $column ?> = 'valor adecuado para el tipo de dato del paramtero <?= $column ?>';
        <?php $llave=$llave."'".substr($column,1,strlen($column))."' => $column, "; ?>
        <?php endforeach; ?>
        <?php 
            if($llave != ""){
                $llave="[".substr($llave, 0, strlen($llave)-2)."]";
            }
        ?>
             // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros <?= $actionParams ?>
             
            $actionView=Yii::$app->runAction('<?=$controller?>/view',<?= $llave ?>);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>('<?= $controller ?>','<?= ltrim($generator->controllerClass, '\\') ?>');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= ltrim($generator->controllerClass, '\\') ?>', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['<?= $controller ?>' => [
                 <?php foreach ($generator->tableSchema->columns as $column): ?>
                            '<?= "{$column->name}" ?>' => "<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>",       
                  <?php endforeach; ?>
            ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('<?=$controller?>/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate(<?= $actionParams ?>)
    {
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>('<?= $controller ?>','<?= ltrim($generator->controllerClass, '\\') ?>');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= ltrim($generator->controllerClass, '\\') ?>', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['<?= $controller ?>' => [
               <?php foreach ($generator->tableSchema->columns as $column): ?>
                          '<?= "{$column->name}" ?>' => "<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>",       
                <?php endforeach; ?>
          ]];
        
        
         // se deben declarar los valores de <?= $actionParams ?> para enviar la llave
         <?php $arrayparams=split(',', $actionParams);
            $llave="";
        ?>
        <?php foreach ($arrayparams as $column): ?>
        <?= $column ?> = 'valor adecuado para el tipo de dato del paramtero <?= $column ?>';
        <?php $llave=$llave."'".substr($column,1,strlen($column))."' => $column, "; ?>
        <?php endforeach; ?>
        <?php 
            if($llave != ""){
                $llave="[".substr($llave, 0, strlen($llave)-2)."]";
            }
        ?>
        
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('<?=$controller?>/update',<?= $llave ?>);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep(<?= $actionParams ?>)
    {
    
        //Se declara el objeto a verificar
        $tester = new  <?= $controller ?>('<?= $controller ?>','<?= ltrim($generator->controllerClass, '\\') ?>');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('<?= ltrim($generator->controllerClass, '\\') ?>', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
         <?php $arrayparams=split(',', $actionParams);
            $llave="";
        ?>
        <?php foreach ($arrayparams as $column): ?>
        <?= $column ?> = 'valor adecuado para el tipo de dato del paramtero <?= $column ?>';
        <?php $llave=$llave."'".substr($column,1,strlen($column))."' => $column, "; ?>
        <?php endforeach; ?>
        <?php 
            if($llave != ""){
                $llave="[".substr($llave, 0, strlen($llave)-2)."]";
            }
        ?>
        
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(<?=$controller?>/update',<?= $llave ?>);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
