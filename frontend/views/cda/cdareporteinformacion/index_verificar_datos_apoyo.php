<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verificar Datos de Apoyo';
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
                    echo Html::button('Verificar Datos de Apoyo',
                    ['value' => Url::to(['cda/cdareporteinformacion/createverificar',
                        'labelmiga' => $labelmiga,
                        'id_cda_tramite' => $id_cda_tramite,
                        'id_cproceso' => $id_cproceso,
                        'actividadactual' => $actividadactual,
                        'tipo' => $tipo, 'pscactividadproceso' => $id_cactividad_proceso, ]), 'title' => 'Registrar Verificar Datos de Apoyo',
                     'class' => 'showModalButton btn btn-success', ]);
                }
            ?>
           </p>
           
           <?php //echo print_r($dataProvider);?>
    
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                       // ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'psCodCda.cod_cda',
                            'value' => 'psCodCda.cod_cda',
                            'label' => 'Cod. CDA',
                        ],
                        [
                            'attribute' => 'id_cda_institucion_apoyo',
                            'value' => 'cdaInstitucionApoyo.instituciones_apoyo',
                            'label' => 'Instituciones Apoyo',
                        ],
                        [
                            'attribute' => 'oficios_relacionados',
                            'value' => 'oficios_relacionados',
                            'label' => 'Oficios Relacionados',
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acción',
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model) use ($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$id_cactividad_proceso) {
                    
                                    $url2 = Url::toRoute(['cda/cdareporteinformacion/updateverificar','id' => $model->id_reporte_informacion,
                                                             'id_cda_tramite'=>$id_cda_tramite,
                                                             'id_cproceso'=>$id_cproceso,
                                                              'actividadactual'=>$actividadactual,
                                                              'labelmiga'=>$labelmiga,'tipo'=>'2','pscactividadproceso'=>$id_cactividad_proceso],true);
                                     
                                    
                                    return Html::button('<span class="glyphicon glyphicon-pencil" />', ['value' => $url2,
                                                     'class' => 'btn btn-default btn-xs showModalButton', 'title'=>'Modificar Verificación de Datos '
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
