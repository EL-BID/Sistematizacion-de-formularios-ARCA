<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdCapituloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Capitulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-capitulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Capitulo', 
        ['value' =>Url::to(['poc/fd-capitulo/create']), 'title' => 'Create Fd Capitulo',
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
            // 'num_columnas',
            // 'stylecss',
            // 'numeracion',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => ' {view} {update} {delete}',
                'buttons' => [
                    'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'View'),
                                    'data-method' => 'post',
                            ]);
                    },
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_capitulo                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['poc/fd-capitulo/deletep','id' => $model->id_capitulo],true);
                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                            ]);
                    }
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
</div>
