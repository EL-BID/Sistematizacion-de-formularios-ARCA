<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdRespuestaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Respuestas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-respuesta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Respuesta', 
        ['value' =>Url::to(['poc/fd-respuesta/create']), 'title' => 'Create Fd Respuesta',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_respuesta',
            'ra_fecha',
            'ra_check',
            'ra_descripcion:ntext',
            'ra_entero',
            // 'ra_decimal',
            // 'ra_porcentaje',
            // 'id_conjunto_respuesta',
            // 'ra_moneda',
            // 'id_pregunta',
            // 'id_opcion_select',
            // 'id_tpregunta',
            // 'id_capitulo',
            // 'id_formato',
            // 'id_conjunto_pregunta',
            // 'id_version',
            // 'cantidad_registros',

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
                    }, //Primera columna encontrada id_respuesta                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['poc/fd-respuesta/deletep','id' => $model->id_respuesta],true);
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
