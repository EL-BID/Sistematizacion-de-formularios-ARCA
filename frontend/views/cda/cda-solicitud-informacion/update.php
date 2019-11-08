<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacion */

$this->title = 'Respuesta a Solicitud';

$this->params['breadcrumbs'][] = ['label' => 'CDA Solicitud Información', 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => $model->id_solicitud_info, 'url' => ['view', 'id' => $model->id_solicitud_info]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cda-solicitud-informacion-update">

    <?php
            if(empty($_ajax)){
        ?>
             <h1><?= Html::encode($this->title) ?></h1>
        <?php
            }
        ?>

    <?= $this->render('_form', [
        'model' => $model,'listinfofaltante'=>$listinfofaltante,'listtiporeporte'=>$listtiporeporte,'listtipoatencion'=>$listtipoatencion,'clase'=>$clase
    ]) ?>

</div>
