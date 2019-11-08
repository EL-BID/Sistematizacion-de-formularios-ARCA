<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */

$this->title = 'Update Proyectos: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proyectos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'model2'=>$model2
    ]) ?>

</div>
