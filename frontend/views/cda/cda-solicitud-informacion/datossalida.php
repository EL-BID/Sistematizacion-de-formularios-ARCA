<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\CdaSolicitudInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => [$labelmiga, 'id_cda_tramite' => $id_cda_tramite, 'labelmiga' => $labelmiga]];
$this->params['breadcrumbs'][] = ['label' => 'Solicitud', 'url' => ['cda/cdatramite/subproceso', 'id_cda_tramite' => $id_cda_tramite, 'labelmiga' => $labelmiga]];


$_urlregresar = \Yii::$app->urlManager->createUrl(['cda/cdatramite/subproceso', 'id_cda_tramite' => $id_cda_tramite, 'labelmiga' => $labelmiga]);
$_urlcreate = \Yii::$app->urlManager->createUrl(['cda/cdatramite/create', 'id_cda_tramite' => $id_cda_tramite, 'labelmiga' => $labelmiga,'id_cproceso'=>$id_cproceso,'actividadactual'=>$actividadactual]);
$this->title = 'Datos de Salida';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-solicitud-informacion-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="aplicativo table-responsive">
        
            <!----------------------------------Boton de Regresar---------------------------->
           <p>
            <?php
            
            echo Html::button("Continuar",
                                ['class'=>'btn btn-default btn-xs',
                                    'onclick'=>"window.location.href = '".$_urlregresar. "';",
                                    'data-toggle'=>'Regresar'
                                ]
                            );
      
            echo "&nbsp;";
            
           
            
            ?>
            </p>
            <!----------------------------Encabezado de CDA---------------------------------->
           <!----------------------------------Encabezado------------------------------------>
            <?= $encabezado; ?>
            
           <p>
            <?php
              Yii::trace("cual es actividad actual "+$actividadactual,"DEBUG");
      
                if($enableCreate == TRUE or $actividadactual=='205'){
                    echo Html::button('Registrar Datos Salida',
                    ['value' => Url::to(['cda/cda-solicitud-informacion/createdatossalida',
                        'labelmiga' => $labelmiga,
                        'id_cda_tramite' => $id_cda_tramite,
                        'id_cproceso' => $id_cproceso,
                        'actividadactual' => $actividadactual,
                        'tipo' => '2', 'id_cactividad_proceso' => $id_cactividad_proceso]), 'title' => 'Registrar Datos de Salida',
                     'class' => 'showModalButton btn btn-success', ]);
                }
            ?>
           </p>
           
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
               //     ['class' => 'yii\grid\SerialColumn'],
                    [
                    'attribute' => 'id_cod_cda',
                    'value' => 'id_cod_cda',
                    'label'=>'Cod. CDA'
                    ],
                    [
                    'header' => 'Fecha de Atención',
                    'attribute' => 'fecha_atencion',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Fecha Elaboración Quipux',
                    'attribute' => 'fecha_elaboracion_quipux',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Oficio Atención',
                    'attribute' => 'oficio_atencion',
                    //'format' => ['decimal', 2],
                    ],
                    
                    [
                    'header' => 'Forma de atención',
                    'attribute' => 'forma_atencion_cda',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Estado',
                    'attribute' => 'estado',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Causa Anulación',
                    'attribute' => 'causa_anulacion',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Causa Corrección',
                    'attribute' => 'causa_correccion',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Fecha de Salida',
                    'attribute' => 'fecha_salida',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Observaciones',
                    'attribute' => 'observaciones',
                    //'format' => ['decimal', 2],
                    ],
                    
                    
                    // 'observaciones',
                    // 'oficio_atencion',
                    // 'fecha_atencion',
                    // 'id_cda',
                    // 'id_trespuesta',
                    // 'observaciones_res',
                    // 'oficio_respuesta',
                    // 'fecha_respuesta',
                    // 'id_cactividad_proceso_res',

                    [

                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Acción',
                        'template' => '  {update}',
                       // 'template' => ' {view} {update} {delete}',
                        'buttons' => [
                           /* 'view' => function($url, $model){
                                    return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                            'title' => Yii::t('app', 'View'),
                                            'data-method' => 'post',
                                    ]);
                            },*/
                             'update' => function ($url, $model) use ($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$id_cactividad_proceso) {
                                       $url2 = Url::toRoute(['cda/cda-solicitud-informacion/updatedatosalida','id' => $model->id_solicitud_info,
                                                             'id_cda_tramite'=>$id_cda_tramite,
                                                             'id_cproceso'=>$id_cproceso,
                                                              'actividadactual'=>$actividadactual,
                                                              'labelmiga'=>$labelmiga,'tipo'=>'2','id_cactividad_proceso'=>$id_cactividad_proceso],true);
                                      
                                       return Html::button('<span class="glyphicon glyphicon-pencil"/>',  ['value'=>$url2,
                                                     'class' => 'btn btn-default btn-xs showModalButton','title'=>'Modificar Datos de Salida'
                                        ]);
                                }, 


                    ],


                ],
                ],
            ]); ?>
    </div>
</div>
