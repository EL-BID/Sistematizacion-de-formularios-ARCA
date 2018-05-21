<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\TarTareaProgramada */

$this->title = 'Crear Tarea Programada';
$this->params['breadcrumbs'][] = ['label' => 'Tareas Programadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tar-tarea-programada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
