<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoSelect */

$this->title = 'Create Fd Tipo Select';
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo Selects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-tipo-select-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
