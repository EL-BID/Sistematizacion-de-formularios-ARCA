<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Regionentidades */

$this->title = 'Update Regionentidades: ' . $model->cod_region;
$this->params['breadcrumbs'][] = ['label' => 'Regionentidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_region, 'url' => ['view', 'cod_region' => $model->cod_region, 'id_entidad' => $model->id_entidad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regionentidades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
