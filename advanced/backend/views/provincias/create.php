<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Provincias */

$this->title = 'Create Provincias';
$this->params['breadcrumbs'][] = ['label' => 'Provincias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provincias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
