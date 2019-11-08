<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdAdmEstado */

$this->title = 'Create Fd Adm Estado';
$this->params['breadcrumbs'][] = ['label' => 'Fd Adm Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-adm-estado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
