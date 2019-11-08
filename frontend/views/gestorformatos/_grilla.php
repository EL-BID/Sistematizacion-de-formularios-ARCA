<?php
    use yii\grid\GridView;
    use yii\helpers\Url;
    use yii\helpers\Html;
?>

<?= GridView::widget([ 
    'dataProvider' => $dataProvider,                       //Objeto de Datos 
    'layout'=>"{pager}\n{summary}\n{items}",        //Modelo de presentacion 
    'columns' => [                                  //Columnas a presentar
        ['class' => 'yii\grid\SerialColumn'],         
        'Entidad', 
        'Formato', 
        'Estado',
        'Digitador',
        [
        'class' => 'yii\grid\ActionColumn',
        'template' => ' {download} {formatohtml} ',
        'buttons' => [
                'download' => function ($url,$model) {
                    
                    //cREANDO URL PARA aceeso a Dashboard, detalle capitulo y listado capitulos
                    if($model['id_tipo_view_formato']==2){
                        $url2 = Url::toRoute(['dashboard/index','id_conj_rpta' => $model['id_conjunto_respuesta'],'id_conj_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'],'estado'=>$model['id_adm_estado']],true);
                        $_mensaje = "Accediendo al Dashboard";
                        
                    }else if($model['id_tipo_view_formato']==1){
                        
                        $url2 = Url::toRoute(['detcapitulo/genvistaformato','capitulo'=>'','id_conj_rpta' => $model['id_conjunto_respuesta'],'id_conj_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'],'estado'=>$model['id_adm_estado'],'provincia'=>$model['provincia'],'cantones'=>$model['cantones'],'parroquias'=>$model['parroquias'],'periodos'=>$model['periodos'],'antvista'=>'gestorformatos/index'],true);
                        $_mensaje = "Accediendo a Detalle Formato";
                        
                    }else if($model['id_tipo_view_formato']==3){
                        $url2 = Url::toRoute(['listcapitulos/index','id_conj_rpta' => $model['id_conjunto_respuesta'],'id_conj_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'],'estado'=>$model['id_adm_estado'],'provincia'=>$model['provincia'],'cantones'=>$model['cantones'],'parroquias'=>$model['parroquias'],'periodos'=>$model['periodos'],'antvista'=>'gestorformatos/index' ],true);
                        $_mensaje = "Accediendo a Listado Capitulo";
                        
                    }
                    
                    if($model['id_tipo_view_formato']<=3 and $model['p_ejecutar']=='S'){
                        return Html::a(
                            '<span class="glyphicon glyphicon-chevron-right"></span> Ver',
                            $url2, 
                            [
                                'title' => 'Ver',
                                'data-confirm' => Yii::t('yii', $_mensaje.'::'.$url2),
                                'data-method' => 'post',
                            ]
                        );
                    }
                    
                    
                },
                        
                'formatohtml' => function($url,$model){
                    //Creando url para acceso al formato HTML
                    $_urlhtml = Url::toRoute(['detformato/genhtml','id_conj_rpta' => $model['id_conjunto_respuesta'],'id_conj_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'],'estado'=>$model['id_adm_estado']],true);
                    $_mensaje = "Accediendo a la vista HTML";
                    return Html::a(
                           '<span class="glyphicon glyphicon-file"></span> Formato',
                           $_urlhtml, 
                           [
                               'title' => 'Formato',
                               'data-confirm' => Yii::t('yii', $_mensaje.'::'.$_urlhtml),
                               'data-method' => 'post',
                           ]
                       );
                    
                }       
            ],
        ],
    ],
    
    ]); 
                
    ?> 


