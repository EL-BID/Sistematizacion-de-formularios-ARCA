<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsProceso */

$this->title = 'Actualizar Ps Proceso: ' . $model->id_proceso;
$this->params['breadcrumbs'][] = ['label' => 'Ps Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_proceso, 'url' => ['view', 'id' => $model->id_proceso]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-proceso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
