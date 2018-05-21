<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacion */

$this->title = 'Respuesta a Solicitud';
$this->params['breadcrumbs'][] = ['label' => 'Cda Solicitud Informacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_solicitud_info, 'url' => ['view', 'id' => $model->id_solicitud_info]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cda-solicitud-informacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'listinfofaltante'=>$listinfofaltante,'listtiporeporte'=>$listtiporeporte,'listtipoatencion'=>$listtipoatencion,'clase'=>$clase
    ]) ?>

</div>
