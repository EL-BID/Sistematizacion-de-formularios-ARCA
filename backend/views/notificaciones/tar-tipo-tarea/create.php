<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\TarTipoTarea */

$this->title = 'Nuevo Tipo Tarea';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Tarea', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tar-tipo-tarea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
