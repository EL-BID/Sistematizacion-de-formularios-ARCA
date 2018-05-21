<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\fdrespuesta */

$this->title = 'Update Fdrespuesta: ' . $model->id_respuesta;
$this->params['breadcrumbs'][] = ['label' => 'Fdrespuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_respuesta, 'url' => ['view', 'id' => $model->id_respuesta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fdrespuesta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
