<?php
use sjaakp\gcharts\BarChart;
use yii\helpers\Html;

?>

<h3>Grafica tipo BarChart</h3>

<?= BarChart::widget([
    'height' => '400px',
    'dataProvider' => $dataProvider,
    'columns' => [
        'type:string',
        'conteo'
    ],
    'options' => [
        'title' => 'Tipo de Clientes'
    ],
]) ?>