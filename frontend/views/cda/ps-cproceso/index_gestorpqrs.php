<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\PsCprocesoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestion de Actividades';
$this->params['breadcrumbs'][] = ['label' => 'PQRS', 'url' => array('pqrs/pqrs/index')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-cproceso-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>

     <!----------------------------------Boton de Regresar---------------------------->
        <?php echo Html::button("Regresar",
                ['class'=>'btn btn-default btn-xs',
                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['pqrs/pqrs/index']) . "';",
                    'data-toggle'=>'Regresar'
                ]
            ); ?>

    
    <div class="aplicativo table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            
            'numero',
            'nom_actividad',
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
                            
                                   $_id_cactividad_proceso = $model['id_cactividad_proceso'];
                                   $id_pqrs = $model['id_pqrs'];
                                   $numero = $model['numero'];
                                   
//                                   $link='index.php';
                                   
                                    return yii\helpers\Html::button("EDITAR ACTIVIDAD", 
                                    ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/updatepqrs",'id_cactividad_proceso'=>$_id_cactividad_proceso,'id_pqrs'=>$id_pqrs,'numero'=>$numero,'_labelmiga'=>'pqrs/pqrs/index','registro'=>'1'],true),
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>'Editar Actividad'
                                    ]);

                    },
                            
                    'proceso' => function($url, $model){
                        
                        $id_pqrs = $model['id_pqrs'];
                       $numero = $model['numero'];
                        return Html::button("<span> Proceso </span>",
                                               ['class'=>'btn btn-default btn-xs',
                                                   'onclick'=>"window.location.href = '" .\Yii::$app->urlManager->createUrl(['pqrs/detallepqrs/index','numero'=>$numero,'id_pqr' => $id_pqrs]) . "';",
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
