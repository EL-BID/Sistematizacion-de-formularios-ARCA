<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\TarTareaProgramada */

$this->title = 'Modificar Tarea Programada: ' . $model->id_tarea_programada;
$this->params['breadcrumbs'][] = ['label' => 'Tar Tarea Programadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tarea_programada, 'url' => ['view', 'id' => $model->id_tarea_programada]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tar-tarea-programada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
