<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdParamEvaluaciones */

$this->title = 'Update Fd Param Evaluaciones: ' . $model->id_evaluacion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Param Evaluaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_evaluacion, 'url' => ['view', 'id' => $model->id_evaluacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-param-evaluaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
