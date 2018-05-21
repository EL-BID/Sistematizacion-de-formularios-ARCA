<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdFormato */

$this->title = 'Update Fd Formato: ' . $model->id_formato;
$this->params['breadcrumbs'][] = ['label' => 'Fd Formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_formato, 'url' => ['view', 'id' => $model->id_formato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-formato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
