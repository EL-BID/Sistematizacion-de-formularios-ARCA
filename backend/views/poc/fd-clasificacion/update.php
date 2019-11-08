<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdClasificacion */

$this->title = 'Update Fd Clasificacion: ' . $model->id_clasificacion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Clasificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_clasificacion, 'url' => ['view', 'id' => $model->id_clasificacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-clasificacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
