<?php
/**
 * This is the template for generating a CRUD controller class file.
 */

use yii\db\ActiveRecordInterface;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$controllerClass = StringHelper::basename($generator->controllerClass);
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

namespace <?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>;

use Yii;
use <?= ltrim($generator->baseEntidadFachada, '\\') ?>;
use <?= ltrim($generator->baseControllerPry, '\\') ?>;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * <?= $controllerClass ?> implementa las acciones a través del sistema CRUD para el modelo <?= $modelClass ?>.
 */
class <?= $controllerClass ?> extends <?= StringHelper::basename($generator->baseControllerPry). "\n" ?>
{
  //private $facade =    <?= StringHelper::basename($generator->baseEntidadFachada); ?>;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  <?= StringHelper::basename($generator->baseEntidadFachada); ?>;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  <?= StringHelper::basename($generator->baseEntidadFachada); ?>;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo <?= $modelClass ?> que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  <?= StringHelper::basename($generator->baseEntidadFachada); ?>;
<?php if (!empty($generator->searchModelClass)): ?>
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
<?php else: ?>
        $data= $facade->actionIndex(Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $data['dataProvider']
        ]);
<?php endif; ?>
    }

    /**
     * Presenta un dato unico en el modelo <?= $modelClass ?>.
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function actionView(<?= $actionParams ?>)
    {
        $facade =  new  <?= StringHelper::basename($generator->baseEntidadFachada); ?>;
        return $this->render('view', [
            'model' => $facade->actionView(<?= $actionParams ?>),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo <?= $modelClass ?> .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  <?= StringHelper::basename($generator->baseEntidadFachada); ?>;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', <?= $urlParams ?>]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo <?= $modelClass ?>.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function actionUpdate(<?= $actionParams ?>)
    {
        $facade =  new  <?= StringHelper::basename($generator->baseEntidadFachada); ?>;
        $modelE= $facade->actionUpdate(<?= $actionParams ?>,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', <?= $urlParams ?>]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing <?= $modelClass ?> model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function actionDeletep(<?= $actionParams ?>)
    {
        $facade =  new  <?= StringHelper::basename($generator->baseEntidadFachada); ?>;
        $facade->actionDeletep(<?= $actionParams ?>);

        return $this->redirect(['index']);
    }

    
}
