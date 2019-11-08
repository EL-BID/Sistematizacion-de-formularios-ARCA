<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesdropdown */

$this->title = 'Aplicativo Beta';
$this->params['breadcrumbs'][] = ['label' => 'Aplicativo Beta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aplicativo">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'datos' => $datos,
    ]) ?>

</div>
