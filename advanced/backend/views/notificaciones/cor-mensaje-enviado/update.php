<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorMensajeEnviado */

$this->title = 'Actualizar Mensaje Enviado: ' . $model->id_mensaje_enviado;
$this->params['breadcrumbs'][] = ['label' => 'Mensajes Enviados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_mensaje_enviado, 'url' => ['view', 'id' => $model->id_mensaje_enviado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cor-mensaje-enviado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
