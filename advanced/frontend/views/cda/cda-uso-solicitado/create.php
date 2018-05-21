<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaUsoSolicitado */

$this->title = 'Nuevo Cda Uso Solicitado';
$this->params['breadcrumbs'][] = ['label' => 'Cda Uso Solicitados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-uso-solicitado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
