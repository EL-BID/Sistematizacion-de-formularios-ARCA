<?php
use sjaakp\gcharts\PieChart;
use yii\helpers\Html;

?>

<h3>Grafica tipo PieChart</h3>

<?= PieChart::widget([
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