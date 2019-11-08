<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaTramiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if($disable_edit == TRUE){
    $update_edit='display:none';
}else{
    $update_edit='display:block';
}


$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => [$labelmiga, 'id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' => $labelmiga]];
$this->params['breadcrumbs'][] = ['label' => 'Solicitud', 'url' => ['cda/cdasolicitud/subproceso', 'id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' => $labelmiga]];

//$_urlregresar = \Yii::$app->urlManager->createUrl(['cda/cdasolicitud/subproceso', 'id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' => $labelmiga]);
$_urlregresar = \Yii::$app->urlManager->createUrl(['cda/cdasolicitud/pantallaprincipal']);
$_urlcreate = \Yii::$app->urlManager->createUrl(['cda/cdatramite/create', 'id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' => $labelmiga,'id_cproceso'=>$id_cproceso,'actividadactual'=>$actividadactual]);


$this->title = 'Trámites de la Solicitud';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-tramite-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
  
    <div class="aplicativo table-responsive">
        
        
        <p>
            <?php
            
            echo Html::button("Regresar",
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
                 if($disable_button == FALSE){
                echo Html::button('Crear Trámite', 
                    ['value' =>$_urlcreate, 'title' => 'Crear Trámite',
                    'class' => 'showModalButton btn btn-success']); 
            }
            
            ?>
        </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    'num_tramite',
                    'cod_solicitud_tecnico',
                    
                    [
                        'header' => 'Responsables',
                        'attribute' => 'responsable',
                        'value'=>'idUsuario.nombres', //relation name with their attribute
                    ],
                    [
                        'header' => 'Actividad',
                        'attribute' => 'actividad',
                        'value'=>'idActividad.nom_actividad', //relation name with their attribute
                    ],
                    [
                        'header' => 'Fecha Actividad',
                        'attribute' => 'ult_fecha_actividad',
                        'value'=>'idCproceso.ult_fecha_actividad', //relation name with their attribute
                    ],
                    [
                        'header' => 'Observación',
                        'attribute' => 'observacion',
                        //'value'=>'idCproceso.ult_fecha_actividad', //relation name with their attribute
                    ],
                    
                    [

                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Acción',
                        'template' => '{update} ',
                        'buttons' => [
//                            'view' => function ($url, $model) {
//                            return Html::button("<span class='glyphicon glyphicon-eye-open' />",
//                                                ['class' => 'btn btn-default btn-xs',
//                                                    'onclick' => "window.location.href = '".\Yii::$app->urlManager->createUrl(['cda/cdatramite/subproceso', 'id_cda_tramite' => $model['id_cda_tramite'], 'labelmiga' => 'cda/cdatramite/index'])."';",
//                                                    'data-toggle' => 'Detalle Proceso',
//                                                ]
//                                            );
//                            },
                            'update' => function ($url, $model) use ($update_edit,$id_cda_solicitud,$labelmiga,$id_cproceso,$actividadactual) {
                                
                                if($model['idActividad']['id_actividad'] != '200'){
                                    $update_edit = 'display:none';
                                }else if($model['idActividad']['id_actividad'] == '200' and Yii::$app->user->identity->codRols[0]->cod_rol == '25'){
                                    $update_edit = 'display:block';
                                }
                                
                                
                                $_ulrsend = yii\helpers\Url::toRoute(['cda/cdatramite/update', 
                                                                      'id' => $model['id_cda_tramite'],
                                                                      'labelmiga' => 'cda/cdatramite/index',
                                                                    'id_cda_solicitud' => $id_cda_solicitud, 
                                                                    'labelmiga' => $labelmiga,
                                                                    'id_cproceso'=>$id_cproceso,
                                                                    'actividadactual'=>$actividadactual
                                                                      ]);
                                
                                return yii\helpers\Html::button('<span class="glyphicon glyphicon-pencil" />',
                                    ['value' => $_ulrsend,
                                     'class' => 'btn btn-default btn-xs showModalButton', 'title' => 'Editar Trámite','style' => $update_edit
                                    ]);
                            }
                    ],


                ],
                ],
            ]); ?>
    </div>
</div>
