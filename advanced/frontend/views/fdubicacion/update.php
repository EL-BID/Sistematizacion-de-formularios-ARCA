<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdUbicacion */

$this->title = 'Actualizar' ;
$this->params['breadcrumbs'][] = ['label' => 'Fd Ubicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ubicacion, 'url' => ['view', 'id' => $model->id_ubicacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
        <?php
            if(empty($_ajax)){
        ?>
             <h1><?= Html::encode($this->title) ?></h1>
        <?php
            }
        ?>
<div class="fd-ubicacion-update">

    <?= $this->render('_form', [
        'model' => $model,'numerar'=>$numerar,'nom_prta'=>$nom_prta,'botton'=>$botton,'demarcacionespost'=>$demarcacionespost,'cantonesPost'=>$cantonesPost,'parroquiasPost' => $parroquiasPost
    ]) ?>

</div>
