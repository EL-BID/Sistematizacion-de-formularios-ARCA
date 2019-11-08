<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\Cda */

$this->title = 'Nuevo Cda';
$this->params['breadcrumbs'][] = ['label' => 'Cdas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
