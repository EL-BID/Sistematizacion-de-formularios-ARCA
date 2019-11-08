<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaErrores */

$this->title = 'Actualizar Cda Errores: ' . $model->id_error;
$this->params['breadcrumbs'][] = ['label' => 'Cda Errores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_error, 'url' => ['view', 'id' => $model->id_error]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-errores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
