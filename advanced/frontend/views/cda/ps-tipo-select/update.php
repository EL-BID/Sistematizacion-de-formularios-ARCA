<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsTipoSelect */

$this->title = 'Actualizar Ps Tipo Select: ' . $model->id_tselect;
$this->params['breadcrumbs'][] = ['label' => 'Ps Tipo Selects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tselect, 'url' => ['view', 'id' => $model->id_tselect]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-tipo-select-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
