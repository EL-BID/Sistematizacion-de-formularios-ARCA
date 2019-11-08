<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuestaXMes */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Fd Respuesta Xmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-respuesta-xmes-create">
    <!--h1 encode this title h1 -->
    

    <?= $this->render('_form', [
        'model' => $model,'tipo_select'=>$tipo_select,'numerar'=>$numerar,'nom_prta'=>$nom_prta,'botton'=>$botton,'focus' => $focus
    ]) ?>

</div>
