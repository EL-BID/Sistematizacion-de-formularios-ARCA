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
        'nombre_entidad', 
        'nom_formato', 
        'nom_adm_estado', 

        [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{download}',
        'buttons' => [
                'download' => function ($url,$model) {
                    if($model['id_tipo_view_formato']==2){
                        $url2 = Url::toRoute(['dashboard/index','id_rpta' => $model['id_conjunto_respuesta'],'id_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last'=>$model['ult_id_version'] ],true);
                    }else if($model['id_tipo_view_formato']==1){
                         $url2 = Url::toRoute(['detalleformato/index','id_rpta' => $model['id_conjunto_respuesta'],'id_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last-version'=>$model['ult_id_version'] ],true);
                    }else if($model['id_tipo_view_formato']==3){
                        $url2 = Url::toRoute(['listado/capitulos','id_rpta' => $model['id_conjunto_respuesta'],'id_prta'=>$model['id_conjunto_pregunta'],'id_fmt'=>$model['id_formato'],'last-version'=>$model['ult_id_version'] ],true);
                    }
                    
                    return Html::a(
                        '<span class="glyphicon glyphicon-arrow-download">Ver</span>',
                        $url2, 
                        [
                            'title' => 'Ver',
                            'data-confirm' => Yii::t('yii', 'Accediendo al Dashboard::'.$url2),
                            'data-method' => 'post',
                        ]
                    );
                },
            ],
        ],
    ],
    
    ]); ?> 


