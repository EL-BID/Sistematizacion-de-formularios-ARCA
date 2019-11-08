<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaSolicitud */
?>
<div class="cda-solicitud-update">
    <?php
    $this->params['breadcrumbs'][] = 'Modificar';
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Solicitud', 'url' => [$labelmiga]];
    $_urlregresar = \Yii::$app->urlManager->createUrl([$labelmiga, 'id_cda_solicitud' => $model->id_cda_solicitud, 'labelmiga' => $labelmiga]);
    ?>

     <div class="aplicativo table-responsive">
            <!----------------------------------Boton de Regresar---------------------------->
            
               <?php // echo Html::button('Regresar',
//                       ['class' => 'btn btn-default btn-xs',
//                           'onclick' => "window.location.href = '".$_urlregresar."';",
//                           'data-toggle' => 'Regresar',
//                       ]
//                   );
               ?>
            
           
            
            <!----------------------------------Encabezado------------------------------------>
            <table class="table table-bordered">
                   <tr>
                       <td class="datosbasicos1"> Número CDA </td>
                       <td class="datosbasicos2">
                           <table width="100%">
                               <tr>
                                   <td width="50%"><?= $encabezado[0]['numero']; ?></td>
                               </tr>
                           </table>
                       </td>
                       <td class="datosbasicos1"> Fecha Ingreso </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['fecha_ingreso']; ?></td>
                   </tr>
                   <tr>
                       <td class="datosbasicos1"> Número de Quipux Arca </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['qpxarca']; ?></td>
                       <td class="datosbasicos1"> Enviado por: </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['enviado_por']; ?></td>
                   </tr>
                   <tr>
                       <td class="datosbasicos1"> Número de Quipux Senagua </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['qpxsenagua']; ?></td>
                       <td class="datosbasicos1"> Rol: </td>
                        <td class="datosbasicos2"><?= $encabezado[0]['nom_cda_rol']; ?></td>
                   </tr>

                   <tr>
                       <td class="datosbasicos1"> Responsable </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['nombres']; ?></td>
                       <td class="datosbasicos1"> Fecha de Solicitud </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['fecha_solicitud']; ?></td>
                   </tr>
                   <tr>
                       <td class="datosbasicos1"> Fecha Última Actividad </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_actividad']; ?></td>
                       <td class="datosbasicos1"> Fecha Último Estado </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_estado']; ?></td>
                   </tr>
           </table>        

    <?= $this->render('_form', [
        'model' => $model,'modelpscproceso'=>$modelpscproceso,'_editararca' => FALSE, '_editarsenagua' => FALSE,'modelpsactividad'=>$modelpsactividad,'stringClasificacion'=>$stringClasificacion,'listadodemarcacion'=>$listadodemarcacion,'listadocentro'=>$listadocentro
    ]) ?>

</div>
