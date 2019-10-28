<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cda Reporte Informacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-reporte-informacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Nuevo Cda Reporte Informacion', 
        ['value' =>Url::to(['cda-reporte-informacion/create']), 'title' => 'Nuevo Cda Reporte Informacion',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'sector_solicitado',
            'institucion_solicitante',
            'solicitante',
            'fuente_solicitada',
            'q_solicitado',
            // 'tiempo_years',
            // 'id_tfuente',
            // 'id_subtfuente',
            // 'id_caracteristica',
            // 'id_treporte',
            // 'id_destino',
            // 'id_uso_solicitado',
            // 'id_ubicacion',
            // 'id_coordenada',
            // 'id_reporte_informacion',
            // 'abscisa',
            // 'id_cda',
            // 'observaciones',
            // 'proba_excedencia_obtenida',
            // 'proba_excedencia_certificado',
            // 'decision',
            // 'observaciones_decision',
            // 'id_actividad',

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
                    }, //Primera columna encontrada sector_solicitado                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['cda-reporte-informacion/deletep','id' => $model->id_reporte_informacion],true);
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
