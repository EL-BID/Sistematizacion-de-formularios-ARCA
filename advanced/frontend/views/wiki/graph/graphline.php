<?php
use sjaakp\gcharts\LineChart;
use yii\helpers\Html;

?>

<h3>Grafica tipo LineChart</h3>

<?= LineChart::widget([
    'height' => '400px',
    'dataProvider' => $dataProvider,
    'columns' => [
        'año:string',
        'activos',
		'inactivos',
    ],
    'options' => [
        'title' => 'Tipo de Clientes x Año'
    ],
]) ?>