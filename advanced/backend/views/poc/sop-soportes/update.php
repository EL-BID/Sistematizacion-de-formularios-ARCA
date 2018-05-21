<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\SopSoportes */

$this->title = 'Update Sop Soportes: ' . $model->id_soportes;
$this->params['breadcrumbs'][] = ['label' => 'Sop Soportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_soportes, 'url' => ['view', 'id' => $model->id_soportes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sop-soportes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
