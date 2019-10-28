<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro Información';
$this->params['breadcrumbs'][] = $this->title;

//Atrayendo pagina inmediatamente anterior
$regresarurl='cda/cdatramite/subproceso';
$_urlregresar = \Yii::$app->urlManager->createUrl([$regresarurl, 'id_cda_tramite' => $id_cda_tramite, 'labelmiga' => $labelmiga]);

?>
<div class="cda-reporte-informacion-index">

     <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
    
    
    <div class="aplicativo table-responsive">
   <!------------------div con class="aplicativo"-------------------------------------->
              <!----------------------------------Boton de Regresar---------------------------->
            <table>
                <tr>
                    <td>
                       <?php echo Html::button("Continuar",
                            ['class'=>'btn btn-default btn-xs',
                                'onclick'=>"window.location.href = '" . $_urlregresar . "';",
                                'data-toggle'=>'Regresar'
                            ]
                        ); ?>
                    </td>
                </tr>
            </table>
            

           <!----------------------------------Encabezado------------------------------------>
            <?= $encabezado ?>
  
           
           <p>
            <?php
            
                if($actividadactual == '215'){
                    $titulos ="SENAGUA";
                }else{
                    $titulos = "Otras Instituciones";
                }
            
                if($enableCreate == TRUE){
                    
                    
                    echo Html::button($nomactividad, 
                    ['value' =>Url::to(['cda/cdareporteinformacion/createinstitucionapoyo',
                        'labelmiga'=>$labelmiga,
                        'id_cda_tramite'=>$id_cda_tramite,
                        'id_cproceso'=>$id_cproceso,
                        'actividadactual'=>$actividadactual,
                        'tipo'=>$tipo, 'pscactividadproceso'=>$id_cactividad_proceso]), 'title' => 'Registrar Datos '.$titulos,
                     'class' => 'showModalButton btn btn-success']); 
                    
                    
                    
                }
            ?>
           </p>
           
           <?php //echo print_r($dataProvider); ?>
    
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                      //  ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'psCodCda.cod_cda',
                            'value' => 'psCodCda.cod_cda',
                            'label'=>'Cod. CDA'
                        ],
                        [
                            'attribute' => 'fdCoordenadas.x',
                            'value' => 'fdCoordenadas.x',
                            'label'=>'X '.$titulos,
                            'format'=>['decimal',2]
                        ],
                        [
                            'attribute' => 'fdCoordenadas.y',
                            'value' => 'fdCoordenadas.y',
                            'label'=>'Y '.$titulos,
                            'format'=>['decimal',2]
                        ],
                        [
                            'attribute' => 'fdCoordenadas.altura',
                            'value' => 'fdCoordenadas.altura',
                            'label'=>'Z '.$titulos,
                            'format'=>['decimal',2]
                        ],
                        [
                            'attribute' => 'abscisa',
                            'value' => 'abscisa',
                            'label'=>'Abscisa '.$titulos,
                            'format'=>['decimal',2]
                        ],
                        [
                            'attribute' => 'q_solicitado',
                            'value' => 'q_solicitado',
                            'label'=>'Q '.$titulos. '(l/s)',
                            'format'=>['decimal',2]
                        ],
                        [
                            'attribute' => 'fuente_solicitada',
                            'value' => 'fuente_solicitada',
                            'label'=>'Fuente '.$titulos
                        ],
                       [
                            'attribute' => 'idUsoSolicitado.nom_uso_solicitado',
                            'value' => 'idUsoSolicitado.nom_uso_solicitado',
                            'label'=>'Uso/Aprovechamiento Solicitado',
                        ],
                        [
                            'attribute' => 'idDestino.nom_destino',
                            'value' => 'idDestino.nom_destino',
                            'label'=>'Destino Solicitado',
                        ],
                        [
                            'attribute' => 'nom_subdestino',
                            'value' => 'idSubdestino.nom_subdestino',
                            'label'=>'Sudestino Solicitado',
                        ],
                        

                        [

                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acción',
                            'template' => '{update}',
                            'buttons' => [
                             
                               'update' => function ($url, $model) use ($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$id_cactividad_proceso) {
                                       $url2 = Url::toRoute(['cda/cdareporteinformacion/updateinstitucionapoyo','id' => $model->id_reporte_informacion,
                                                             'id_cda_tramite'=>$id_cda_tramite,
                                                             'id_cproceso'=>$id_cproceso,
                                                              'actividadactual'=>$actividadactual,
                                                              'labelmiga'=>$labelmiga,'tipo'=>'2','pscactividadproceso'=>$id_cactividad_proceso],true);
                                      
                                       return Html::button('<span class="glyphicon glyphicon-pencil"/>',  ['value'=>$url2,
                                                     'class' => 'btn btn-default btn-xs showModalButton','title'=>'Modificar Datos '
                                        ]);
                                }, //Primera columna encontrada id_reporte_informacion                  
                                'delete' => function($url, $model){
                                        $url2 = Url::toRoute(['cdareporteinformacion/deletep','id' => $model->id_reporte_informacion],true);
                                        return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                                'title' => Yii::t('app', 'Delete'),
                                                'data-method' => 'post',
                                                'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                                        ]);
                                }


                        ],


                    ],
                    ],
                ]); ?>
</div>
