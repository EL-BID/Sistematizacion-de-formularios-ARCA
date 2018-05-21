<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdAgrupacion */

$this->title = 'Update Fd Agrupacion: ' . $model->id_agrupacion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Agrupacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_agrupacion, 'url' => ['view', 'id' => $model->id_agrupacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-agrupacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
