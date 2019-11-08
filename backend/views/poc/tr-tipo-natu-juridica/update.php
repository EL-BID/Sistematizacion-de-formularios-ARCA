<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoNatuJuridica */

$this->title = 'Update Tr Tipo Natu Juridica: ' . $model->id_natu_juridica;
$this->params['breadcrumbs'][] = ['label' => 'Tr Tipo Natu Juridicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_natu_juridica, 'url' => ['view', 'id' => $model->id_natu_juridica]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-tipo-natu-juridica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
