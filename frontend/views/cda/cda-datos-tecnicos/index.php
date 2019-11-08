<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos Técnicos de la Solicitud';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-reporte-informacion-index">
<!----------------------------------Boton de Regresar---------------------------->
        <?php echo Html::button("Regresar",
                ['class'=>'btn btn-default btn-xs',
                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/cda/pantallaprincipal']) . "';",
                    'data-toggle'=>'Regresar'
                ]
            ); ?>
            
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
                <td class="datosbasicos2"><?= $encabezado[0]['fecha_ingreso'];  ?></td>
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

    <?php Pjax::begin(['id' => 'datos']); ?>
    <h1 style="color:white;"><?= Html::encode($this->title) ?>
        <p style="display: inline-block;">
        <?php if($validaciones['editar'] == TRUE){ echo
        Html::button('Agregar', 
        ['value' =>Url::to(['cda/cda-datos-tecnicos/create','id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]), 'title' => 'Nuevo Datos Técnicos de la Solicitud',
        'class' => 'showModalButton btn btn-success']);
        } ?>
    </p>
    </h1>
   
<div class="aplicativo">
    <?= GridView::widget([
        'dataProvider' => $dataProviderReporteInformacion,
        'filterModel' => $searchModelReporteInformacion,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'longitud',
            'latitud',
            'altura',
            'nomprovincia',
            'nomcanton',
            'nomparroquia',
            'sector_solicitado',
            'fuente_solicitada',
            [
            'attribute' =>'nomtfuente',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->asArray()->all(), 'id_tfuente', 'nom_tfuente'),
            ],
            [
                'attribute' =>'nomsubtfuente',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaSubtipoFuente::find()->asArray()->all(), 'id_subtfuente', 'nom_subtfuente'),
            ],
            [
                'attribute' =>'caracteristica',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaCaracteristica::find()->asArray()->all(), 'id_caracteristica', 'nom_caracteristica'),
            ],
            'q_solicitado',
             [
                'attribute' =>'nomusosolicitado',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaUsoSolicitado::find()->asArray()->all(), 'id_uso_solicitado', 'nom_uso_solicitado'),
            ],
            [
                'attribute' =>'nomdestino',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaDestino::find()->asArray()->all(), 'id_destino', 'nom_destino'),
            ],

            'tiempo_years',
            
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => '  {update} ',
                'visibleButtons' => [
                    'update' => $validaciones['editar'], // or whatever condition
                    
                ],
                'buttons' => [
                  
                    'update' => function ($url, $model) {

                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>Url::toRoute(['cda/cda-datos-tecnicos/update','id' => $model->id_reporte_informacion]),
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado                                          
                                        
                ],
			
			
            ],
        ],
    ]); ?>
    </div>
    
    <?php Pjax::end(); ?>

    
    <?php Pjax::begin(['id' => 'senagua']); ?>
    
    <h1 style="color:white;"><?= Html::encode('Información SENAGUA') ?>
    
      <p style="display: inline-block;">
           <?php if($validaciones['editar'] == TRUE){ echo
                 Html::button('Agregar', 
                ['value' =>Url::to(['cda/cda-datos-tecnicos/createsenagua','id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]), 'title' => 'Información SENAGUA',
                'class' => 'showModalButton btn btn-success']); 
           } ?>
      </p>
    </h1>
    
   <div class="aplicativo">
    <?= GridView::widget([
        'dataProvider' => $dataProviderInformacionSenagua,
        'filterModel' => $searchModelInformacionSenagua,
        'id' => 'informacion_senagua',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['label' => 'Longitud SENAGUA',
               'attribute' => 'longitud',
            ],
            ['label' => 'Abscisa SENAGUA',
               'attribute' => 'abscisa',
            ],
            ['label' => 'Q SENAGUA (l/s)',
               'attribute' => 'q_solicitado',
            ],
            ['label' => 'Fuente SENAGUA',
               'attribute' => 'nomtfuente',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->asArray()->all(), 'id_tfuente', 'nom_tfuente'),
            ],
            ['label' => 'Uso/Aprovechamiento SENAGUA',
               'attribute' => 'nomusosolicitado',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaUsoSolicitado::find()->asArray()->all(), 'id_uso_solicitado', 'nom_uso_solicitado'),
            ],
              ['label' => 'Destino SENAGUA',
               'attribute' => 'nomdestino',
               'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaDestino::find()->asArray()->all(), 'id_destino', 'nom_destino'),
            ],
            
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => '  {update} ',
                'visibleButtons' => [
                    'update' => $validaciones['editar'], // or whatever condition
                    
                ],
                'buttons' => [
                  
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>Url::toRoute(['cda/cda-datos-tecnicos/updatesenagua','id' => $model->id_reporte_informacion]),
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado                    
                    
                                        
            ],
			
			
	],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
    
    <?php Pjax::begin(['id' => 'epa']); ?>
     <h1 style="color:white;"><?= Html::encode('Información EPA') ?>
     
         <p style="display: inline-block;">
              <?php if($validaciones['editar'] == TRUE){ echo
                Html::button('Agregar', 
                ['value' =>Url::to(['cda/cda-datos-tecnicos/createepa','id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]), 'title' => 'Información EPA',
                'class' => 'showModalButton btn btn-success']);
               } ?>
    </p>
     </h1>


    <div class="aplicativo">
    <?= GridView::widget([
        'dataProvider' => $dataProviderInformacionEpa,
        'filterModel' => $searchModelInformacionEpa,
        'id' => 'informacion_epa',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['label' => 'Longitud SENAGUA',
               'attribute' => 'longitud',
            ],
            ['label' => 'Longitud EPA',
               'attribute' => 'latitud',
            ],
            ['label' => 'Altura EPA',
               'attribute' => 'altura',
            ],
            ['label' => 'Abscisa EPA',
               'attribute' => 'abscisa',
            ],
            ['label' => 'Q EPA (l/s)',
               'attribute' => 'q_solicitado',
            ],
            ['label' => 'Fuente EPA',
               'attribute' => 'id_tfuente',
            ],
            ['label' => 'Uso/Aprovechamiento EPA',
               'attribute' => 'nomusosolicitado',
            ],
            ['label' => 'Destino EPA',
               'attribute' => 'nomdestino',
            ],

            
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => '  {update} ',
                'visibleButtons' => [
                    'update' => $validaciones['editar'], // or whatever condition
                    
                ],
                'buttons' => [
                  
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>Url::toRoute(['cda/cda-datos-tecnicos/updateepa','id' => $model->id_reporte_informacion]),
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado                                         
                                        
            ],
					
	],
        ],
    ]); ?>
    </div>
    
        <?php Pjax::end(); ?>
   
    
    <?php Pjax::begin(['id' => 'errores']); ?>
     <h1 style="color:white;"><?= Html::encode('Errores Identificados') ?>
     
         <p style="display: inline-block;">
              <?php if($validaciones['editar'] == TRUE){ echo
                Html::button('Agregar', 
                ['value' =>Url::to(['cda/cda-errores/createinformacion','id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]), 'title' => 'Información EPA',
                'class' => 'showModalButton btn btn-success']);
               } ?>
    </p>
    
         
     </h1>


    <?= GridView::widget([
        'dataProvider' => $dataProviderCdaErrores,
        'filterModel' => $searchModelCdaErrores,
        'id' => 'errores_identificados',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'observaciones',
            'id_terror',
            
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => '  {update} ',
                 'visibleButtons' => [
                    'update' => $validaciones['editar'], // or whatever condition
                    
                ],
                'buttons' => [
                  
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>Url::toRoute(['cda/cda-errores/update','id' => $model->id_error]),
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado                    
                     
                ],
	
            ],
        ],
    ]); ?>
    
    <?php Pjax::end(); ?>
</div>
