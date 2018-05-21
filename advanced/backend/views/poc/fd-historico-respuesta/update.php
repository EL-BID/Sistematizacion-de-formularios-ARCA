<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdHistoricoRespuesta */

$this->title = 'Update Fd Historico Respuesta: ' . $model->id_historico_respuesta;
$this->params['breadcrumbs'][] = ['label' => 'Fd Historico Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_historico_respuesta, 'url' => ['view', 'id' => $model->id_historico_respuesta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-historico-respuesta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
