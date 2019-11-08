<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorTipoDestinatario */

$this->title = 'Nuevo Tipo Destinatario';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Destinatarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cor-tipo-destinatario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
