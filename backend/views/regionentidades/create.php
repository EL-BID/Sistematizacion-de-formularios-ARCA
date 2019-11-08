<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Regionentidades */

$this->title = 'Create Regionentidades';
$this->params['breadcrumbs'][] = ['label' => 'Regionentidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regionentidades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
