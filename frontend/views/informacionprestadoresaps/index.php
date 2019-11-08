<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\InformacionprestadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Información general prestadores APS';
$this->params['breadcrumbs'][] = $this->title;

$id_fmt=@$_GET['id_fmt'];
$id_conj_prta=@$_GET['id_conj_prta'];
$id_cnj_rpta=@$_GET['id_cnj_rpta'];
$estado=@$_GET['estado'];
$capitulo=@$_GET['capitulo'];
/*$cantones=@$_GET['cantones'];
$provincia=@$_GET['provincia'];*/
$parroquias=@$_GET['parroquias'];
$periodos=@$_GET['periodos'];
$antvista=@$_GET['antvista'];
$last=1;



$url2 = Url::toRoute(['gestorformatos/index','provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'id_fmt'=>$id_fmt,'estado'=>$estado,'periodos'=>$periodos,'hashbutton'=>'submit'],true);
?>
<div class="aplicativo">
  <div class="clientesdropdown-form">
 <?= Html::beginForm(['informacionprestadoresaps/index','id_fmt'=>$id_fmt,'estado'=>$estado,'periodos'=>$periodos,'hashbutton'=>'submit','id_conj_prta'=>$id_conj_prta,'id_cnj_rpta'=>$id_cnj_rpta,'provincia'=>$provincia,'cantones'=>$cantones], 'post', ['class' => 'searchBoxForm']); ?>   
 <div class="headSection"><h1 class="titSection">Seleccione filtros de búsqueda</h1></div>
   <table class="table">
        <tr>
            <td>
                <?php 

                echo Html::label('Provincia: ', 'provincia', ['class' => 'label-class']);

                echo Html::dropDownList('provincia',[],
                     $list_provincias,
                      ['prompt'=>'Seleccione una provincia','id'=>'provincia','options'=>[$provincia=>["Selected"=>true]],
                          'onchange'=>'$.post("index.php?r=fdubicacion/listado&tipo=1&id='.'"+$(this).val(),function(data){
                              $("#cantones").html(data);
                          });']
                      ); 
                ?>                 
            </td>
            
            
            <td>
                <?php
                        
                echo Html::label('Cantones: ', 'cantones', ['class' => 'label-class']);
                
               echo Html::dropDownList('cantones',[],
                         $initcantones,['prompt'=>'Seleccione un canton','id' => 'cantones','options'=>[$cantones=>["Selected"=>true]],
                         ] ); 
                
                ?>                 
            </td>
    
  
        </tr>

    </table>
 <?= Html::a('Regresar', $url2, ['class' => 'btn btn-default']) ?> 
 <?= Html::submitButton('Buscar', ['class' => 'btn btn-lg btn-primary', 'name' => 'hashbutton', 'value'=>'submit']) ?>
  
 <?= Html::endForm() ?>
    </div>

</div>

<?php
if(!empty($list_entaps)){
?>


<div class="informacionprestadores-index">  
    
    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="aplicativo">
    <table class="table_style">        
        <tr >
            <th>N°</th>  
            <th>Nombre prestador</th>            
            <th>Provincia</th>
            <th>Cantón</th>
            <th>Demarcación</th>
            <th>Reporte prestador</th>            
        </tr>
        <?php      
        $i=1;
        foreach($list_entaps as $key=>$val)
        {
            $separa_key =explode("/",$key);
            $nombre_prestador = $separa_key[0];
            $provincia_a = frontend\controllers\InformacionprestadoresapsController::ObtenerNombreProvincia($separa_key[1]);
            $canton = frontend\controllers\InformacionprestadoresapsController::ObtenerNombreCanton($separa_key[1],$separa_key[2]);
            $demarca = frontend\controllers\InformacionprestadoresapsController::ObtenerNombreDemarcacion($separa_key[1],$separa_key[2]);            
            $separa_valor =explode("/",$val);
            ?>
         <tr>
            <td><?= $i?></td>            
            <td><?= $nombre_prestador?></td>  
            <td><?= $provincia_a?></td>   
            <td><?= $canton?></td>   
            <td><?= $demarca?></td>   
            <td>
            <?php
                  $_urlhtml = Url::toRoute(['detformato/genhtml','id_conj_rpta' => $separa_valor[0],'id_conj_prta'=>6,'id_fmt'=>6,'last'=>1,'estado'=>7,'idjunta'=>$separa_valor[1],'cantones'=>$cantones,'provincia'=>$provincia,'boton'=>true,'url_actual'=>'informacionprestadoresaps'],true);
                                $_mensaje = "Accediendo a la vista HTML";
                                echo Html::a(
                                       '<span class="glyphicon glyphicon-file"></span> Reporte',
                                       $_urlhtml, 
                                       [
                                           'title' => 'Reporte',
                                           'data-confirm' => Yii::t('yii', $_mensaje.'::'.$_urlhtml),
                                           'data-method' => 'post',
                                       ]
                                   );
            ?>
            </td>            
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>
</div>
</div>
<?php
       }
       else
       {
?>
<br/>
<div class="sin_registros"><br>No existen registros para estos parámetros</div>
<?php
       }
?>
