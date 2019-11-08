<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdFormato */

$this->title = 'Create Fd Formato';
$this->params['breadcrumbs'][] = ['label' => 'Fd Formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-formato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
