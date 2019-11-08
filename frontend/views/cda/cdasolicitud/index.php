<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaSolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cda Solicituds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-solicitud-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Cda Solicitud', 
        ['value' =>Url::to(['cdasolicitud/create']), 'title' => 'Create Cda Solicitud',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_cda_solicitud',
            'num_solicitud',
            'fecha_solicitud',
            'fecha_ingreso',
            'id_cproceso_arca',
            // 'id_cproceso_senagua',
            // 'tramite_administrativo',
            // 'numero_tramites',
            // 'id_cda_rol',
            // 'id_dh_cac',
            // 'rol_en_calidad',
            // 'enviado_por',

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
                    }, //Primera columna encontrada id_cda_solicitud                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['cdasolicitud/deletep','id' => $model->id_cda_solicitud],true);
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
