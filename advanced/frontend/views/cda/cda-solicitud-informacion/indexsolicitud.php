<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;


$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => [$labelmiga, 'id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' => $labelmiga]];
$this->params['breadcrumbs'][] = ['label' => 'Solicitud', 'url' => ['cda/cdasolicitud/subproceso', 'id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' => $labelmiga]];

//$_urlregresar = \Yii::$app->urlManager->createUrl(['cda/cdasolicitud/subproceso', 'id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' => $labelmiga]);
$_urlregresar = \Yii::$app->urlManager->createUrl(['cda/cdasolicitud/pantallaprincipal']);
$_urlcreate = \Yii::$app->urlManager->createUrl(['cda/cda-solicitud-informacion/createsolicitud', 'id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' => $labelmiga,'id_cproceso'=>$id_cproceso,'actividadactual'=>$actividadactual]);


$this->title = 'Datos Salida de la Solicitud';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-tramite-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
  
    <div class="aplicativo table-responsive">
        
        
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
        
        
        <!-----------------------INICIANDO EL ENCABEZADO ------------------------------------------->
          <table class="table table-bordered">
            <!----------------------------INICIA CABEZOTE DATOS BASICOS --------------------------------->
            <tr>
                <td class="datosbasicos1"> N&uacute;mero Solicitud: </td>
                <td class="datosbasicos2"><?= $encabezado['numero']; ?> </td>
                <td class="datosbasicos1"> Fecha Ingreso </td>
                <td class="datosbasicos2"><?= $encabezado['fecha_ingreso']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> C&oacute;digo ARCA / SENAGUA </td>
                <td class="datosbasicos2"><?= $encabezado['qpxarca'].' / '.$encabezado['qpxsenagua']; ?></td>
                <td class="datosbasicos1"> Estado </td>
                <td class="datosbasicos2"><?= $encabezado['nom_eproceso']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Enviado Por </td>
                <td class="datosbasicos2"><?= $encabezado['enviado_por']; ?></td>
                <td class="datosbasicos1"> Rol </td>
                <td class="datosbasicos2"><?= $encabezado['nom_cda_rol']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2"><?= $encabezado['nombres']; ?></td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2"><?= $encabezado['fecha_solicitud']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha &Uacute;ltima Actividad </td>
                <td class="datosbasicos2"><?= $encabezado['ult_fecha_actividad']; ?></td>
                <td class="datosbasicos1"> Fecha &Uacute;ltimo Estado </td>
                <td class="datosbasicos2"><?= $encabezado['ult_fecha_estado']; ?></td>
            </tr>
        </table>
        <!-------------------FIN ENCABEZADO -------------------------------------------->
        
        <p>
            <?php 
                echo Html::button('Registrar Salida', 
                    ['value' =>$_urlcreate, 'title' => 'Registrar Salida',
                    'class' => 'showModalButton btn btn-success']); 

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
                             'update' => function ($url, $model) use ($labelmiga,$id_cda_solicitud,$actividadactual,$id_cproceso,$id_cactividad_proceso) {
                                       $url2 = Url::toRoute(['cda/cda-solicitud-informacion/updatesolicitud','id' => $model->id_solicitud_info,
                                                             'id_cda_solicitud'=>$id_cda_solicitud,
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
