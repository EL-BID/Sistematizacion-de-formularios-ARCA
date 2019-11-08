<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoPeriodo */

$this->title = 'Update Tr Tipo Periodo: ' . $model->id_tperiodo;
$this->params['breadcrumbs'][] = ['label' => 'Tr Tipo Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tperiodo, 'url' => ['view', 'id' => $model->id_tperiodo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-tipo-periodo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
