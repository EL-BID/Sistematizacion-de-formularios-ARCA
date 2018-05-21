<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaEstacionMeteorologica */

$this->title = 'Actualizar Cda Estacion Meteorologica: ' . $model->id_emeteorologica;
$this->params['breadcrumbs'][] = ['label' => 'Cda Estacion Meteorologicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_emeteorologica, 'url' => ['view', 'id' => $model->id_emeteorologica]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-estacion-meteorologica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
