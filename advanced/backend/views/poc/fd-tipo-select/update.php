<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoSelect */

$this->title = 'Update Fd Tipo Select: ' . $model->id_tselect;
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo Selects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tselect, 'url' => ['view', 'id' => $model->id_tselect]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-tipo-select-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
