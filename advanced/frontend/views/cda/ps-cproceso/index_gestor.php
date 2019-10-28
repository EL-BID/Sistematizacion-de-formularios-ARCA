<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\PsCprocesoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$_labelmiga = "Cda";
$_urlmiga = array('cda/cda/pantallaprincipal') ;
       
$this->title = 'Gestión de Actividades';
$this->params['breadcrumbs'][] = ['label' => $_labelmiga, 'url' => $_urlmiga];
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
         //   ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute'=>'num_solicitud',
                'label'=>'Número Solicitud'
            ],
            [
                'attribute'=>'num_tramite',
                'label'=>'Número Trámite'
            ],
            [
                'attribute'=>'cod_solicitud_tecnico',
                'label'=>'Cod. Solicitud Técnico'
            ],
            [
                'attribute'=>'nom_actividad',
                'label'=>'Nombre Actividad'
            ],
            [
                'attribute'=>'fecha',
                'label'=>'Fecha Adjudicada'
            ],
           

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => ' {proceso}',
                'buttons' => [
                    'proceso' => function($url, $model){
                   
                        if($model['tipo']=='Tramite'){
                            
                             return Html::button("<span class='glyphicon glyphicon-eye-open' />",
                                                ['class' => 'btn btn-default btn-xs',
                                                    'onclick' => "window.location.href = '".\Yii::$app->urlManager->createUrl(['cda/cdatramite/subproceso', 'id_cda_tramite' => $model['idinicial'], 'labelmiga' => 'cda/ps-cproceso/gestor'])."';",
                                                    'title' => 'Ver Proceso',
                                                ]
                                            );
                            
                        }else{
                            
                             return Html::button("<span class='glyphicon glyphicon-eye-open' />",
                                                ['class' => 'btn btn-default btn-xs',
                                                    'onclick' => "window.location.href = '".\Yii::$app->urlManager->createUrl(['cda/cdasolicitud/subproceso', 'id_cda_solicitud' => $model['idinicial'], 'labelmiga' => 'cda/ps-cproceso/gestor'])."';",
                                                    'title' => 'Ver Proceso',
                                                ]
                                            );
                        }
                        
                        
                    }        
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
    </div>    
</div>
