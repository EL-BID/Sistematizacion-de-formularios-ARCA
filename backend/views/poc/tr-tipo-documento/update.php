<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoDocumento */

$this->title = 'Update Tr Tipo Documento: ' . $model->id_tdocumento;
$this->params['breadcrumbs'][] = ['label' => 'Tr Tipo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tdocumento, 'url' => ['view', 'id' => $model->id_tdocumento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-tipo-documento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
