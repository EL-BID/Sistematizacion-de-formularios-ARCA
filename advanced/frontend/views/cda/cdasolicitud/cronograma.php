<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaSolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cronograma Cda';
$this->params['breadcrumbs'][] = ['label' => 'Cda Solicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .tablecronograma{
        background: white;
        border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        border: 0px solid #000000;
        color: #000;
    }
    
    .tablecronograma td{
        border:1px solid;
        padding: 2px 2px;
    }
    
    .noborders{
        border: none !important;
    }
    
</style>
<div class="cda-solicitud-index">
    
    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
    
    <div class="aplicativo table-responsive">
    <?= $string ?>
    </div>    
</div>
      
        
    