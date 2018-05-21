<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Demarcaciones */

$this->title = 'Update Demarcaciones: ' . $model->id_demarcacion;
$this->params['breadcrumbs'][] = ['label' => 'Demarcaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_demarcacion, 'url' => ['view', 'id' => $model->id_demarcacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="demarcaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
