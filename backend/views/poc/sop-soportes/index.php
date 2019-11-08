<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\SopSoportesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sop Soportes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sop-soportes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Sop Soportes', 
        ['value' =>Url::to(['poc/sop-soportes/create']), 'title' => 'Create Sop Soportes',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_soportes',
            'ruta_soporte',
            'titulo_soporte',
            'palabras_clave',
            'descripcion:ntext',
            // 'fuente_soporte',
            // 'autor_soporte',
            // 'idioma_soporte',
            // 'formato_soportes',
            // 'tamanio_soportes',
            // 'id_respuesta',

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
                    }, //Primera columna encontrada id_soportes                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['poc/sop-soportes/deletep','id' => $model->id_soportes],true);
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
