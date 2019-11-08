<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CDA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Nuevo Cda', 
        ['value' =>Url::to(['cda/create']), 'title' => 'Nuevo Cda',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'fecha_ingreso',
            'fecha_solicitud',
            'tramite_administrativo',
            'id_cproceso_arca',
            'id_cproceso_senagua',
            // 'rol_en_calidad',
            // 'numero_tramites',
            // 'id_cda',
            // 'id_usuario_enviado_por',
            // 'institucion_solicitante',
            // 'solicitante',
            // 'cod_centro_atencion_ciudadano',
            // 'id_demarcacion',

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
                    }, //Primera columna encontrada fecha_ingreso                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['cda/deletep','id' => $model->id_cda],true);
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
