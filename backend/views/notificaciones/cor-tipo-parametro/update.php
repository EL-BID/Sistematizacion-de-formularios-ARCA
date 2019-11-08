<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorTipoParametro */

$this->title = 'Update Cor Tipo Parametro: ' . $model->id_tparametro;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Parametro', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tparametro, 'url' => ['view', 'id' => $model->id_tparametro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cor-tipo-parametro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
