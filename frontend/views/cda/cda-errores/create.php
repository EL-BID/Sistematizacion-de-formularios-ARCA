<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaErrores */

$this->title = 'Nuevo Cda Errores';
$this->params['breadcrumbs'][] = ['label' => 'Cda Errores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-errores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
