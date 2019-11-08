<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\TrComando */

$this->title = 'Create Tr Comando';
$this->params['breadcrumbs'][] = ['label' => 'Tr Comandos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-comando-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
