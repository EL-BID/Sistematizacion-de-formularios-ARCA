<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoPeriodo */

$this->title = 'Create Tr Tipo Periodo';
$this->params['breadcrumbs'][] = ['label' => 'Tr Tipo Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-tipo-periodo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
