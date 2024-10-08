<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdDatosGeneralesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Datos Generales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-datos-generales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Datos Generales', 
        ['value' =>Url::to(['poc/fd-datos-generales/create']), 'title' => 'Create Fd Datos Generales',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_datos_generales',
            'nombres',
            'num_documento',
            'num_convencional',
            'correo_electronico',
            // 'num_celular',
            // 'direccion',
            // 'descripcion_trabajo',
            // 'nombres_apellidos_replegal',
            // 'id_tdocumento',
            // 'id_natu_juridica',
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
                    }, //Primera columna encontrada id_datos_generales                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['poc/fd-datos-generales/deletep','id' => $model->id_datos_generales],true);
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
