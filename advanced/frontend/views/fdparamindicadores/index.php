<?php

use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
use yii\widgets\ActiveForm;

$this->title = 'Indicadores';
$this->params['breadcrumbs'][] = $this->title;
$url2 = Url::toRoute(['informacionprestadoresriego/index','id_cnj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt,'estado' => $estado,'provincia'=>$provincia,'cantones'=>$cantones,'hashbutton'=>'submit'],true);


?>
<div class="fd-param-evaluaciones-index">    
            <?php
    $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
                ]
            ]);
    ?>
    <div class="headSection"><h1 class="titSection">RESULTADO DE INDICADORES</h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    
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
            <td class="labelpreguntaevaluacion">Tipo indicador</td>
            <td class="labelpreguntaevaluacion">Item</td>
            <td class="labelpreguntaevaluacion">Indicador</td>
            <td class="labelpreguntaevaluacion">A</td>
            <td class="labelpreguntaevaluacion">B</td>
            <td class="labelpreguntaevaluacion">Resultado</td>
            <td class="labelpreguntaevaluacion">Consideraciones</td>
            <td class="labelpreguntaevaluacion">Recomendaciones</td>
        </tr>      

       <?php 
            $n_componente=array();
            $inicio ="";
            $cont =1;
            $bande = true;
            $cuenta=0;
        foreach($indicadores as $eval)
        {          
            $unidad="%";
            if($eval['item']==14){
                $unidad="$";
            }
            echo "<tr>";     
                echo "<input type='hidden'  name ='FdResulIndicadores[id_indicador/$cuenta]' value ='".$eval['id_indicador']."'/>";
                echo "<td class='inputpreguntaevaluacion'>".$eval['tipo_indicador']."</td>";
                echo "<td class='inputpreguntaevaluacion' align='center'>".$eval['item']."</td>";
                echo "<td class='inputpreguntaevaluacion'>".$eval['indicador']."</td>";
                $valor_a = frontend\controllers\poc\FdParamIndicadoresController::Buscarvalorpregunta($eval['variable_a'],$id_conj_rpta);
                echo "<td class='inputpreguntaevaluacion' align='center'>".$valor_a."</td>";
                $valor_b = frontend\controllers\poc\FdParamIndicadoresController::Buscarvalorpregunta($eval['variable_b'],$id_conj_rpta);
                echo "<td class='inputpreguntaevaluacion' align='center'>".$valor_b."</td>"; 
                $resul = frontend\controllers\poc\FdParamIndicadoresController::Calcularesultado($valor_a,$valor_b,$eval['formula']);
                echo "<td class='inputpreguntaevaluacion' align='center'>".$resul." ".$unidad."</td>";  
                echo "<input type='hidden'  name ='FdResulIndicadores[id_resultado/$cuenta]' value ='".$resul."'/>";
                echo "<td class='inputpreguntaevaluacion'>".$eval['consideracion']."</td>";  
                $modelRes= \common\models\poc\FdResulIndicadores::findOne(['id_indicador'=>$eval['id_indicador'],'id_conjunto_respuesta'=>$id_conj_rpta]);   
                echo "<td class='inputpreguntaevaluacion'><input type ='text' name='FdResulIndicadores[recomendacion/$cuenta]' id='resultado' value='".$modelRes['recomendacion']."'/></td>";  
            echo "</tr>";
            
            $eval['indicador']=str_replace("Porcentaje","%",$eval['indicador']);
            if($eval['item']!=14){
                $color=frontend\controllers\poc\FdParamIndicadoresController::Semaforizacion($resul);
                $n_componente[$eval['indicador']]=array('valor'=>$resul,'color'=>$color);
            }
            $cuenta++;
        }
     ?>
    </table>
    <br/>
    <div class="form-group" align="right">
        <button type="submit" id="botoncrear2" class="btn btn-success" value="1" onclick="clicked='principal'">Guardar</button>
    </div>
</div>      
<?php ActiveForm::end(); ?>
</div>

<?php

        
$categorias= array_keys($n_componente);
$valores_res=array_values($n_componente );
$valores=array();
$colores=array();
foreach($valores_res as $valos)
{
    $valores[]=$valos['valor'];
    $colores[]=$valos['color'];
}

echo Highcharts::widget([
   'options' => [       
    'chart'=> [        
        'type'=> 'bar',        
    ],
      'title' => ['text' => 'GRÁFICO DE LOS RESULTADOS DE INDICADORES', 'x'=> -80],
      'xAxis' => [
         'categories' => $categorias,  
          'title'=> [
            'text'=> null
        ],
      ],
        'yAxis'=> [                
        'min'=> 0,
        'title'=> [
            'text'=> 'Valores (%)',
            'align'=> 'high'
        ],
        'labels'=> [
            'enabled'=>true,
            'format'=> '{value} %',  
        ]
    ],
    'pane'=>[
        'size'=> '100%'
    ],
    'tooltip'=> [        
        'pointFormat'=> '<span style="color:{series.color}"><b>{point.y:,.0f}%</b><br/>',
    ],
    'plotOptions'=> [
        'bar'=> [
            'dataLabels'=> [
                'enabled'=> true
            ]
        ],
        'series'=> [
            'colorByPoint'=> true,
            'colors'=> $colores            
        ],         
    ],
    'legend'=> [
        'layout'=> 'vertical',
        'align'=> 'right',
        'verticalAlign'=> 'top',
        'x'=> -40,
        'y'=> 460,
        'floating'=> true,
        'borderWidth'=> 1,     
        'backgroundColor'=>  '#211f1f',
        'shadow'=> true
    ],
     'credits'=> [
        'enabled'=> false
    ],
    'series' => [
         ['name' => $categorias, 'data' => $valores,               
         ],                  
      ],
   ]
]);
?>