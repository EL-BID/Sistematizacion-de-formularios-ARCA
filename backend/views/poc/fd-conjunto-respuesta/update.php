<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConjuntoRespuesta */

$this->title = 'Update Fd Conjunto Respuesta: ' . $model->id_conjunto_respuesta;
$this->params['breadcrumbs'][] = ['label' => 'Fd Conjunto Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_conjunto_respuesta, 'url' => ['view', 'id' => $model->id_conjunto_respuesta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-conjunto-respuesta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
