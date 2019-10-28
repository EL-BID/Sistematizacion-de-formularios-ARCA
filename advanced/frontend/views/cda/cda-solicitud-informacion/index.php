<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\CdaSolicitudInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => 'Cda', 'url' => ['cda/cda/pantallaprincipal']];
$this->params['breadcrumbs'][] = ['label' => 'Tramite', 'url' => [$labelmiga, 'id_cda_tramite' => $id_cda_tramite, 'labelmiga' => $labelmiga]];


$this->title = 'CDA Solicitud Información';
$this->params['breadcrumbs'][] = $this->title;

$regresarurl = 'cda/cdatramite/subproceso';
$_urlregresar = \Yii::$app->urlManager->createUrl([$regresarurl, 'id_cda_tramite' => $id_cda_tramite, 'labelmiga' => $labelmiga]);

?>
<div class="cda-solicitud-informacion-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="aplicativo table-responsive">
        
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
            <?= $encabezado ?>
            
           <p>
            <?= Html::button('Agregar Solicitud Información', 
                ['value' =>Url::to(['cda/cda-solicitud-informacion/create','id_cda_tramite'=>$id_cda_tramite,'id_cactividad_proceso'=>$id_cactividad_proceso,'labelmiga'=>$labelmiga]), 'title' => 'Crear Solicitud Información',
                'class' => 'showModalButton btn btn-success']); ?>
           </p>
          
          
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                   // ['class' => 'yii\grid\SerialColumn'],
                    
                    [
                    'header' => 'Información Faltante',
                    'attribute' => 'idTinfoFaltante.nom_tinfo_faltante',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Información Solicitada a',
                    'attribute' => 'idTreporte.nom_treporte',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Tipo de Atención',
                    'attribute' => 'idTatencion.nom_tatencion',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Observaciones',
                    'attribute' => 'observaciones',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Oficio de Atención',
                    'attribute' => 'oficio_atencion',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Fecha de Atención',
                    'attribute' => 'fecha_atencion',
                    //'format' => ['decimal', 2],
                    ],
                   
                   
                    
                    // 'observaciones',
                    // 'oficio_atencion',
                    // 'fecha_atencion',
                    // 'id_cda',
                    // 'id_trespuesta',
                    // 'observaciones_res',
                    // 'oficio_respuesta',
                    // 'fecha_respuesta',
                    // 'id_cactividad_proceso_res',

                    [

                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Acción',
                        'template' => '  {delete}',
                       // 'template' => ' {view} {update} {delete}',
                        'buttons' => [
             
                            'delete' => function($url, $model) use ($id_cda_tramite,$id_cactividad_proceso,$labelmiga,$id_cproceso,$actividadactual){
                                      $url2 = Url::toRoute(['cda/cda-solicitud-informacion/deletep','id' => $model['id_solicitud_info'],'id_cda_tramite'=>$id_cda_tramite,'id_cactividad_proceso'=>$id_cactividad_proceso,'labelmiga'=>$labelmiga,'id_cproceso'=>$id_cproceso,'actividadactual'=>$actividadactual],true);
                                      return Html::button("<span class='glyphicon glyphicon-trash' />",
                                            ['class'=>'btn btn-default btn-xs',
                                               // 'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cdasolicitudinformacion/deletep','id' => $model['id_solicitud_info'],'id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]) . "';",
                                                'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'.'::'.$url2),
                                            ]
                                        );
                                  
                            }


                    ],


                ],
                ],
            ]); ?>
    </div>
</div>
