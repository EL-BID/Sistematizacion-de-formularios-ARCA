<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdElementoCondicion */

$this->title = 'Create Fd Elemento Condicion';
$this->params['breadcrumbs'][] = ['label' => 'Fd Elemento Condicions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-elemento-condicion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
