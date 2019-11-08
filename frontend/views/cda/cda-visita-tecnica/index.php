<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => 'Cda', 'url' => ['cda/cda/pantallaprincipal']];

if($_labelmiga == 'cda/detalleproceso/index' or $_labelmiga == 'cda/cda/pantallaprincipal'){
    
     $_urlregresar = \Yii::$app->urlManager->createUrl(['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => $_labelmiga]);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Proceso', 'url' => ['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => $_labelmiga]];
   
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Gestor de Actividades', 'url' => ['cda/ps-cproceso/index_gestor', 'tipo' => '1']];
    $_urlregresar = \Yii::$app->urlManager->createUrl(['cda/ps-cproceso/index_gestor', 'tipo' => '1']);
}

$this->title = 'Visita Técnica';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-reporte-informacion-index">
    
    <?php
    if ($_labelmiga == 'cda/cda/pantallaprincipal') {
        echo Html::button('Regresar',
                        ['class' => 'btn btn-default btn-xs',
                            'onclick' => "window.location.href = '".\Yii::$app->urlManager->createUrl(['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => $_labelmiga])."';",
                            'data-toggle' => 'Regresar',
                        ]
                    );
    } else {
        echo Html::button('Regresar',
                        ['class' => 'btn btn-default btn-xs',
                            'onclick' => "window.location.href = '".\Yii::$app->urlManager->createUrl(['cda/ps-cproceso/index_gestor', 'tipo' => '1'])."';",
                            'data-toggle' => 'Regresar',
                        ]
                    );
    }

     Pjax::begin(['id' => 'visita']); ?>
    <h1 style="color:white;"><?= Html::encode($this->title); ?>

        <p style="display: inline-block;">
        <?php 

        if ($validaciones['agregar'] == true) {
            echo
                Html::button('Agregar',
                ['value' => Url::to(['cda/cda-visita-tecnica/create', 'id_cda' => $id_cda, 'id_cactividad_proceso' => $id_cactividad_proceso]), 'title' => 'Nuevo Datos Visita Tecnica',
                'class' => 'showModalButton btn btn-success', ]);
        }
        ?>
    </p>
    </h1>
    <div class="aplicativo table responsive">
   <table class="table table-bordered">
            <tr>
                <td class="datosbasicos1"> Número CDA </td>
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
                <td class="datosbasicos1"> Número de Quipux Arca </td>
                <td class="datosbasicos2"><?= $encabezado[0]['arca']; ?></td>
                <td class="datosbasicos1"> Enviado por: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['enviadopor']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Número de Quipux Senagua </td>
                <td class="datosbasicos2"><?= $encabezado[0]['senagua']; ?></td>
                <td class="datosbasicos1"> En calidad de: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['encalidade']; ?></td>
            </tr>
            
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2"><?= $encabezado[0]['usuario_accion']; ?></td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2"><?= $encabezado[0]['fecha_solicitud']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha Última Actividad </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_actividad']; ?></td>
                <td class="datosbasicos1"> Fecha Último Estado </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_estado']; ?></td>
            </tr>
        </table>

    <?= GridView::widget([
        'dataProvider' => $dataProviderVisitaTecnica,
        'filterModel' => $searchModelVisitaTecnica,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Tipo fuente observados',
                'attribute' => 'nomtfuente',
                'filter' => yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->asArray()->all(), 'id_tfuente', 'nom_tfuente'),
            ],
            [
                'label' => 'Subtipo fuente observados',
                'attribute' => 'nomsubtfuente',
                'filter' => yii\helpers\ArrayHelper::map(\common\models\cda\CdaSubtipoFuente::find()->asArray()->all(), 'id_subtfuente', 'nom_subtfuente'),
            ],
             [
                 'label' => 'Uso/Aprovechamiento observados',
                'attribute' => 'nomusosolicitado',
                'filter' => yii\helpers\ArrayHelper::map(\common\models\cda\CdaUsoSolicitado::find()->asArray()->all(), 'id_uso_solicitado', 'nom_uso_solicitado'),
            ],
            [
                'label' => 'Destino observados',
                'attribute' => 'nomdestino',
                'filter' => yii\helpers\ArrayHelper::map(\common\models\cda\CdaDestino::find()->asArray()->all(), 'id_destino', 'nom_destino'),
            ],
            [
                'label' => 'Fuente observados',
                'attribute' => 'fuente_solicitada',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => '  {update} ',
                'visibleButtons' => [
                    'update' => $validaciones['editar'], // or whatever condition
                ],
                'buttons' => [
                    'update' => function ($url, $model) use ($_labelmiga) {
                        return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>', ['value' => Url::toRoute(['cda/cda-visita-tecnica/update', 'id' => $model->id_reporte_informacion, '_labelmiga' => $_labelmiga]),'title'=>'Modificar Visita Tecnica',
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado
                ],
            ],
        ],
    ]); ?>
    </div>
    
    <?php Pjax::end(); ?>

    
    <?php Pjax::begin(['id' => 'coordenadas']); ?>
    
    <h1 style="color:white;"><?= Html::encode('Coordenadas'); ?>
    
      <p style="display: inline-block;">
           <?php if ($validaciones['editarC'] == true) {
        echo
                 Html::button('Agregar',
                ['value' => Url::to(['cda/cda-visita-tecnica/createcoordenadas', 'id_cda' => $id_cda, 'id_cactividad_proceso' => $id_cactividad_proceso, 'id_reporte_informacion' => $id_reporte_informacion, '_labelmiga' => $_labelmiga]), 'title' => 'Coordenadas',
                'class' => 'showModalButton btn btn-success', ]);
    } ?>
      </p>
    </h1>
    
   <div class="aplicativo table responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProviderCoordenadas,
        'filterModel' => $searchModelCoordenadas,
        'id' => 'informacion_senagua',
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],
            ['label' => 'x observados',
               'attribute' => 'x',
            ],
            ['label' => 'y observados',
               'attribute' => 'y',
            ],
            ['label' => 'Altitud observados',
               'attribute' => 'altura',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => '  {update} ',
                'visibleButtons' => [
                    'update' => $validaciones['editarC'], // or whatever condition
                ],
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>', ['value' => Url::toRoute(['cda/cda-visita-tecnica/updatecoordenadas', 'id' => $model->id_reporte_informacion]),
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado
            ],
    ],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>

    
</div>
