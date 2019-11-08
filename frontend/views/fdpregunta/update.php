<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\fdpregunta */

$this->title = 'Update Fdpregunta: ' . $model->id_pregunta;
$this->params['breadcrumbs'][] = ['label' => 'Fdpreguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pregunta, 'url' => ['view', 'id' => $model->id_pregunta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fdpregunta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
