<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesprueba */

$this->title = 'Update Clientesprueba: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clientespruebas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clientesprueba-update">

    <div class="headSection">
    <h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
