<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\Cda */

$this->title = 'Actualizar Cda: ' . $model->id_cda;
$this->params['breadcrumbs'][] = ['label' => 'Cdas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cda, 'url' => ['view', 'id' => $model->id_cda]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
