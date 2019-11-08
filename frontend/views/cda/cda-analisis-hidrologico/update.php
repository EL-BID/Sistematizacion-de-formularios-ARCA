<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaAnalisisHidrologico */

$this->title = 'Actualizar Cda Analisis Hidrologico: ' . $model->id_analisis_hidrologico;
$this->params['breadcrumbs'][] = ['label' => 'Cda Analisis Hidrologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_analisis_hidrologico, 'url' => ['view', 'id' => $model->id_analisis_hidrologico]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-analisis-hidrologico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
