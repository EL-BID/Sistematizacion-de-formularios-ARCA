<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cargaquipux\PsDetArcCargueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ps Det Arc Cargues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-det-arc-cargue-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Nuevo Ps Det Arc Cargue', 
        ['value' =>Url::to(['cargaquipux/ps-det-arc-cargue/create']), 'title' => 'Nuevo Ps Det Arc Cargue',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_archivo_cargue',
            'id_det_arc_cargue',
            'num_nom_hoja',
            'num_columna_excel',
            'nom_columna_cargue',
            // 'nom_columna_excel',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => ' {view} {update} {delete}',
                'buttons' => [
                    'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'Ver'),
                                    'data-method' => 'post',
                            ]);
                    },
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_archivo_cargue                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['cargaquipux/ps-det-arc-cargue/deletep','id' => $model->id_det_arc_cargue],true);
                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                    'title' => Yii::t('app', 'Borrar'),
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', '¿Desea Eliminar el Registro?'),
                            ]);
                    }
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
</div>
