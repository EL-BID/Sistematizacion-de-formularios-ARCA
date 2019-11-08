<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaPuntosCertificadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cda Puntos Certificados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-puntos-certificados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Cda Puntos Certificados', 
        ['value' =>Url::to(['cdapuntoscertificados/create']), 'title' => 'Create Cda Puntos Certificados',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

            'id_puntos_certificados',
            'puntos_solicitados_tramite',
            'puntos_visita_tecnica',
            'puntos_verificados_senagua',
            'puntos_certificados',
            // 'puntos_devueltos',
            // 'id_cda_solicitud',

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
                    }, //Primera columna encontrada id_puntos_certificados                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['cdapuntoscertificados/deletep','id' => $model->id_puntos_certificados],true);
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
