<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesmultiple */

$this->title = 'Update Clientesmultiple: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clientesmultiples', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clientesmultiple-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
