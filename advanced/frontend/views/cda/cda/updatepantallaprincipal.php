<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\Cda */

$this->title = 'Datos Administrativos CDA ';
$this->params['breadcrumbs'][] = ['label' => 'Cdas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cda, 'url' => ['view', 'id' => $model->id_cda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cda-update">
    
    <?php
    if(empty($ajax)){
    ?>   
    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
    
        <div class="aplicativo table-responsive">
            <!----------------------------------Boton de Regresar---------------------------->
               <?php echo Html::button("Regresar",
                       ['class'=>'btn btn-default btn-xs',
                           'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/detalleproceso/index','id_cda'=>$id_cda]) . "';",
                           'data-toggle'=>'Regresar'
                       ]
                   ); 
    }?>
            
            <!----------------------------------Encabezado------------------------------------>
           <table class="table table-bordered">
                   <tr>
                       <td class="datosbasicos1"> Numero CDA </td>
                       <td class="datosbasicos2">
                           <table width="100%">
                               <tr>
                                   <td width="50%"><?= $encabezado[0]['numero']; ?></td>
                               </tr>
                           </table>
                       </td>
                       <td class="datosbasicos1"> Fecha Ingreso </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['fecha_ingreso'];  ?></td>
                   </tr>
                   <tr>
                       <td class="datosbasicos1"> Numero de Quipux Arca </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['arca']; ?></td>
                       <td class="datosbasicos1"> Enviado por: </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['enviadopor']; ?></td>
                   </tr>
                   <tr>
                       <td class="datosbasicos1"> Numero de Quipux Senagua </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['senagua']; ?></td>
                       <td class="datosbasicos1"> En calidad de: </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['encalidade']; ?></td>
                   </tr>

                   <tr>
                       <td class="datosbasicos1"> Responsable </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['usuario_accion']; ?></td>
                       <td class="datosbasicos1"> Fecha de Solicitud </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['fecha_solicitud']; ?></td>
                   </tr>
                   <tr>
                       <td class="datosbasicos1"> Fecha Ultima Actividad </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_actividad']; ?></td>
                       <td class="datosbasicos1"> Fecha Ultimo Estado </td>
                       <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_estado']; ?></td>
                   </tr>
           </table>        
    
    
            <?= $this->render('_formpantallaprincipal', [
             'model' => $model,'modelpscproceso'=>$modelpscproceso,'_editararca' => $_editararca, '_editarsenagua' => $_editarsenagua,'boleanbotton'=>$boleanbotton
            ]) ?>
        </div>

</div>
