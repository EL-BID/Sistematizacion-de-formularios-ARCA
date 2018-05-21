<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsEstadoProceso */

$this->title = 'Actualizar Ps Estado Proceso: ' . $model->id_eproceso;
$this->params['breadcrumbs'][] = ['label' => 'Ps Estado Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_eproceso, 'url' => ['view', 'id' => $model->id_eproceso]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-estado-proceso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
