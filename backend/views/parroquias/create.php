<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Parroquias */

$this->title = 'Create Parroquias';
$this->params['breadcrumbs'][] = ['label' => 'Parroquias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parroquias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
