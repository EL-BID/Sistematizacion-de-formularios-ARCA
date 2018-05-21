<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\TarTipoTarea */

$this->title = 'Actualizar Tipo Tarea: ' . $model->id_ttarea;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Tareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ttarea, 'url' => ['view', 'id' => $model->id_ttarea]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tar-tipo-tarea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
