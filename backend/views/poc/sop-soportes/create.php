<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\SopSoportes */

$this->title = 'Create Sop Soportes';
$this->params['breadcrumbs'][] = ['label' => 'Sop Soportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sop-soportes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
