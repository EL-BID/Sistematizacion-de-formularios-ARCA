<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\fdpregunta */

$this->title = 'Agregar Item al Listado';
$this->params['breadcrumbs'][] = ['label' => 'Fdpreguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fdpregunta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
