<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPonderacionRespuesta */

$this->title = 'Update Fd Ponderacion Respuesta: ' . $model->id_ponderacion_resp;
$this->params['breadcrumbs'][] = ['label' => 'Fd Ponderacion Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ponderacion_resp, 'url' => ['view', 'id' => $model->id_ponderacion_resp]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-ponderacion-respuesta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
