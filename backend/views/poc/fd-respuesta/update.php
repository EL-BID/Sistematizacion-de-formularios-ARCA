<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuesta */

$this->title = 'Update Fd Respuesta: ' . $model->id_respuesta;
$this->params['breadcrumbs'][] = ['label' => 'Fd Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_respuesta, 'url' => ['view', 'id' => $model->id_respuesta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-respuesta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
