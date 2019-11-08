<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CapitulosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Capitulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitulos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Capitulos', 
        ['value' =>Url::to(['capitulos/create']), 'title' => 'Create Capitulos',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_capitulo',
            'nom_capitulo',
            'orden',
            'url:url',
            'consulta',
            // 'id_tview_cap',
            // 'id_tcapitulo',
            // 'icono',
            // 'id_conjunto_pregunta',
            // 'id_comando',

            [
			
				'class' => 'yii\grid\ActionColumn',
				 'header' => 'Action',
                'template' => ' {update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                     'class' => 'btn btn-default btn-xs showModalButton',
                        ]);
                        
   
                    }, //Primera columna encontrada id_capitulo                    
					'delete' => function($url, $model){
						$url2 = Url::toRoute(['capitulos/deletep','id' => $model->Id],true);
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
