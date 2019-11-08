<?php
use uran1980\yii\widgets\pace\Pace;

//Cargando Barra de Progreso=============================================================
echo Pace::widget([
    'color' => 'blue',
    'theme'=>'loading-bar'
]);
?>
<!-- ===================================================================================--!>

<?php
//Se crea la carpeta lview  y la vista se denomina list.php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;			//Para el menu vertical =========================
//=======================================================================================
$this->title = 'Tabla Simple';
$this->params['breadcrumbs'][] = $this->title;

//Declarando Menu Vertical
$this->params['itemsmn']=[
                ['label' => 'H', 'icon' => '', 'url' => Url::to(['/site/home'])],
                ['label' => 'B', 'icon' => '', 'url' => Url::to(['/site/home'])],
         ];
?>

<?= GridView::widget([
    'dataProvider' => $listDataProvider,			//Objeto de Datos
    'filterModel' => $searchModel,					//Objeto de Busqueda
	'layout'=>"{pager}\n{summary}\n{items}",		//Modelo de presentacion
    'columns' => [									//Columnas a presentar
        ['class' => 'yii\grid\SerialColumn'],		

        'id',
        'nombre',
        'apellido',
        [
            'attribute' => 'fecha',
            //'format' => ['raw', 'Y-m-d H:i:s'],
			'format' =>  ['date', 'php:Y-m-d'],
            'options' => ['width' => '200']
		],
    ],
]); ?>



