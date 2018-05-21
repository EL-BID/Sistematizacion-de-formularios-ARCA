<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacion */

$this->title = 'Agregar Solicitud Informacion';
$this->params['breadcrumbs'][] = ['label' => 'Cda Solicitud Informacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-solicitud-informacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'listinfofaltante'=>$listinfofaltante,'listtiporeporte'=>$listtiporeporte,'listtipoatencion'=>$listtipoatencion
    ]) ?>

</div>
