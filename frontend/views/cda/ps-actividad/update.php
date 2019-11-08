<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsActividad */

$this->title = 'Actualizar Ps Actividad: ' . $model->id_actividad;
$this->params['breadcrumbs'][] = ['label' => 'Ps Actividads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_actividad, 'url' => ['view', 'id' => $model->id_actividad]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-actividad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
