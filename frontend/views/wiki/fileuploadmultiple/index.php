<?php
//Se crea la carpeta lview  y la vista se denomina list.php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;			//Para el menu vertical =========================


$this->title = 'Gestor de Archivos';
$this->params['breadcrumbs'][] = $this->title;

?>
 <p>
        <?= Html::a('Subir Archivo', ['create'], ['class' => 'btn btn-success']) ?>
</p>
    
<?= GridView::widget([
    'dataProvider' => $dataProvider,			
    'filterModel' => $searchModel,					
    'layout'=>"{pager}\n{summary}\n{items}",		
    'columns' => [									
        ['class' => 'yii\grid\SerialColumn'],		
        'Id',
        'filename',
        'folder'
    ],
]); ?>


