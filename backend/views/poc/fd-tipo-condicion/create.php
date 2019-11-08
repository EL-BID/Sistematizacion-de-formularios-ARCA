<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoCondicion */

$this->title = 'Create Fd Tipo Condicion';
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo Condicions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-tipo-condicion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
