<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdDatosGeneralesRiegoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Datos Generales Riegos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-datos-generales-riego-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Datos Generales Riego', 
        ['value' =>Url::to(['fd-datos-generales-riego/create']), 'title' => 'Create Fd Datos Generales Riego',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_datos_generales_riego',
            'nombres_prestador_servicio',
            'direccion_oficinas',
            'nombres_apellidos_replegal',
            'posee_convencional',
            // 'num_convencional',
            // 'num_celular',
            // 'num_celular_otro',
            // 'posee_email:email',
            // 'correo_electronico',
            // 'id_conjunto_respuesta',

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
                    }, //Primera columna encontrada id_datos_generales_riego                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['fd-datos-generales-riego/deletep','id' => $model->id_datos_generales_riego],true);
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
