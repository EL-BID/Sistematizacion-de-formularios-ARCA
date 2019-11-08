<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdOpcionSelect */

$this->title = 'Update Fd Opcion Select: ' . $model->id_opcion_select;
$this->params['breadcrumbs'][] = ['label' => 'Fd Opcion Selects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_opcion_select, 'url' => ['view', 'id' => $model->id_opcion_select]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-opcion-select-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
