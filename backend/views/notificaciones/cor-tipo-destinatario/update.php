<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorTipoDestinatario */

$this->title = 'Actualizar Tipo Destinatario: ' . $model->id_tdestinatario;
$this->params['breadcrumbs'][] = ['label' => 'Cor Tipo Destinatarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tdestinatario, 'url' => ['view', 'id' => $model->id_tdestinatario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cor-tipo-destinatario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
