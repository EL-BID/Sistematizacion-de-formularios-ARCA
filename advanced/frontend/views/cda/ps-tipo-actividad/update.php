<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsTipoActividad */

$this->title = 'Actualizar Ps Tipo Actividad: ' . $model->id_tactividad;
$this->params['breadcrumbs'][] = ['label' => 'Ps Tipo Actividads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tactividad, 'url' => ['view', 'id' => $model->id_tactividad]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-tipo-actividad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
