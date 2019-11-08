<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Anexos */

$this->title = 'Update Anexos: ' . $model->cod_anexo;
$this->params['breadcrumbs'][] = ['label' => 'Anexos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_anexo, 'url' => ['view', 'cod_anexo' => $model->cod_anexo, 'cod_ficha' => $model->cod_ficha]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anexos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
