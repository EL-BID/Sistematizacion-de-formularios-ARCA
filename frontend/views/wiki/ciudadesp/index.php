<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CiudadespSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ciudadesps';
$this->params['breadcrumbs'][] = $this->title;

$this->params['itemsmn']=[ 
                            ['label' => 'C', 'icon' => '', 'url' => Url::to(['/ciudadesp/index'])], 
                            ['label' => 'P', 'icon' => '', 'url' => Url::to(['/proyectos/index'])], 
                         ]; 
?>
<div class="ciudadesp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Ciudadesp', 
        ['value' =>Url::to(['ciudadesp/create']), 'title' => 'Create Ciudadesp',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'nombre',

            [
			
				'class' => 'yii\grid\ActionColumn',
				 'header' => 'Action',
                'template' => ' {update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                     'class' => 'btn btn-default btn-xs showModalButton',
                        ]);
                        
   
                    }, //Primera columna encontrada Id                    
					'delete' => function($url, $model){
						$url2 = Url::toRoute(['ciudadesp/deletep','id' => $model->Id],true);
						return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url,[
							'title' => Yii::t('app', 'Delete'),
							'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?::'.$url2),
                            'data-method' => 'post',
						]);
					}
                                        
                                        
                ],
			
			
			],
        ],
    ]); ?>
</div>
