<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdOpcionSelect */

$this->title = 'Create Fd Opcion Select';
$this->params['breadcrumbs'][] = ['label' => 'Fd Opcion Selects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-opcion-select-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
