<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\fdrespuesta */

$this->title = 'Create Fdrespuesta';
$this->params['breadcrumbs'][] = ['label' => 'Fdrespuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fdrespuesta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
