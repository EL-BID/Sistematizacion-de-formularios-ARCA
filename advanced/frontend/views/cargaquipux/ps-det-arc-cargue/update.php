<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsDetArcCargue */

$this->title = 'Actualizar Ps Det Arc Cargue: ' . $model->id_det_arc_cargue;
$this->params['breadcrumbs'][] = ['label' => 'Ps Det Arc Cargues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_det_arc_cargue, 'url' => ['view', 'id' => $model->id_det_arc_cargue]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-det-arc-cargue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
