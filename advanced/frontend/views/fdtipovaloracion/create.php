<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoValoracion */

$this->title = 'Create Fd Tipo Valoracion';
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo Valoracions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-tipo-valoracion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
