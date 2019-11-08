<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\pqrs\Pqrs */

$this->title = 'Update Pqrs: ' . $model->id_pqrs;
$this->params['breadcrumbs'][] = ['label' => 'Pqrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pqrs, 'url' => ['view', 'id' => $model->id_pqrs]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pqrs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
