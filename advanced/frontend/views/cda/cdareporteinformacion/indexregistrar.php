<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registrar Datos Certificados';
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
                    echo Html::button('Registrar Datos Certificados',
                    ['value' => Url::to(['cda/cdareporteinformacion/createregistrar',
                        'labelmiga' => $labelmiga,
                        'id_cda_tramite' => $id_cda_tramite,
                        'id_cproceso' => $id_cproceso,
                        'actividadactual' => $actividadactual,
                        'tipo' => $tipo, 'pscactividadproceso' => $id_cactividad_proceso, ]), 'title' => 'Registrar Datos Certificados',
                     'class' => 'showModalButton btn btn-success', ]);
                }
            ?>
           </p>
           
           <?php //echo print_r($dataProvider);?>
    
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                   //     ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'psCodCda.cod_cda',
                            'value' => 'psCodCda.cod_cda',
                            'label' => 'Cod. CDA',
                        ],
                        [
                            'attribute' => 'fdCoordenadas.x',
                            'value' => 'fdCoordenadas.x',
                            'label' => 'X Cert.',
                            'format' => ['decimal', 2],
                        ],
                        [
                            'attribute' => 'fdCoordenadas.y',
                            'value' => 'fdCoordenadas.y',
                            'label' => 'Y Cert.',
                             'format' => ['decimal', 2],
                        ],
                        [
                            'attribute' => 'abscisa',
                            'value' => 'abscisa',
                            'label' => 'Abscisa Cert.',
                            'format' => ['decimal', 2],
                        ],
                        [
                            'attribute' => 'codProvincia.nombre_provincia',
                            'value' => 'codProvincia.nombre_provincia',
                            'label' => 'Provincia Cert.',
                        ],
                        [
                            'attribute' => 'codCanton.nombre_canton',
                            'value' => 'codCanton.nombre_canton',
                            'label' => 'Canton Cert.',
                        ],
                        [
                            'attribute' => 'codParroquia.altura',
                            'value' => 'codParroquia.nombre_parroquia',
                            'label' => 'Parroquia Cert.',
                        ],
                        [
                            'attribute' => 'sector_solicitado',
                            'value' => 'sector_solicitado',
                            'label' => 'Sector Cert.',
                        ],
                        [
                            'attribute' => 'fuente_solicitada',
                            'value' => 'fuente_solicitada',
                            'label' => 'Fuente',
                        ],
                        [
                            'attribute' => 'idTfuente.nom_tfuente',
                            'value' => 'idTfuente.nom_tfuente',
                            'label' => 'Tipo Fuente Sol.',
                        ],
                        [
                            'attribute' => 'q_solicitado',
                            'value' => 'q_solicitado',
                            'label' => 'Q Cert.',
                            'format' => ['decimal', 2],
                        ],
                        [
                            'attribute' => 'idUsoSolicitado.nom_uso_solicitado',
                            'value' => 'idUsoSolicitado.nom_uso_solicitado',
                            'label' => 'Uso/Aprovechamiento Cert.',
                        ],
                        [
                            'attribute' => 'idDestino.nom_destino',
                            'value' => 'idDestino.nom_destino',
                            'label' => 'Destino Cert.',
                        ],
                        [
                            'attribute' => 'nom_subdestino',
                            'value' => 'idSubdestino.nom_subdestino',
                            'label'=>'Sudestino Solicitado',
                        ],
                        [
                            'attribute' => 'proba_excedencia_certificado',
                            'value' => 'proba_excedencia_certificado',
                            'label' => 'Probabilidad Exce. Cert.',
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acción',
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model) use ($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$id_cactividad_proceso) {
                                       $url2 = Url::toRoute(['cda/cdareporteinformacion/updateregistrar','id' => $model->id_reporte_informacion,
                                                             'id_cda_tramite'=>$id_cda_tramite,
                                                             'id_cproceso'=>$id_cproceso,
                                                              'actividadactual'=>$actividadactual,
                                                              'labelmiga'=>$labelmiga,'tipo'=>'2','pscactividadproceso'=>$id_cactividad_proceso],true);
                                      
                                       return Html::button('<span class="glyphicon glyphicon-pencil"/>',  ['value'=>$url2,
                                                     'class' => 'btn btn-default btn-xs showModalButton','title'=>'Modificar Datos Certificados '
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
