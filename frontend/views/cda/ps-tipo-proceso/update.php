<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsTipoProceso */

$this->title = 'Actualizar Ps Tipo Proceso: ' . $model->id_tproceso;
$this->params['breadcrumbs'][] = ['label' => 'Ps Tipo Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tproceso, 'url' => ['view', 'id' => $model->id_tproceso]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-tipo-proceso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
