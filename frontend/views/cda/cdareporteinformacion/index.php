<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos Técnicos de la Solicitud';
$this->params['breadcrumbs'][] = $this->title;

//Atrayendo pagina inmediatamente anterior
$regresarurl = 'cda/cdatramite/subproceso';
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
                       <?php echo Html::button('Continuar',
                            ['class' => 'btn btn-default btn-xs',
                                'onclick' => "window.location.href = '".$_urlregresar."';",
                                'data-toggle' => 'Regresar',
                            ]
                        ); ?>
                    </td>
                </tr>
            </table>
            

           <!----------------------------------Encabezado------------------------------------>
            <?= $encabezado; ?>
  
           
           <p>
            <?php

                if ($enableCreate == true) {
                    echo Html::button('Registrar Datos Técnicos',
                    ['value' => Url::to(['cda/cdareporteinformacion/create',
                        'labelmiga' => $labelmiga,
                        'id_cda_tramite' => $id_cda_tramite,
                        'id_cproceso' => $id_cproceso,
                        'actividadactual' => $actividadactual,
                        'tipo' => $tipo, 'pscactividadproceso' => $id_cactividad_proceso, ]), 'title' => 'Registrar Datos Técnicos',
                     'class' => 'showModalButton btn btn-success', ]);
                }
            ?>
           </p>
           
           <?php //echo print_r($dataProvider);?>
    
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                  //      ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'psCodCda.cod_cda',
                            'value' => 'psCodCda.cod_cda',
                            'label' => 'Cod. CDA',
                        ],
                        [
                            'attribute' => 'fdCoordenadas.x',
                            'value' => 'fdCoordenadas.x',
                            'label' => 'X',
                            'format' => ['decimal',2] 
                            
                        ],
                        [
                            'attribute' => 'fdCoordenadas.y',
                            'value' => 'fdCoordenadas.y',
                            'label' => 'Y',
                             'format' => ['decimal', 2],
                        ],
                        [
                            'attribute' => 'fdCoordenadas.altura',
                            'value' => 'fdCoordenadas.altura',
                            'label' => 'Z',
                            'format' => ['decimal', 2],
                        ],
                        [
                            'attribute' => 'codProvincia.nombre_provincia',
                            'value' => 'codProvincia.nombre_provincia',
                            'label' => 'Provincia',
                        ],
                        [
                            'attribute' => 'codCanton.nombre_canton',
                            'value' => 'codCanton.nombre_canton',
                            'label' => 'Canton',
                        ],
                        [
                            'attribute' => 'codParroquia.altura',
                            'value' => 'codParroquia.nombre_parroquia',
                            'label' => 'Parroquia',
                        ],
                        [
                            'attribute' => 'sector_solicitado',
                            'value' => 'sector_solicitado',
                            'label' => 'Sector',
                        ],
                        [
                            'attribute' => 'fuente_solicitada',
                            'value' => 'fuente_solicitada',
                            'label' => 'Fuente',
                        ],
                        [
                            'attribute' => 'idTfuente.nom_tfuente',
                            'value' => 'idTfuente.nom_tfuente',
                            'label' => 'Tipo Fuente',
                        ],
                        [
                            'attribute' => 'idSubtfuente.nom_subtfuente',
                            'value' => 'idSubtfuente.nom_subtfuente',
                            'label' => 'Subtipo Fuente',
                        ],
                        [
                            'attribute' => 'idCaracteristica.nom_caracteristica',
                            'value' => 'idCaracteristica.nom_caracteristica',
                            'label' => 'Caracteristica',
                        ],
                        [
                            'attribute' => 'q_solicitado',
                            'value' => 'q_solicitado',
                            'label' => 'Q Solicitado',
                            'format' => ['decimal', 2],
                        ],
                        [
                            'attribute' => 'idUsoSolicitado.nom_uso_solicitado',
                            'value' => 'idUsoSolicitado.nom_uso_solicitado',
                            'label' => 'Uso/Aprovechamiento Solicitado',
                        ],
                        [
                            'attribute' => 'idDestino.nom_destino',
                            'value' => 'idDestino.nom_destino',
                            'label' => 'Destino Solicitado',
                        ],
                        [
                            'attribute' => 'id_subdestino',
                            'value' => 'idSubdestino.nom_subdestino',
                            'label'=>'Sudestino Solicitado',
                        ],
                        [
                            'attribute' => 'tiempo_years',
                            'value' => 'tiempo_years',
                            'label' => 'Tiempo (Años)',
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acción',
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model) use ($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$id_cactividad_proceso) {
                                       $url2 = Url::toRoute(['cda/cdareporteinformacion/update','id' => $model->id_reporte_informacion,
                                                             'id_cda_tramite'=>$id_cda_tramite,
                                                             'id_cproceso'=>$id_cproceso,
                                                              'actividadactual'=>$actividadactual,
                                                              'labelmiga'=>$labelmiga,'tipo'=>'2','pscactividadproceso'=>$id_cactividad_proceso],true);
                                      
                                       return Html::button('<span class="glyphicon glyphicon-pencil"/>',  ['value'=>$url2,
                                                     'class' => 'btn btn-default btn-xs showModalButton','title'=>'Modificar Datos '
                                        ]);
                                }, //Primera columna encontrada id_reporte_informacion
                                'delete' => function ($url, $model) {
                                    $url2 = Url::toRoute(['cdareporteinformacion/deletep', 'id' => $model->id_reporte_informacion], true);

                                    return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>', $url2, [
                                                'title' => Yii::t('app', 'Delete'),
                                                'data-method' => 'post',
                                                'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                                        ]);
                                },
                            ],
                    ],
                    ],
                ]); ?>
</div>
