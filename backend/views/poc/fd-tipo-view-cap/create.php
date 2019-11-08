<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoViewCap */

$this->title = 'Create Fd Tipo View Cap';
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo View Caps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-tipo-view-cap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
