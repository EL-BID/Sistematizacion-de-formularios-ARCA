<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPeriodoFormato */

$this->title = 'Update Fd Periodo Formato: ' . $model->id_formato;
$this->params['breadcrumbs'][] = ['label' => 'Fd Periodo Formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_formato, 'url' => ['view', 'id_formato' => $model->id_formato, 'id_periodo' => $model->id_periodo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-periodo-formato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
