<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdModulo */

$this->title = 'Update Fd Modulo: ' . $model->id_modulo;
$this->params['breadcrumbs'][] = ['label' => 'Fd Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_modulo, 'url' => ['view', 'id' => $model->id_modulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-modulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
