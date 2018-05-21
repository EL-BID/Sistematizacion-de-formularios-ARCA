<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrPeriodo */

$this->title = 'Update Tr Periodo: ' . $model->id_periodo;
$this->params['breadcrumbs'][] = ['label' => 'Tr Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_periodo, 'url' => ['view', 'id' => $model->id_periodo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-periodo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
