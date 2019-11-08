<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\poc\FdFormato;                            //Agregando modelo de formato
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesdropdown */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this);


?>

<div class="clientesdropdown-form">
  
    <!-- -----------------------------------------FORMULARIO CON FILTROS---------------------------------------------------- -->
  <?= Html::beginForm(['gestorformatos/index'], 'get', ['class' => 'searchBoxForm']); ?>    
    <?php
    if($filtros_search!='N'){
    ?>
  
    <table class="table">
        <tr>
            <td>
                <?php 

                echo Html::label('Provincia: ', 'provincia', ['class' => 'label-class']);

                echo Html::dropDownList('provincia',[],
                     $list,
                      ['prompt'=>'Seleccione una provincia','id'=>'provincia','options'=>[$provincia=>["Selected"=>true]],
                          'onchange'=>'$.post("index.php?r=gestorformatos/listado&tipo=1&id='.'"+$(this).val(),function(data){
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
                         'onchange'=>'prueba()'] ); 
                
                ?>                 
            </td>
    
            <td>
                <?php
         
                    echo Html::label('Parroquias: ', 'parroquias', ['class' => 'label-class']);
                    echo Html::dropDownList('parroquias',[],$initparroquias,
                            ['prompt'=>'Seleccione una parroquia','id' => 'parroquias','options'=>[$parroquias=>["Selected"=>true]],] ); 

                 ?> 
                
            </td>
        </tr>
        <tr>
            <td>
                 <?php
         
                    echo Html::label('Formato: ', 'id_fmt', ['class' => 'label-class']);
                     echo Html::dropDownList('id_fmt',[],
                     $list_formato,
                      ['prompt'=>'Seleccione un formato','id'=>'id_fmt','options'=>[$id_fmt=>["Selected"=>true]],
                         'onchange'=>'$.post("index.php?r=gestorformatos/listadoe&tipo=1&id='.'"+$(this).val(),function(data){
                             var res = data.split("::");
                             $("#estado").html(res[0]);
                             $("#periodos").html(res[1]);
                         });']
                      ); 
                 ?>                 
            </td>
            <td>
                 <?php
         
                    echo Html::label('Estado: ', 'estado', ['class' => 'label-class']);
                    echo Html::dropDownList('estado',[],$initestados,['prompt'=>'Seleccione un Estado','id'=>'estado','options'=>[$estado=>["Selected"=>true]],]);  

                 ?>                 
            </td>
            <td>
                 <?php
         
                    echo Html::label('Periodo: ', 'periodos', ['class' => 'label-class']);
                    echo Html::dropDownList('periodos',[],$initperiodos,['prompt'=>'Seleccione un Periodo','id'=>'periodos','options'=>[$periodos=>["Selected"=>true]],]);  

                 ?>                 
            </td>
            
        </tr>
        <tr>
            <td colspan="3" align="left"> 
                 <?= Html::submitButton('Buscar', ['class' => 'btn btn-lg btn-primary', 'name' => 'hashbutton', 'value'=>'submit']) ?>
                                    
            </td>
        </tr>
    </table>
        
   <?php
    }
    else
    {
    ?>

<?= Html::submitButton('Acceder a Formato', ['class' => 'btn btn-lg btn-primary', 'name' => 'hashbutton', 'value'=>'submit']) ?>
<br/><br/>
<?php 
    }?>
<?= Html::endForm() ?>
    <div id="resultados">
      
     
<?php  

if(key($list_formato)==6 and !empty($_GET['hashbutton']))
{
     Yii::$app->getSession()->setFlash('error', [
       'type' => 'error',
       'message' => 'INFORMACIÓN IMPORTANTE: Al momento de registrar los datos recuerda que existen campos obligatorios de llenado en cada ficha, los datos se guardarán cuando se hayan llenado todos los campos obligatorios y presionado el botón GUARDAR',
     ]);  
}

        if(!empty($dataProvider)){                         
            echo GridView::widget([ 
            'dataProvider' => $dataProvider,                       //Objeto de Datos 
            'layout'=>"{pager}\n{summary}\n{items}",        //Modelo de presentacion 
            'columns' => [                                  //Columnas a presentar
                ['class' => 'yii\grid\SerialColumn'],         
                'Entidad', 
                'Formato', 
                'Estado',
                'Digitador',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => ' {download} {formatohtml} ',
                    'buttons' => [
                            'download' => function ($url,$model)use ($url_acceso) {
                                //cREANDO URL PARA aceeso a Dashboard, detalle capitulo y listado capitulos
                if(!empty($url_acceso))
                {
                    $url2 = Url::toRoute([$url_acceso,'capitulo'=>'','id_cnj_rpta' => $model['id_conjunto_respuesta'],'id_conj_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'],'estado'=>$model['id_adm_estado'],'migadepan'=>'', 'provincia'=>$model['provincia'],'cantones'=>$model['cantones'],'parroquias'=>$model['parroquias'],'periodos'=>$model['periodos'],'antvista'=>'gestorformatos/index','idjunta'=>'','hashbutton'=>''],true);
                    $_mensaje="Accediendo a Información General de Prestadores";
                }
                else
                {
                                    if($model['id_tipo_view_formato']==2){
                                        $url2 = Url::toRoute(['dashboard/index','id_conj_rpta' => $model['id_conjunto_respuesta'],'id_conj_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'],'estado'=>$model['id_adm_estado']],true);
                                        $_mensaje = "Accediendo al Dashboard";

                                    }else if($model['id_tipo_view_formato']==1){

                                        $url2 = Url::toRoute(['detcapitulo/genvistaformato','capitulo'=>'','id_conj_rpta' => $model['id_conjunto_respuesta'],'id_conj_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'],'estado'=>$model['id_adm_estado'],'provincia'=>$model['provincia'],'cantones'=>$model['cantones'],'parroquias'=>$model['parroquias'],'periodos'=>$model['periodos'],'antvista'=>'gestorformatos/index','idjunta'=>'',],true);
                                        $_mensaje = "Accediendo a Detalle Formato";

                                    }else if($model['id_tipo_view_formato']==3){
                                        $url2 = Url::toRoute(['listcapitulos/index','id_conj_rpta' => $model['id_conjunto_respuesta'],'id_conj_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'],'estado'=>$model['id_adm_estado'],'provincia'=>$model['provincia'],'cantones'=>$model['cantones'],'parroquias'=>$model['parroquias'],'periodos'=>$model['periodos'],'antvista'=>'gestorformatos/index','idjunta'=>'',],true);
                                        $_mensaje = "Accediendo a Listado Capitulo";

                                    }
                 }
                                if($model['id_tipo_view_formato']<=3 and $model['p_ejecutar']=='S'){
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-chevron-right"></span> Editar',
                                        $url2, 
                                        [
                                            'title' => 'Ver',
                                            'data-confirm' => Yii::t('yii', $_mensaje.'::'.$url2),
                                            'data-method' => 'post',
                                        ]
                                    );
                                }
                            },
                            'formatohtml' => function($url,$model){
                                //Creando url para acceso al formato HTML
                                $formato = $model['id_formato'];
                                if($formato!=6 and $formato!=7 and $formato!=8)                                
                                {
                                    $_urlhtml = Url::toRoute(['detformato/genhtml','id_conj_rpta' => $model['id_conjunto_respuesta'],'id_conj_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'],'estado'=>$model['id_adm_estado']],true);
                                    $_mensaje = "Accediendo a la vista HTML";
                                    return Html::a(
                                           '<span class="glyphicon glyphicon-file"></span> Reporte',
                                           $_urlhtml, 
                                           [
                                               'title' => 'Formato',
                                               'data-confirm' => Yii::t('yii', $_mensaje.'::'.$_urlhtml),
                                               'data-method' => 'post',
                                           ]
                                       );
                                }
                            }       
                        ],
                    ],
                ],

                ]); 
        }
            ?>        
    </div>
</div>
<script>
    function prueba(){
        
        var selector = document.getElementById('provincia');
        var x = selector[selector.selectedIndex].value;
        
        var selector2 = document.getElementById('cantones');
        var y = selector2[selector2.selectedIndex].value;
        
       
        $.post("index.php?r=gestorformatos/listadop&tipo=1&id_provincia="+x+"&id_canton="+y,function(data){
             $("#parroquias").html(data); 
        });
    }
</script>