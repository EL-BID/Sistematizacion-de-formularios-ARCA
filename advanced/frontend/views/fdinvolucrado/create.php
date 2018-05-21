<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdInvolucrado */

/*$this->title = 'Create Fd Involucrado';
$this->params['breadcrumbs'][] = ['label' => 'Fd Involucrados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="fd-involucrado-create">

    

    <?= $this->render('_form', [
        'model' => $model, 'numerar'=>$numerar,'nom_prta'=>$nom_prta,'botton'=>$botton
    ]) ?>

</div>
