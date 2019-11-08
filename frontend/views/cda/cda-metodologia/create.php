<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaMetodologia */

$this->title = 'Nuevo Cda Metodologia';
$this->params['breadcrumbs'][] = ['label' => 'Cda Metodologias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-metodologia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
