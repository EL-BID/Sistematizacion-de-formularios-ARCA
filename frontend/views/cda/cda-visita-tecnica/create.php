<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaReporteInformacion */

$this->title = 'Visita Tecnica';
$this->params['breadcrumbs'][] = ['label' => 'Cda Reporte Informacions', 'url' => ['index']];
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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
