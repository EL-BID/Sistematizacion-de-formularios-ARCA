<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdRespuestaXMesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Respuesta Xmes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-respuesta-xmes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Respuesta Xmes', 
        ['value' =>Url::to(['poc/fd-respuesta-x-mes/create']), 'title' => 'Create Fd Respuesta Xmes',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ene_decimal',
            'feb_decimal',
            'mar_decimal',
            'abr_decimal',
            'may_decimal',
            // 'jun_decimal',
            // 'jul_decimal',
            // 'ago_decimal',
            // 'sep_decimal',
            // 'oct_decimal',
            // 'nov_decimal',
            // 'dic_decimal',
            // 'id_respuesta',
            // 'id_pregunta',
            // 'descripcion',
            // 'id_opcion_select',
            // 'id_respuesta_x_mes',

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
                    }, //Primera columna encontrada ene_decimal                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['fd-respuesta-x-mes/deletep','id' => $model->id_respuesta_x_mes],true);
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
