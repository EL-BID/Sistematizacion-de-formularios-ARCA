<?php
/**
 * This is the template for generating a CRUD controller class file.
 */

use yii\db\ActiveRecordInterface;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$controllerClass = StringHelper::basename($generator->baseEntidadFachada);
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
use <?= ltrim($generator->modelClass, '\\') ?>;
<?php if (!empty($generator->searchModelClass)): ?>
use <?= ltrim($generator->searchModelClass, '\\') . (isset($searchModelAlias) ? " as $searchModelAlias" : "") ?>;
<?php else: ?>
use yii\data\ActiveDataProvider;
<?php endif; ?>
use <?= ltrim($generator->baseFachadaPry, '\\') ?>;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * <?= $controllerClass ?> implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo <?= $modelClass ?>.
 */
class <?= $controllerClass ?> extends <?= StringHelper::basename($generator->baseFachadaPry). "\n" ?>
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
	
	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/
	
	public function actionProgress($urlroute=null,$id=null){
		
	
            $progressbar = "<div style='display:block;margin:auto;width:50%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
            $progressbar = $progressbar . "<div style='display:block;margin:auto;width:50%;text-align:center'>Guardando</div>"; 	
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo <?= $modelClass ?> que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
        <?php if (!empty($generator->searchModelClass)): ?>
        $searchModel = new <?= isset($searchModelAlias) ? $searchModelAlias : $searchModelClass ?>();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
        <?php else: ?>
                $dataProvider = new ActiveDataProvider([
                    'query' => <?= $modelClass ?>::find(),
                ]);

                return [
                    'dataProvider' => $dataProvider
                ];
        <?php endif; ?>
    }

    /**
     * Presenta un dato unico en el modelo <?= $modelClass ?>.
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function actionView(<?= $actionParams ?>)
    {       
            return $this->findModel(<?= $actionParams ?>);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo <?= $modelClass ?> .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax)
    {
        $model = new <?= $modelClass ?>();

        if ($model->load($request) && $model->save()) {
			
                return [
                    'model' => $model,
                    'create' => 'True'
                ];	

        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'create' => 'False'
                ];

        }
    }

    /**
     * Modifica un dato existente en el modelo <?= $modelClass ?>.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function actionUpdate(<?= $actionParams ?>,$request,$isAjax)
    {
        $model = $this->findModel(<?= $actionParams ?>);

        if ($model->load($request) && $model->save()) {
			
			
			return [
                            'model' => $model,
                            'update' => 'True'
                        ];
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'update' => 'Ajax'
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'update' => 'False'
                        ];
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
        $this->findModel(<?= $actionParams ?>)->delete();

    }

    /**
     * Encuentra el modelo de <?= $modelClass ?> basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return <?= $modelClass ?> el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel(<?= $actionParams ?>)
    {
            <?php
            if (count($pks) === 1) {
                $condition = '$id';
            } else {
                $condition = [];
                foreach ($pks as $pk) {
                    $condition[] = "'$pk' => \$$pk";
                }
                $condition = '[' . implode(', ', $condition) . ']';
            }
            ?>
        if (($model = <?= $modelClass ?>::findOne(<?= $condition ?>)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  <?=                   $modelClass ?>
     */
    protected function findModelByParams($params)
    {
        if (($model = <?= $modelClass ?>::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo <?= $modelClass ?>
     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type <?= $modelClass ?>
     */
     public function carga<?= $modelClass ?>($params){
        return $this->findModelByParams($params);
    }
}