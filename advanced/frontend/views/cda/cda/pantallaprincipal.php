<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\CdaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CDA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
   <div class="aplicativo table-responsive">
        <p>
            <?php

            if($botoncrear === TRUE){
                echo Html::button('Crear CDA', 
                ['value' =>Url::to(['cda/cda/create_cda']), 'title' => 'Crear CDA',
                'class' => 'showModalButton btn btn-success']);
            }
            
            echo Html::button("<span>Gestion Actividades</span>",
                                                ['class'=>'btn btn-default btn-xs',
                                                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/ps-cproceso/index_gestor','tipo'=>'1']) . "';",
                                                    'data-toggle'=>'Detalle Proceso',
                                                ]
                                            );

            ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'=> $searchModel,
            'options' => [
                'style'=>'overflow: auto; word-wrap: break-word;'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                'header' => 'Numero CDA',
                'attribute' => 'numero',
                //'format' => ['decimal', 2],
                ],
                [
                'header' => 'Estado',
                'attribute' => 'nom_eproceso',
                'filter'=> Html::activeDropDownList($searchModel, 
                            '_arrayidprocesos', 
                            ArrayHelper::map($listestados, 'id_eproceso', 'nom_eproceso'),   
                            ['class' => 'form-control', 'multiple' => true]
                            ),
                
                //'format' => ['decimal', 2],
                ],
                [
                'header' => 'Actividad',
                'attribute' => 'nom_actividad',
                'filter' => Html::activeDropDownList($searchModel, 
                            'nom_actividad', 
                            ArrayHelper::map($listactividades, 'id_actividad', 'nom_actividad'),   
                            ['class' => 'form-control', 'multiple' => false,'prompt' => '']
                            ),
                ],
                [
                'header' => 'Responsables',
                'attribute' => 'nombres',
                'filter' => Html::activeDropDownList($searchModel, 
                            'nombres', 
                            ArrayHelper::map($listresponsables, 'id_usuario', 'nombres'),   
                            ['class' => 'form-control', 'multiple' => false,'prompt' => '',
                                'options'=>(Yii::$app->user->identity->codRols[0]->cod_rol==1)? array(Yii::$app->user->identity->id_usuario=>array('selected'=>'selected')):'']
                            ),
                ],
                [
                'header' => 'Fecha Solicitud',    
                'attribute' => 'fecha_solicitud',
                            'format' =>  ['date', 'php:d-m-Y'],
                            'filter' => \yii\jui\DatePicker::widget(
                                                            ['language' => 'es', 
                                                            'model'=>$searchModel,
                                                            'dateFormat' => 'dd-MM-yyyy',
                                                            'class' => 'yii\grid\RangeFilter',
                                                            'attribute'=>'fecha_solicitud',
                                                            'clientOptions' => [
                                                                    'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
                                                                    'changeYear' => true,			//Permitir cambio de año
                                                                    'changeMonth' => true			//Permitir cambio de Mes
                                                            ]			
                                                            ]),
                            'options' => ['width' => '200']
                            ],
                [
                'header' => 'Fecha Ultima Actividad',    
                'attribute' => 'ult_fecha_actividad',
                            'format' =>  ['date', 'php:d-m-Y'],
                            'filter' => \yii\jui\DatePicker::widget(
                                                            ['language' => 'es', 
                                                            'model'=>$searchModel,
                                                            'dateFormat' => 'dd-MM-yyyy',
                                                            'class' => 'yii\grid\RangeFilter',
                                                            'attribute'=>'ult_fecha_actividad',
                                                            'clientOptions' => [
                                                                    'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
                                                                    'changeYear' => true,			//Permitir cambio de año
                                                                    'changeMonth' => true			//Permitir cambio de Mes
                                                            ]			
                                                            ]),
                            'options' => ['width' => '200']
                            ],

                [
                'header' => 'Fecha Ultimo Estado',      
                'attribute' => 'ult_fecha_estado',
                            'format' =>  ['date', 'php:d-m-Y'],
                            'filter' => \yii\jui\DatePicker::widget(
                                                            ['language' => 'es', 
                                                            'model'=>$searchModel,
                                                            'dateFormat' => 'dd-MM-yyyy',
                                                            'class' => 'yii\grid\RangeFilter',
                                                            'attribute'=>'ult_fecha_estado',
                                                            'clientOptions' => [
                                                                    'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
                                                                    'changeYear' => true,			//Permitir cambio de año
                                                                    'changeMonth' => true			//Permitir cambio de Mes
                                                            ]			
                                                            ]),
                            'options' => ['width' => '200']
                            ],

                [

                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'template' => ' {view} {estados} {pdf}',
                    'buttons' => [

                        'view' => function($url, $model){
                                    return Html::button("<span class='glyphicon glyphicon-eye-open' />",
                                                ['class'=>'btn btn-default btn-xs',
                                                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/detalleproceso/index','id_cda' => $model['id_cda']]) . "';",
                                                    'data-toggle'=>'Detalle Proceso',
                                                ]
                                            );

                        },

                        'estados' => function($url, $model){
                                    return Html::button("<span class='glyphicon glyphicon-hourglass' />",
                                                ['class'=>'btn btn-default btn-xs',
                                                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/ps-historico-estados/indexestados','id_cproceso' => $model['id_cproceso'],'tipo'=>'1']) . "';",
                                                    'data-toggle'=>'Detalle Proceso',
                                                ]
                                            );
                        },
                                
                        'pdf' => function($url, $model){
                                    return Html::button("<span class='glyphicon glyphicon-file' />",
                                                ['class'=>'btn btn-default btn-xs',
                                                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/cda/pdf','id_cda' => $model['id_cda']]) . "';",
                                                    'data-toggle'=>'Detalle Proceso',
                                                ]
                                            );
                        },        


                        /*'update' => function($url, $model){

                                    return Html::button("<span class='glyphicon glyphicon-pencil' />",
                                                ['class'=>'btn btn-default btn-xs',
                                                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['modulocda/update','id_cda' => $model['id_cda'],'tipo' =>1,'ult_id_actividad'=>$model['ult_id_actividad']]) . "';",
                                                    'data-toggle'=>'Detalle Proceso',
                                                ]
                                            );

                        },


                        'analisis' => function($url, $model){
                                    $url2 = Url::toRoute(['modulocda/analisis','id_cda' => $model['id_cda'],'id_cproceso' => $model['id_cproceso']],true);
                                    return Html::button('<span class="glyphicon glyphicon-pencil" />',  ['value'=>$url2,
                                         'class' => 'btn btn-default btn-xs showModalButton',
                                    ]);
                        },   */     





                    ],


                ],
            ],
        ]); ?>
   </div>
</div>
