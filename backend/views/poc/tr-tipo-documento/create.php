<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoDocumento */

$this->title = 'Create Tr Tipo Documento';
$this->params['breadcrumbs'][] = ['label' => 'Tr Tipo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-tipo-documento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
