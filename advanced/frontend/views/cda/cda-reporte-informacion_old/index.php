<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\CdaSolicitudInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => 'Cda', 'url' => ['cda/cda/pantallaprincipal']];

if($_labelmiga == 'cda/detalleproceso/index' or $_labelmiga == 'cda/cda/pantallaprincipal' ){
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Proceso', 'url' => ['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => 'cda/cda/pantallaprincipal']];
    $_urlregresar = \Yii::$app->urlManager->createUrl(['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => $_labelmiga]);
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Gestor de Actividades', 'url' => ['cda/ps-cproceso/index_gestor', 'tipo' => '1']];
    $_urlregresar = \Yii::$app->urlManager->createUrl(['cda/ps-cproceso/index_gestor', 'tipo' => '1']);
}



$vector_botones = [
                  //  ['class' => 'yii\grid\SerialColumn'],
                    [
                      'attribute'=>'fdCoordenadas.longitud',
                      'label'=>'Longitud',
                      'value' => 'fdCoordenadas.longitud',  
                    ],
                    [
                      'attribute'=>'fdCoordenadas.latitud',
                      'label'=>'Latitud',
                      'value' => 'fdCoordenadas.latitud',  
                    ],
                    [
                      'attribute'=>'fdCoordenadas.altura',
                      'label'=>'Altura',
                      'value' => 'fdCoordenadas.altura',  
                    ],
                    [
                      'attribute'=>'provincia.nombre_provincia',
                      'label'=>'Provincia',
                      'value' => 'provincia.nombre_provincia',  
                    ],
                    [
                      'attribute'=>'canton.nombre_canton',
                      'label'=>'Canton',
                      'value' => 'canton.nombre_canton',  
                    ],
                    [
                      'attribute'=>'parroquia.nombre_parroquia',
                      'label'=>'Parroquia',
                      'value' => 'parroquia.nombre_parroquia',  
                    ],
                    'sector_solicitado',
                    'fuente_solicitada',
                    'idTfuente.nom_tfuente',
                    'idSubtfuente.nom_subtfuente',
                    'idCaracteristica.nom_caracteristica',
                    'q_solicitado',
                    'idUsoSolicitado.nom_uso_solicitado',
                    'idDestino.nom_destino',
                    'tiempo_years',
                   ];

if($_botones == TRUE){
    
    $vector_botones[] = [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acción',
                            'template' => ' {actualizar} {decision}',
                            'buttons' => [
                                'actualizar' => function($url, $model) use ($id_cda,$id_cactividad_proceso,$_labelmiga){
                                        $url2 = Url::toRoute(['cda/cda-reporte-informacion/actualizar','id'=>$model->id_reporte_informacion,'id_cda' => $id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso,'_labelmiga'=>$_labelmiga],true);
                                        return Html::button('<span>Actualizar</span>',  ['value'=>$url2,
                                                     'class' => 'btn btn-default btn-xs showModalButton',
                                        ]);
                                },
                                'decision' => function ($url, $model) use ($id_cda,$id_cactividad_proceso,$_labelmiga){
                                        $url2 = Url::toRoute(['cda/cda-reporte-informacion/decision','id'=>$model->id_reporte_informacion,'id_cda' => $id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso,'_labelmiga'=>$_labelmiga],true);
                                        return Html::button('<span class="glyphicon glyphicon-pencil">Decision</span>',  ['value'=>$url2,
                                                     'class' => 'btn btn-default btn-xs showModalButton',
                                        ]);
                                }, //Primera columna encontrada sector_solicitado                    

                            ]
                        ];
}


$this->title = 'Registro Solicitud';
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
                                'onclick'=>"window.location.href = '" . $_urlregresar . "';",
                                'data-toggle'=>'Regresar'
                            ]
                        ); ?>
                    </td>
                    <!--<td>
                        <?= Html::button('Agregar Solicitud Informacion', 
                            ['value' =>Url::to(['cda/cda-reporte-informacion/create-reporte-informacion','id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso,'_labelmiga'=>$_labelmiga]), 'title' => 'Solicitud Información',
                            'class' => 'showModalButton btn btn-success']); ?>
                    </td>-->
                </tr>
            </table>
            
            <p>&nbsp;</p>
            <!----------------------------Encabezado de CDA---------------------------------->
           <!----------------------------------Encabezado------------------------------------>
            <table class="table table-bordered">
                <tr>
                    <td class="datosbasicos1"> Número Solicitud </td>
                    <td class="datosbasicos2">
                        <table width="100%">
                            <tr>
                                <td width="50%"><?= $encabezado[0]['numero']; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td class="datosbasicos1"> Fecha Ingreso </td>
                    <td class="datosbasicos2"><?= $encabezado[0]['fecha_ingreso']; ?></td>
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
        'filterModel' => $searchModel,
        'columns' => $vector_botones,
    ]); ?>
    </div>
</div>
