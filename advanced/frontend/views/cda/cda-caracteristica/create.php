<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaCaracteristica */

$this->title = 'Nuevo Cda Caracteristica';
$this->params['breadcrumbs'][] = ['label' => 'Cda Caracteristicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-caracteristica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
