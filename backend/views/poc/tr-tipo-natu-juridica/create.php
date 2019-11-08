<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoNatuJuridica */

$this->title = 'Create Tr Tipo Natu Juridica';
$this->params['breadcrumbs'][] = ['label' => 'Tr Tipo Natu Juridicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-tipo-natu-juridica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
