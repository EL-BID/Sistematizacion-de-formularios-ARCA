<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdCoordenada */

/*$this->title = 'Create Fd Coordenada';
$this->params['breadcrumbs'][] = ['label' => 'Fd Coordenadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="fd-coordenada-create">
   
 
    <?= $this->render('_form', [
        'model' => $model,  'numerar'=>$numerar,'nom_prta'=>$nom_prta,'botton'=>$botton
    ]) ?>

</div>
