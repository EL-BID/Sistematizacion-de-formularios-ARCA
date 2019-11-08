<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadesp */

$this->title = 'Create Ciudadesp';
$this->params['breadcrumbs'][] = ['label' => 'Ciudadesps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudadesp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
