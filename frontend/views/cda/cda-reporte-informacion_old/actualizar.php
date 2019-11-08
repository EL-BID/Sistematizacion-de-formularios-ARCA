<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaReporteInformacion */

$this->title = 'Actualizar Registro Datos Solicitud';
$this->params['breadcrumbs'][] = ['label' => 'Actualizar Registro Datos Solicitud', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-reporte-informacion-create">

    <?php
        if(empty($_ajax)){
    ?>
         <h1><?= Html::encode($this->title) ?></h1>
    <?php
        }
    ?>
        
    <?= $this->render('form_reporte_solicitud', [
        'model' => $model,
        'modelCoordenada' => $modelCoordenada,'model2'=>$model2,'combobox'=>$combobox,'cantonesPost'=>$cantonesPost,'parroquiasPost'=>$parroquiasPost
    ]) ?>

</div>
