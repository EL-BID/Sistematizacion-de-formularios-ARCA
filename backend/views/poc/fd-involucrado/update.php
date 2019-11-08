<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdInvolucrado */

$this->title = 'Update Fd Involucrado: ' . $model->id_involucrado;
$this->params['breadcrumbs'][] = ['label' => 'Fd Involucrados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_involucrado, 'url' => ['view', 'id' => $model->id_involucrado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-involucrado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
