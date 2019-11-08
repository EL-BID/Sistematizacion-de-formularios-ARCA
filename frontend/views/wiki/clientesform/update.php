<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesform */

$this->title = 'Update Clientesform: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clientesforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clientesform-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
