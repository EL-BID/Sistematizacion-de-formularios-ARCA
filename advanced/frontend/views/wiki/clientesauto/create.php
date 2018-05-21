<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesauto */

$this->title = 'Create Clientesauto';
$this->params['breadcrumbs'][] = ['label' => 'Clientesautos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="clientesauto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'autocomplete'=>$autocomplete,'autocomplete2'=>$autcomplete2,
    ]) ?>

</div>
