<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoCoordenada */

$this->title = 'Create Tr Tipo Coordenada';
$this->params['breadcrumbs'][] = ['label' => 'Tr Tipo Coordenadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-tipo-coordenada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
