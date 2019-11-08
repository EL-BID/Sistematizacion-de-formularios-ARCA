<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdRespuestaXMesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $numerar.' '.$nom_prta;
if(!empty($capitulo)){
    $_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>$capitulo,'cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus' => $focus) ;
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
}else{
    $_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>'','cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus' => $focus) ;
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Formato', 'url' => $_urlmiga];
}

//$_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>$capitulo,'cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista) ;
//$this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-respuesta-xmes-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?= ($btnadd === TRUE )? Html::button('Adicionar', 
        ['value' =>Url::to(['fdrespuestaxmes/createdetcapitulo',
                            'id_fmt'=>$id_fmt,
                            'id_version'=>$id_version,
                            'id_conj_prta'=>$id_conj_prta,
                            'id_cnj_rpta'=>$id_cnj_rpta,
                            'id_capitulo'=>$id_capitulo,
                            'id_prta'=>$id_prta,
                            'id_rpta'=>$id_rpta,
                            'nom_prta'=>$nom_prta,
                            'numerar'=>$numerar, 
                            'estado' => $estado,
                            'capitulo'=>$capitulo,
                            'cantones'=>$cantones,
                            'provincia'=>$provincia,
                            'parroquias'=>$parroquias,
                            'periodos'=>$periodos,
                            'antvista'=>$antvista,
                            'migadepan'=>$migadepan,
                            'tipo_select' =>$tipo_select,
                            'btnadd'=>$btnadd,
                            'botton'=>$botton,
                            'focus' => $focus]), 'title' => 'Adicionar',
        'class' => 'showModalButton btn btn-success']):''; ?>
        
         <?php echo Html::a('Regresar', $_urlmiga, ['class'=>'btn btn-default']);  ?>
    </p>
    
     <!-----habilitando delete con los permisos dle usuario--------------------------------------------------------->
    <?php
        if($botton === FALSE ){
            $_adbutton = "{update}{delete}";
        }else{
            $_adbutton = "";
        }
        
         
        if(empty($tipo_select)){
            $_extra=  'descripcion';
            }else{
             $_extra=   array('attribute'=>'id_opcion_select','value'=>'idOpcionSelect.nom_opcion_select') ;
            } 
    
    ?>
    
     
    <div class="aplicativo">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => $_adbutton,
                'buttons' => [
                   /* 'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'View'),
                                    'data-method' => 'post',
                            ]);
                    },*/
                    'update' => function ($url,$model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$tipo_select,$botton,$btnadd,$focus) {
                                $urlup = Url::toRoute(['fdrespuestaxmes/updatedetcapitulo',
                                                        'id' => $model->id_respuesta_x_mes,
                                                        'id_fmt'=>$id_fmt,
                                                        'id_version'=>$id_version,
                                                        'id_conj_prta'=>$id_conj_prta,
                                                        'id_cnj_rpta'=>$id_cnj_rpta,
                                                        'id_capitulo'=>$id_capitulo,
                                                        'id_prta'=>$id_prta,
                                                        'id_rpta'=>$id_rpta,
                                                        'nom_prta'=>$nom_prta,
                                                        'numerar'=>$numerar, 
                                                        'estado' => $estado,
                                                        'capitulo'=>$capitulo,
                                                        'cantones'=>$cantones,
                                                        'provincia'=>$provincia,
                                                        'parroquias'=>$parroquias,
                                                        'periodos'=>$periodos,
                                                        'antvista'=>$antvista,
                                                        'migadepan'=>$migadepan,
                                                        'tipo_select' =>$tipo_select,
                                                        'btnadd'=>$btnadd,
                                                        'botton'=>$botton,
                                                        'focus' => $focus
                                                        ]);

                                return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$urlup,
                                'title'=>'Editar',             
                                'class' => 'btn btn-default btn-xs showModalButton',
                                ]);
                        }, //Primera columna encontrada respuestaxmes                   
                    'delete' => function($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$tipo_select,$botton,$btnadd,$focus) {
                                $url2 = Url::toRoute(['fdrespuestaxmes/deletep',
                                                        'id' => $model->id_respuesta_x_mes,
                                                        'id_fmt'=>$id_fmt,
                                                        'id_version'=>$id_version,
                                                        'id_conj_prta'=>$id_conj_prta,
                                                        'id_cnj_rpta'=>$id_cnj_rpta,
                                                        'id_capitulo'=>$id_capitulo,
                                                        'id_prta'=>$id_prta,
                                                        'id_rpta'=>$id_rpta,
                                                        'nom_prta'=>$nom_prta,
                                                        'numerar'=>$numerar, 
                                                        'estado' => $estado,
                                                        'capitulo'=>$capitulo,
                                                        'cantones'=>$cantones,
                                                        'provincia'=>$provincia,
                                                        'parroquias'=>$parroquias,
                                                        'periodos'=>$periodos,
                                                        'antvista'=>$antvista,
                                                        'migadepan'=>$migadepan,
                                                        'tipo_select' =>$tipo_select,
                                                        'btnadd'=>$btnadd,
                                                        'botton'=>$botton,
                                                        'focus' => $focus],true);
                                /*return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                        'title' => Yii::t('app', 'Delete'),
                                        'data-method' => 'post',
                                        'data-confirm' => Yii::t('yii',  'Desea eliminar el registro'.'::'.$url2),
                                ]);*/
                                return Html::button('<span class="glyphicon glyphicon-trash">Borrar</span>',  ['value'=>$url2,
                                        'title' => Yii::t('app', 'Delete'),
                                        'data-method' => 'post',
                                        'data-confirm' => Yii::t('yii',  'Desea eliminar el registro'.'::'.$url2),
                                ]);
                        } 
                                        
                                        
                ],
            ],
                        
            $_extra,           
            'ene_decimal',
            'feb_decimal',
            'mar_decimal',
            'abr_decimal',
            'may_decimal',
            'jun_decimal',
            'jul_decimal',
            'ago_decimal',
            'sep_decimal',
            'oct_decimal',
            'nov_decimal',
            'dic_decimal',
            //'id_respuesta',
            //'id_pregunta',
            //'id_respuesta_x_mes',

            
        ],
    ]); ?>
    </div>
</div>
