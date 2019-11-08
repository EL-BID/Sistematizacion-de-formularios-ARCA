<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsActividadQuipux */

$this->title = 'Update Ps Actividad Quipux: ' . $model->id_actividad_quipux;
$this->params['breadcrumbs'][] = ['label' => 'Ps Actividad Quipuxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_actividad_quipux, 'url' => ['view', 'id' => $model->id_actividad_quipux]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ps-actividad-quipux-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
