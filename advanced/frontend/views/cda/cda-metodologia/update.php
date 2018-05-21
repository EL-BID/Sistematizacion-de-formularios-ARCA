<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaMetodologia */

$this->title = 'Actualizar Cda Metodologia: ' . $model->id_metodologia;
$this->params['breadcrumbs'][] = ['label' => 'Cda Metodologias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_metodologia, 'url' => ['view', 'id' => $model->id_metodologia]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-metodologia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
