<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuestaXMes */

$this->title = 'Update Fd Respuesta Xmes: ' . $model->id_respuesta_x_mes;
$this->params['breadcrumbs'][] = ['label' => 'Fd Respuesta Xmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_respuesta_x_mes, 'url' => ['view', 'id' => $model->id_respuesta_x_mes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-respuesta-xmes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
