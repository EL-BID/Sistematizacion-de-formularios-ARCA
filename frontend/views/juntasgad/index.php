<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\poc\FdRespuesta;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\JuntasGadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$id_fmt=$_GET['id_fmt'];
$id_conj_prta=@$_GET['id_conj_prta'];
$id_cnj_rpta=@$_GET['id_cnj_rpta'];
$estado=$_GET['estado'];
$capitulo=@$_GET['capitulo'];
$cantones=$_GET['cantones'];
$provincia=$_GET['provincia'];
$parroquias=$_GET['parroquias'];
$periodos=$_GET['periodos'];
$antvista=@$_GET['antvista'];
$last=1;

$vista_f = \common\models\poc\FdFormato::find()
                        ->where(['id_formato'=>$id_fmt])->all(); 
$vista_formato=0;
$vista_formato = $vista_f[0]['id_tipo_view_formato'];
$this->title = 'Prestadores Comunitarios';
$this->params['breadcrumbs'][] = $this->title;

$url2 = Url::toRoute(['informacionprestadores/index','capitulo'=>'','id_cnj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt,'estado' => $estado,'migadepan'=>'', 'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>'informacionprestadores/index'],true);


?>


<div class="juntas-gad-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="aplicativo">
    <p>

<?php echo Html::a('Regresar', $url2, ['class' => 'btn btn-default']); ?>                
        
        <?= ($btnadd === true) ? Html::button('Nuevo Prestador',
        ['value' => Url::to(['juntasgad/create',
                            'id_fmt' => $id_fmt,                            
                            'id_conj_prta' => $id_conj_prta,
                            'id_cnj_rpta' => $id_cnj_rpta, 
                            'migadepan' =>$migadepan,
                            'estado' => $estado,
                            'capitulo' => $capitulo,
                            'cantones' => $cantones,
                            'provincia' => $provincia,
                            'parroquias' => $parroquias,
                            'periodos' => $periodos,
                            'antvista' => $antvista,
                             ]), 'title' => 'Nuevo Prestador',
        'class' => 'showModalButton btn btn-success']): '';  ?>             
    </p>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'rowOptions' => function ($model) {
            $_validarf = FdRespuesta::find()
                        ->where(['id_conjunto_respuesta'=>$model->id_conjunto_respuesta])
                        ->andwhere(['id_junta'=>$model->id_junta])
                        ->count();   
                if($_validarf==0)
                    return ['class' => 'incompleto'];
        
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],                        
            ['attribute' => 'nombre_junta', 'value' => 'nombre_junta', 'label' => 'Nombre Prestador'],        
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => ' {acceder} {reporte}{update} {delete} ',
                'buttons' => [
                    'update' => function ($url, $model) use ($id_fmt,$id_conj_prta,$id_cnj_rpta,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista) {
                     $urlup = Url::toRoute(['juntasgad/update',
                                                        'id' => $model->id_junta,
                                                        'id_fmt' => $id_fmt,                                                        
                                                        'id_conj_prta' => $id_conj_prta,
                                                        'id_cnj_rpta' => $id_cnj_rpta, 
                                                        'migadepan' => $migadepan,
                                                        'estado' => $estado,
                                                        'capitulo' => $capitulo,
                                                        'cantones' => $cantones,
                                                        'provincia' => $provincia,
                                                        'parroquias' => $parroquias,
                                                        'periodos' => $periodos,
                                                        'antvista' => $antvista,                                                        
                                                        ]);                                        
                            return Html::button('<span class="glyphicon glyphicon-pencil"></span> Editar',  ['value'=>$urlup,
                                         'title' => 'Editar',
                                         'class' => 'btn btn-default btn-xs showModalButton',                                         
                            ]);

                    }, //Primera columna encontrada id_junta                    
                    'delete' => function ($url, $model) use ($id_fmt,$id_conj_prta,$id_cnj_rpta,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista) {
                            $url2 = Url::toRoute(['juntasgad/deletep',
                                                        'id' => $model->id_junta,
                                                        'id_fmt' => $id_fmt,                                                        
                                                        'id_conj_prta' => $id_conj_prta,
                                                        'id_cnj_rpta' => $id_cnj_rpta, 
                                                        'migadepan' => $migadepan,
                                                        'estado' => $estado,
                                                        'capitulo' => $capitulo,
                                                        'cantones' => $cantones,
                                                        'provincia' => $provincia,
                                                        'parroquias' => $parroquias,
                                                        'periodos' => $periodos,
                                                        'antvista' => $antvista,
                                                        ]);
                            return Html::button('<span class="glyphicon glyphicon-trash"></span> Borrar',['value'=>$url2,
                                    'title' => Yii::t('app', 'Borrar'),
                                    'data-method' => 'post',
                                    'class' => 'btn btn-default btn-xs',                                    
                                    //'onclick'=>'return ValidaBorrarJunta(this)',
                                    'data-confirm' => Yii::t('yii', 'Está seguro de eliminar el registro?'.'::'.$url2),
                            ]);         
                    },
                   'acceder' => function ($url, $model) use ($vista_formato,$id_cnj_rpta,$id_conj_prta,$id_fmt,$last,$migadepan,$estado,$provincia,$cantones,$parroquias,$periodos){
                   
                                    if($vista_formato==2){
                                        $url2 = Url::toRoute(['dashboard/index','id_conj_rpta' => $id_cnj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'idjunta' => $model->id_junta],true);
                                        $_mensaje = "Accediendo al Dashboard";

                                    }else if($vista_formato==1){

                                        $url2 = Url::toRoute(['detcapitulo/genvistaformato','capitulo'=>'','id_conj_rpta' => $id_cnj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>'juntasgad/index','idjunta' => $model->id_junta],true);
                                        $_mensaje = "Accediendo a Detalle Formato";

                                    }else if($vista_formato==3){
                                        $url2 = Url::toRoute(['listcapitulos/index','id_conj_rpta' => $id_cnj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>'gestorformatos/index', 'idjunta' => $model->id_junta],true);
                                        $_mensaje = "Accediendo a Listado Capitulo";

                                    }       
                            return Html::button('<span class="glyphicon glyphicon-ok-sign"></span> Acceder',['class'=>'btn btn-default btn-xs btn-primary',
                                    'value'=>$url2,
                                    'title' => Yii::t('app', 'Acceder a Ficha'),
                                    'data-method' => 'post',
                                    'class' => 'btn btn-default btn-xs btn-primary',     
                                    'data-confirm' => Yii::t('yii', $_mensaje.'::'.$url2),
                            ]);              

                    } ,  
                    
                     'reporte' => function ($url, $model) use ($id_fmt,$id_conj_prta,$id_cnj_rpta,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista) {
                     $_mensaje = "Accediendo a la vista HTML";
                     $urlrepo = Url::toRoute(['detformato/genhtml',
                                                        'id_conj_rpta' => $id_cnj_rpta, 
                                                        'id_conj_prta' => $id_conj_prta,
                                                        'id_fmt' => $id_fmt,                                                        
                                                        'last' =>'',                                                        
                                                        'estado' => $estado,
                                                        'idjunta' => $model->id_junta,
                                                        true                                                 
                                                        ]);                                        
                            return Html::button('<span class="glyphicon glyphicon-file"></span> Reporte',  ['value'=>$urlrepo,
                                         'title' => 'Reporte',                                         
                                         'data-confirm' => Yii::t('yii', $_mensaje.'::'.$urlrepo),
                                         'class' => 'btn btn-default btn-xs',
                            ]);

                    },
            ],
	],
        ],
    ]); ?>
    
    
</div>
</div>
