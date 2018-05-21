<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdInvolucrado */

$this->title = 'Create Fd Involucrado';
$this->params['breadcrumbs'][] = ['label' => 'Fd Involucrados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-involucrado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
