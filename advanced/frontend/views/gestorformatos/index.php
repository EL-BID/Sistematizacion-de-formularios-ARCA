<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesdropdown */

$this->title = 'Gestor Formatos';
$this->params['breadcrumbs'][] = ['label' => 'Gestor Formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headSection">
<h1 class="titSection"><?= Html::encode($this->title) ?></h1>
<p class="text-center">Seleccione sus requisitos de b&uacutesqueda</p>
</div>
<div class="aplicativo">

    

    <?= $this->render('_form2', [
        'dataProvider' => $dataProvider,'list'=>$list,'list_formato'=>$list_formato,
        'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,
        'periodos'=>$periodos,'id_fmt'=>$id_fmt,'initcantones'=>$initcantones,
        'initparroquias'=>$initparroquias,'initestados'=>$initestados,
        'initperiodos'=>$initperiodos,'estado'=>$estado
        
    ]) ?>

</div>

