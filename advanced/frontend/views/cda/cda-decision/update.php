<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaReporteInformacion */

$this->title = 'Actualizar Cda Reporte Informacion: ' . $model->id_reporte_informacion;
$this->params['breadcrumbs'][] = ['label' => 'Cda Reporte Informacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_reporte_informacion, 'url' => ['view', 'id' => $model->id_reporte_informacion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-reporte-informacion-update">

   <?php
            if(empty($_ajax)){
        ?>
             <h1><?= Html::encode($this->title) ?></h1>
        <?php
            }
        ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
