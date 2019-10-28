<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use frontend\controllers\poc\FdParamEvaluacionesController;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdParamEvaluacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Param Evaluaciones';
$this->params['breadcrumbs'][] = $this->title;

print "es ".$id_conj_rpta;
print_r($n_array);
?>
<div class="fd-param-evaluaciones-index">

    <div class="headSection"><h1 class="titSection">RESULTADO DEL DIAGNÓSTICO DE LA PRESTACIÓN DEL SERVICIO PÚBLICO DE RIEGO</h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="aplicativo">
    <table class="tbcapitulo">
        <tr><td class="nomcapitulo" colspan="5">IDENTIFICACIÓN Y UBICACIÓN DEL PRESTADOR DEL SERVICIO</td></tr>
        <tr><td class="labelpregunta">Nombre del Prestador del Servicio:</td><td class="inputpregunta" colspan="4"><?=$datosriego->nombres_prestador_servicio ?></td></tr>
        <tr><td class="labelpregunta">Dirección de las oficinas:</td><td class="inputpregunta" colspan="4"><?=$datosriego->direccion_oficinas ?></td></tr>
        <tr><td class="labelpregunta">Nombre del Representante legal:</td><td class="inputpregunta" colspan="4"><?=$datosriego->nombres_apellidos_replegal ?></td></tr>
        <tr><td class="labelpregunta">Teléfono</td><td class="labelpregunta">Convencional:</td><td class="inputpregunta"><?=$datosriego->num_convencional ?></td><td class="labelpregunta">Celular:</td><td class="inputpregunta"><?=$datosriego->num_celular ?></td></tr>
        <tr><td class="labelpregunta">Correo electrónico:</td><td class="inputpregunta" colspan="4"><?=$datosriego->correo_electronico ?></td></tr>     
        <tr><td class="labelpregunta">Demarcación Hidrográfica:</td><td class="inputpregunta"><?=$demarcacion->nombre_demarcacion ?></td><td class="labelpregunta" >Provincia:</td><td class="inputpregunta" colspan="2"><?=$provincias->nombre_provincia ?></td></tr>
        <tr><td class="labelpregunta">Cantón:</td><td class="inputpregunta"><?=$cantones->nombre_canton ?></td><td class="labelpregunta">Parroquia:</td><td class="inputpregunta" colspan="2"><?=$parroquias->nombre_parroquia ?></td></tr>
    </table>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,                   
        'options' => [ 'style' => 'table-layout:fixed; font-size:13px;' ], 
        'showFooter'=>TRUE,
        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
        'layout' => '{items}{pager}',

        'columns' => [
            [
            'class' => 'yii\grid\SerialColumn',
            'contentOptions' => ['style' => 'width:50px; white-space: normal;'],
            ],

            //'id_evaluacion',
            'componente',            
            'item',
            'criterio',           
            'condicionante',
                          
            ['attribute' => 'id_pregunta', 'label' => 'Cumplimiento criterio' ,'value'=>
            function ($data) use($id_conj_rpta)
            {  
                $div2='';
                $var_v = FdParamEvaluacionesController::Buscarpregunta($data->id_pregunta,$data->tipo_valoracion,$data->detalle,$id_conj_rpta);
                $separa = explode('?',$var_v);
                $options = ['style' => ['width' => '50px','border'=> '1px solid #d6cccc']];
                $options2 = ['style' => ['width' => '500px','border'=> '1px solid #d6cccc']];                
                                         
                $div1= Html::tag('td', $separa[0],$options);
                if(!empty($separa[1]))
                  $div2= Html::tag('td', $separa[1],$options2); 
                  
                $unir = $div1.$div2;
                $d2 = Html::tag('tr',$unir);                
                $d3 = Html::tag('table',$unir);
                                    
                return $d3;
                              
            },
            'format' => 'raw'
            ],           
            ['attribute' => 'campo_puntaje', 'label' => 'Puntaje' ,'value'=>
            function ($data,$model) use($id_conj_rpta)
            {               
                 $var_v = FdParamEvaluacionesController::Calcularpuntaje($data->id_pregunta,$data->puntuacion,$data->tipo_valoracion,$data->detalle,$id_conj_rpta,$data->componente,$data->id_evaluacion);
                 $options = ['style' => ['width' => '100px']];                      
                 return Html::input('text', 'campo_puntaje',$var_v,$options);                                          
            },
            'footer'=>$nivel_desempenio,
            'format' => 'raw'
            ],
            ['attribute' => 'campo_final', 'label' => 'Puntaje final','value'=>
            function ($data,$model) use($id_conj_rpta,$n_array)
            {                                  
                       return $n_array[$data->componente];
                       
            },     
            'footer'=>$suma_total,            
            ],
        ],
    ]);    
    ?>
    <table  class="tbcapitulo" width="100%" style="table-layout:auto" >
        <tr>
            <td class="labelpreguntaevaluacion">Componente</td>
            <td class="labelpreguntaevaluacion">Item</td>
            <td class="labelpreguntaevaluacion">Criterio</td>
            <td class="labelpreguntaevaluacion">Condicionante</td>
            <td class="labelpreguntaevaluacion">Cumplimiento criterio</td>
            <td class="labelpreguntaevaluacion">Puntaje</td>
            <td class="labelpreguntaevaluacion">Puntaje final</td>
        </tr>      

            <?php 
        foreach($evaluaciones as $eval)
        {
            echo "<tr>";
                echo "<td class='inputpreguntaevaluacion'>".$eval['componente']."</td>";
                echo "<td class='inputpreguntaevaluacion'>".$eval['item']."</td>";
                echo "<td class='inputpreguntaevaluacion'>".$eval['criterio']."</td>";
                echo "<td class='inputpreguntaevaluacion'>".$eval['condicionante']."</td>";
                $var_pregu = FdParamEvaluacionesController::Buscarpregunta($eval['id_pregunta'],$eval['tipo_valoracion'],$eval['detalle'],$id_conj_rpta);
                $separa = explode('?',$var_pregu);
                echo "<td class='inputpreguntaevaluacion'>";
                echo "<table>";
                echo "<tr>";
                echo "<td>".$separa[0]."</td>";
                echo "<td>".$separa[1]."</td>";
                echo "</tr>";
                echo "</table>";
                echo "</td>";
                $var_v = FdParamEvaluacionesController::Calcularpuntaje($eval['id_pregunta'],$eval['puntuacion'],$eval['tipo_valoracion'],$eval['detalle'],$id_conj_rpta,$eval['componente'],$eval['id_evaluacion']);
                echo "<td class='inputpreguntaevaluacion'>".$var_v."</td>";
            echo "</tr>";
        }
            ?>

    </table>

</div>
