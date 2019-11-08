<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdResulEvaluaciones */

$this->title = 'Update Fd Resul Evaluaciones: ' . $model->id_resul_evaluaciones;
$this->params['breadcrumbs'][] = ['label' => 'Fd Resul Evaluaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_resul_evaluaciones, 'url' => ['view', 'id' => $model->id_resul_evaluaciones]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-resul-evaluaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
