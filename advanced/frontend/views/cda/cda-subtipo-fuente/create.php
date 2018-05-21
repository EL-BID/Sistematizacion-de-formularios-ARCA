<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaSubtipoFuente */

$this->title = 'Nuevo Cda Subtipo Fuente';
$this->params['breadcrumbs'][] = ['label' => 'Cda Subtipo Fuentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-subtipo-fuente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
