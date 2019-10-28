<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\CdaSolicitudInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => 'Cda', 'url' => ['cda/cda/pantallaprincipal']];

if($_labelmiga == 'cda/detalleproceso/index' or $_labelmiga == 'cda/cda/pantallaprincipal'){
    
     $_urlregresar = \Yii::$app->urlManager->createUrl(['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => $_labelmiga]);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Proceso', 'url' => ['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => $_labelmiga]];
   
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Gestor de Actividades', 'url' => ['cda/ps-cproceso/index_gestor', 'tipo' => '1']];
    $_urlregresar = \Yii::$app->urlManager->createUrl(['cda/ps-cproceso/index_gestor', 'tipo' => '1']);
}

$this->title = 'Respuesta Solicitud';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-solicitud-informacion-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="aplicativo table-responsive">
        
            <!----------------------------------Boton de Regresar---------------------------->
            <table>
                <tr>
                    <td>
                       <?php echo Html::button("Regresar",
                            ['class'=>'btn btn-default btn-xs',
                                'onclick'=>"window.location.href = '" .$_urlregresar . "';",
                                'data-toggle'=>'Regresar'
                            ]
                        ); ?>
                    </td>
                    <td>
                        <?php /*Html::button('Agregar Solicitud Informacion', 
                            ['value' =>Url::to(['cda/cda-solicitud-informacion/create','id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]), 'title' => 'Create Cda Solicitud Informacion',
                            'class' => 'showModalButton btn btn-success']); */?>
                    </td>
                </tr>
            </table>
            
            <p>&nbsp;</p>
            <!----------------------------Encabezado de CDA---------------------------------->
           <!----------------------------------Encabezado------------------------------------>
        <table class="table table-bordered">
            <tr>
                <td class="datosbasicos1"> Numero CDA </td>
                <td class="datosbasicos2">
                    <table width="100%">
                        <tr>
                            <td width="50%"><?= $encabezado[0]['numero']; ?></td>
                        </tr>
                    </table>
                </td>
                <td class="datosbasicos1"> Fecha Ingreso </td>
                <td class="datosbasicos2"><?= $encabezado[0]['fecha_ingreso'];  ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Numero de Quipux Arca </td>
                <td class="datosbasicos2"><?= $encabezado[0]['arca']; ?></td>
                <td class="datosbasicos1"> Enviado por: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['enviadopor']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Numero de Quipux Senagua </td>
                <td class="datosbasicos2"><?= $encabezado[0]['senagua']; ?></td>
                <td class="datosbasicos1"> Rol: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['nom_cda_rol']; ?></td>
            </tr>
            
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2"><?= $encabezado[0]['usuario_accion']; ?></td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2"><?= $encabezado[0]['fecha_solicitud']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha Ultima Actividad </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_actividad']; ?></td>
                <td class="datosbasicos1"> Fecha Ultimo Estado </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_estado']; ?></td>
            </tr>
        </table>   
            
           
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    
                    [
                    'header' => 'Informacion Faltante',
                    'attribute' => 'idTinfoFaltante.nom_tinfo_faltante',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Informacion Solicitada a',
                    'attribute' => 'idTreporte.nom_treporte',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Tipo de Atención',
                    'attribute' => 'idTatencion.nom_tatencion',
                    //'format' => ['decimal', 2],
                    ],
                     [
                    'header' => 'Tipo de Respuesta',
                    'attribute' => 'idTrespuesta.nom_tatencion',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Oficio de Respuesta',
                    'attribute' => 'oficio_respuesta',
                    //'format' => ['decimal', 2],
                    ],
                    [
                    'header' => 'Fecha de Respuesta',
                    'attribute' => 'fecha_respuesta',
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
                        'header' => 'Action',
                        'template' => '  {update}',
                       // 'template' => ' {view} {update} {delete}',
                        'buttons' => [
                           /* 'view' => function($url, $model){
                                    return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                            'title' => Yii::t('app', 'View'),
                                            'data-method' => 'post',
                                    ]);
                            },*/
                            'update' => function ($url, $model) use ($id_cda,$id_cactividad_proceso,$_labelmiga) {
                                    $url2 = Url::toRoute(['cda/cda-solicitud-informacion/update','id' => $model['id_solicitud_info'],'id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso,'_labelmiga'=>$_labelmiga],true);
                                    return Html::button('<span class="glyphicon glyphicon-pencil" />',  ['value'=>$url2,
                                                 'class' => 'btn btn-default btn-xs showModalButton',
                                                 'title' => 'Respuesta Solicitud',
                                    ]);
                            }, //Primera columna encontrada id_solicitud_info                   
                           /* 'delete' => function($url, $model) use ($id_cda,$id_cactividad_proceso){
                
                                      return Html::button("<span class='glyphicon glyphicon-trash' />",
                                            ['class'=>'btn btn-default btn-xs',
                                                'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cdasolicitudinformacion/deletep','id' => $model['id_solicitud_info'],'id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]) . "';",
                                                'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                                            ]
                                        );
                                  
                            }*/


                    ],


                ],
                ],
            ]); ?>
    </div>
</div>
