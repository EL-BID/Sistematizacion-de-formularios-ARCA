<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsCproceso */

$this->title = 'Datos Básicos';
$this->params['breadcrumbs'][] = ['label' => 'Detalle PQRS', 'url' => ['pqrs/detallepqrs/index','numero'=>$numero,'id_pqr'=>$pqr]];
$this->params['breadcrumbs'][] = ['label' => 'Datos Básicos', 'url' => ['pqrs/detallepqrs/datosbasicos','id_pqr'=>$pqr]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="ps-cproceso-update">

    <div class="headSection">
        <?php
            if(empty($_ajax)){
        ?>
             <h1 class="titSection"><?= Html::encode($this->title) ?></h1>
        <?php
            }
        ?>
   
        <h1 class="titSection">Tipo de PQRS: <?= $tipopqr; ?> </h1>
        <?php echo Html::button("Regresar",
                ['class'=>'btn btn-default btn-xs',
                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['pqrs/detallepqrs/index','numero'=>$numero,'id_pqr'=>$pqr]) . "';",
                    'data-toggle'=>'Regresar'
                ]
            ); ?>

    </div>       
    <div class="aplicativo table-responsive">    
    <?= $this->render('_formdatosbasicos', [
        'model' => $model,'tipo_pqr'=>$tipo_pqr,'fecha_recepcion'=>$fecha_recepcion,'disabled_responsable'=>$disabled_responsable
    ]) ?>
    </div>
    
</div>

