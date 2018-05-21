<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\PsCprocesoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestion de Actividades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-cproceso-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?php /*Html::button('Create Ps Cproceso', 
        ['value' =>Url::to(['pscproceso/create']), 'title' => 'Create Ps Cproceso',
        'class' => 'showModalButton btn btn-success']);*/ ?>
    </p>-->
    
    <div class="aplicativo table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute'=>'numero',
                'label'=>'Numero CDA'
            ],
            [
                'attribute'=>'ult_id_actividad',
                'value'=>'ultIdActividad.nom_actividad',
                'label' => 'Actividad Pendiente',
             ],
//            'id_cproceso',
//            'ult_id_eproceso',
//            'id_proceso',
//            'id_usuario',
//            'id_modulo',
            // 'num_quipux',
            // 'fecha_registro_quipux',
            // 'asunto_quipux',
            // 'tipo_documento_quipux',
            // 'ult_id_actividad',
            // 'ult_id_usuario',
            // 'ult_fecha_actividad',
            // 'ult_fecha_estado',
            // 'numero',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => ' {subpantalla} {proceso}',
                'buttons' => [
                    'subpantalla' => function($url, $model){
                            
                                   $_url2 =  $model->ultIdActividad['subpantalla'];
                                   $_idcda = $model->cdas[0]['id_cda'];
                                   $_id_cactividad_proceso = $model->obtenerultidcactividaproceso['id_cactividad_proceso'];
                                   
                                   if($model->ultIdActividad['subpantalla'] == 'cda/cda/updateproceso'){
                                       
                                       $link =  \Yii::$app->urlManager->createUrl([$_url2,'id_cda' => $_idcda, 'id_cproceso' =>$model['id_cproceso'],'tipo'=>1,'ult_id_actividad'=>$model['ult_id_actividad'] ]);
                                       
                                   }else if($model->ultIdActividad['subpantalla'] == 'cda/cda/analisis'){
                                       
                                       $link =  \Yii::$app->urlManager->createUrl([$_url2,'id_cda' => $_idcda, 'id_cproceso' =>$model['id_cproceso'] ]);
                                       
                                   }else if($model->ultIdActividad['subpantalla'] == 'cda/cda/registrardatos'){
                                       
                                       $link =  \Yii::$app->urlManager->createUrl([$_url2,'id_cda' => $_idcda, 'id_cproceso' =>$model['id_cproceso'] ]);
                                       
                                   }else if($model->ultIdActividad['subpantalla'] == 'cda/cdasolicitudinformacion/index&tipo=1'){
                                       
                                       $link =  \Yii::$app->urlManager->createUrl(['cda/cdasolicitudinformacion/index','id_cda' => $_idcda, 'id_cactividad_proceso' =>$_id_cactividad_proceso,'tipo' => '1' ]);
                                       
                                   }else if($model->ultIdActividad['subpantalla'] == 'cda/cdasolicitudinformacion/index&tipo=2'){
                                       
                                        $link =  \Yii::$app->urlManager->createUrl(['cda/cdasolicitudinformacion/index','id_cda' => $_idcda, 'id_cactividad_proceso' =>$_id_cactividad_proceso,'tipo' => '2' ]);
                                   } 
        
                                  
                                   return Html::button("<span> Subpantalla</span>",
                                               ['class'=>'btn btn-default btn-xs',
                                                   'onclick'=>"window.location.href = '" .$link . "';",
                                                   'data-toggle'=>'Detalle Proceso',
                                               ]
                                           );

                    },
                            
                    'proceso' => function($url, $model){
                        
                        $_idcda = $model->cdas[0]['id_cda'];
                        return Html::button("<span> Proceso </span>",
                                               ['class'=>'btn btn-default btn-xs',
                                                   'onclick'=>"window.location.href = '" .\Yii::$app->urlManager->createUrl(['cda/detalleproceso/index','id_cda' => $_idcda]) . "';",
                                                   'data-toggle'=>'Detalle Proceso',
                                               ]
                                           );
                        
                    }        
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
    </div>    
</div>
