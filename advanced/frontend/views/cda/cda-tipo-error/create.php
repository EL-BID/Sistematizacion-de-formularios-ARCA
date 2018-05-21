<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTipoError */

$this->title = 'Nuevo Cda Tipo Error';
$this->params['breadcrumbs'][] = ['label' => 'Cda Tipo Errors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-tipo-error-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
