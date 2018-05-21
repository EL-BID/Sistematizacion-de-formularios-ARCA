<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrComando */

$this->title = 'Update Tr Comando: ' . $model->id_comando;
$this->params['breadcrumbs'][] = ['label' => 'Tr Comandos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comando, 'url' => ['view', 'id' => $model->id_comando]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-comando-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
