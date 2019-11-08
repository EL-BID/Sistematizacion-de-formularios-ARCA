<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsResponsablesProceso */

$this->title = 'Actualizar Ps Responsables Proceso: ' . $model->id_responsable_proceso;
$this->params['breadcrumbs'][] = ['label' => 'Ps Responsables Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_responsable_proceso, 'url' => ['view', 'id' => $model->id_responsable_proceso]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-responsables-proceso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
