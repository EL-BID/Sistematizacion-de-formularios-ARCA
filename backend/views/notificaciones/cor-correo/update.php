<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorCorreo */

$this->title = 'Actualizar Correo: ' . $model->id_correo;
$this->params['breadcrumbs'][] = ['label' => 'Correo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_correo, 'url' => ['view', 'id' => $model->id_correo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cor-correo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
