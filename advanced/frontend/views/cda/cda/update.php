<?php

use yii\helpers\Html;

?>
<div class="cda-update">

     <?php
    if(empty($_ajax)){

        $this->params['breadcrumbs'][] = 'Modificar';
        $this->params['breadcrumbs'][] = ['label' => 'AQUI VA EL TITULO', 'url' => [$labelmiga]];
        $_urlregresar = \Yii::$app->urlManager->createUrl([$labelmiga, 'id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' => $labelmiga]);
    ?>
           <h1><?= Html::encode($this->title) ?></h1>        
    <?php    
    }
    ?>
           
    <!--IMPRIMIENDO ENCABEZADO DE SOLICITUD O TRAMITE       ---------------------------------------->
    <?= $encabezado; ?>

    <?= $this->render('_form', [
        'model' => $model,'listadodemarcacion'=>$listadodemarcacion,'listadocentro' => $listadocentro,'tipo'=>$tipo,'stringClasificacion'=>$stringClasificacion,'modelpsactividad'=>$modelpsactividad
    ]) ?>

</div>
