<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use frontend\controllers\poc\FdParamEvaluacionesController;
use miloschuman\highcharts\Highcharts;

$this->title = 'Evaluaciones';
$this->params['breadcrumbs'][] = $this->title;
$url2 = Url::toRoute(['informacionprestadoresriego/index','id_cnj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt,'estado' => $estado,'provincia'=>$provincia,'cantones'=>$cantones,'hashbutton'=>'submit'],true);
?>
<div class="fd-param-evaluaciones-index">

<div class="headSection"><h1 class="titSection">REPORTE DEL DIAGNÓSTICO DE LA PRESTACIÓN DEL SERVICIO PÚBLICO DE RIEGO</h1></div>

<div class="aplicativo">
    
    <?php echo Html::a('Regresar', $url2, ['class' => 'btn btn-default']); ?>        
    <br/><br/>
    <table class="tbcapitulo">
        <tr><td class="nomcapitulo" colspan="5">IDENTIFICACIÓN Y UBICACIÓN DEL PRESTADOR DEL SERVICIO</td></tr>
        <tr><td class="labelpregunta">Nombre del Prestador del Servicio:</td><td class="inputpregunta" colspan="4"><?=$datosriego->nombres_prestador_servicio ?></td></tr>
        <tr><td class="labelpregunta">Dirección de las oficinas:</td><td class="inputpregunta" colspan="4"><?=$datosriego->direccion_oficinas ?></td></tr>
        <tr><td class="labelpregunta">Nombre del Representante legal:</td><td class="inputpregunta" colspan="4"><?=$datosriego->nombres_apellidos_replegal ?></td></tr>
        <tr><td class="labelpregunta">Teléfono</td><td class="labelpregunta">Convencional:</td><td class="inputpregunta"><?=$datosriego->num_convencional ?></td><td class="labelpregunta">Celular:</td><td class="inputpregunta"><?=$datosriego->num_celular ?></td></tr>
        <tr><td class="labelpregunta">Correo electrónico:</td><td class="inputpregunta" colspan="4"><?=$datosriego->correo_electronico ?></td></tr>     
        <tr><td class="labelpregunta">Demarcación Hidrográfica:</td><td class="inputpregunta"><?=$demarcacion->nombre_demarcacion ?></td><td class="labelpregunta" >Provincia:</td><td class="inputpregunta" colspan="2"><?=$provincias_n->nombre_provincia ?></td></tr>
        <tr><td class="labelpregunta">Cantón:</td><td class="inputpregunta"><?=$cantones_n->nombre_canton ?></td><td class="labelpregunta">Parroquia:</td><td class="inputpregunta" colspan="2"><?=$parroquias->nombre_parroquia ?></td></tr>
    </table>
    
    <table  class="tbcapitulo" width="100%" style="table-layout:auto" >
        <tr>
            <td class="labelpreguntaevaluacion">Componente</td>
            <td class="labelpreguntaevaluacion">Item</td>
            <td class="labelpreguntaevaluacion">Criterio</td>
            <td class="labelpreguntaevaluacion">Condicionante</td>
            <td class="labelpreguntaevaluacion">Cumplimiento criterio</td>
            <td class="labelpreguntaevaluacion">Puntaje individual</td>
            <td class="labelpreguntaevaluacion">Resultado</td>
            <td class="labelpreguntaevaluacion">Puntaje</td>
            <td class="labelpreguntaevaluacion">% de cumplimiento</td>
        </tr>      

            <?php 
           
            $inicio ="";
            $cont =1;
            $bande = true;
            $cuenta=0;
            $sumar_porcen=0;

            $n_componente2=array();    
            foreach($evaluaciones as $eval)
            {
                    $valo = $n_array[$eval['componente']];
                    $clave = key($valo);
                    $valor = current($valo);
                    $valo2 = $n_array2[$eval['componente']];
                    $valor2 = current($valo2);
                    $inicio=$eval['componente'];

                echo "<tr>";
                //echo "<input type='hidden'  name ='FdResulEvaluaciones[id_evaluacion_$cuenta]' value ='".$eval['id_evaluacion']."'/>";
                if($cont==1)
                    echo "<td class='inputpreguntaevaluacion' rowspan=$clave>".$eval['componente']."</td>";
                    echo "<td class='inputpreguntaevaluacion' align='center'>".$eval['item']."</td>";
                    echo "<td class='inputpreguntaevaluacion'>".$eval['criterio']."</td>";
                    echo "<td class='inputpreguntaevaluacion'>".$eval['condicionante']."</td>";
                    $var_pregu = FdParamEvaluacionesController::Buscarpregunta($eval['id_pregunta'],$eval['tipo_valoracion'],$eval['detalle'],$id_conj_rpta);
                    $separa = explode('?',$var_pregu);
                    $criterio =$separa[0];
                    $resp= $separa[1];
                    $align="";
                    if(empty($resp))
                    {
                        $align="align='center'";
                    }
                    echo "<td class='inputpreguntaevaluacion' $align>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<td  style='width:40px;text-align:center' >".$criterio."</td>";
                    if(!empty($resp))
                      echo "<td style='width:60px;text-align:center'>".$resp."</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</td>";
                    $var_v = FdParamEvaluacionesController::Calcularpuntaje($eval['id_pregunta'],$eval['puntuacion'],$eval['tipo_valoracion'],$eval['detalle'],$id_conj_rpta,$eval['componente'],$eval['id_evaluacion']);
                    $sumar_porcen+=$eval['puntuacion'];                    
                    echo "<td class='inputpreguntaevaluacion' align='center'>".round($var_v,2)."</td>";
                    if($cont==1)
                    {
                      echo "<td class='inputpreguntaevaluacion' align='center' rowspan=$clave>".round($valor,2)."</td>";                       
                      echo "<td class='inputpreguntaevaluacion' align='center' rowspan=$clave>".round($valor2,2)."</td>";           
                      echo "<td class='inputpreguntaevaluacion' align='center' rowspan=$clave>".round(($valor/$valor2)*100,2)."%</td>";          
                      $n_componente2[$eval['componente']]=round(($valor/$valor2)*100,2);
                    }               
                    if($cont==$clave){                        
                         $cont=1;
                         $sumar_porcen=0;
                    }
                    else
                    {
                      $cont++;
                    }
                echo "</tr>";
                $cuenta++;
            }

        echo "<tr>";
            echo"<td class='inputpreguntaevaluaciontot' colspan =6 ><b>PUNTAJE TOTAL</b></td>";
            echo "<td class='inputpreguntaevaluacionres$semaforo' align='center'><b>".round($suma_total,2)."</b></td>";
        echo "</tr>";
        echo "<tr>";
            echo"<td class='inputpreguntaevaluaciontot' colspan =6 ><b>NIVEL DE DESEMPEÑO</b></td>";
            echo "<td class='inputpreguntaevaluacionres$semaforo'><b>".strtoupper($nivel_desempenio)."</b></td>";
        echo "</tr>";
         ?>
    </table>
</div>      
</div>

<?php
      
$categorias= array_keys($n_componente2);
$valores=array_values($n_componente2);

$nuevo_array=array();
foreach($n_componente2 as $k=>$v)
{
    $nuevo_array[]=$k.'<br>'.$v;
}

echo Highcharts::widget([
   'options' => [       
    'chart'=> [
        'polar'=> true,
        'type'=> 'line',
        'height'=>500
    ],
      'title' => ['text' => 'GRÁFICO DE LOS COMPONENTES ANALIZADOS', 'x'=> -20],
      'xAxis' => [
          'categories' => $nuevo_array,          
          'labels'=> [
                'enabled'=>true,
                'format'=> '{value} %',                              
          ],          
          'tickmarkPlacement'=> 'on',
          'lineWidth'=> 0,                //VISUALIZAR EL CIRCULO QUE CUBRE EL GRÁFICO,
           
      ],
        'yAxis'=> [
        'gridLineInterpolation'=> 'polygon',
        'labels'=> [
            'format'=> '{value} %'
          ],          
        'tickInterval'=> 10,
        'lineWidth'=> 0,           
        'min'=> 0 ,
        'gridLineColor'=> '#b0b0b9', //cambiar color de lineas radar
    ],
        'pane'=>[
        'size'=> '90%',
        'startAngle'=>-37, //centrar el gráfico
    ],
    'tooltip'=> [
        'shared'=> true,
        //'pointFormat'=> '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
        'pointFormat'=> '<span style="color:{series.color}"><br/>'
    ],
       
    'legend'=> [
        'align'=> 'right',
        'verticalAlign'=> 'middle',
        
    ],
    'series' => [
         ['name' => $categorias, 'data' => $valores],
      ],
      'responsive' => [
        'rules'=> [[
            'condition'=> [
                'maxWidth'=> 500
            ],
            'chartOptions'=> [
                'legend'=> [
                    'align'=> 'center',
                    'verticalAlign'=> 'bottom'
                ],
                'pane'=> [
                    'size'=> '50%'
                ]
            ]
        ]]
    ]
   ]
]);
echo "<br/><br/>";
?>  

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
