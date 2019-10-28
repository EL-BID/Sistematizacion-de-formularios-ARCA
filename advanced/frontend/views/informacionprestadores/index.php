<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\InformacionprestadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Información general prestadores comunitarios';
$this->params['breadcrumbs'][] = $this->title;

$id_fmt=$_GET['id_fmt'];
$id_conj_prta=@$_GET['id_conj_prta'];
$id_cnj_rpta=@$_GET['id_cnj_rpta'];
$estado=$_GET['estado'];
$capitulo=$_GET['capitulo'];
$cantones=$_GET['cantones'];
$provincia=$_GET['provincia'];
$parroquias=$_GET['parroquias'];
$periodos=$_GET['periodos'];
$antvista=$_GET['antvista'];
$last=1;


/*if (!empty($capitulo)) {
    $_urlmiga = array('id_fmt' => $id_fmt, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, $migadepan,  'estado' => $estado, 'capitulo' => $capitulo, 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista );
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
} else {
    $_urlmiga = array('id_fmt' => $id_fmt, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, $migadepan, 'estado' => $estado, 'capitulo' => '', 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Formato', 'url' => $_urlmiga];
}*/

$url2 = Url::toRoute(['gestorformatos/index','provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'id_fmt'=>$id_fmt,'estado'=>$estado,'periodos'=>$periodos,'hashbutton'=>'submit'],true);

?>
<div class="informacionprestadores-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="aplicativo">
    <p>
  <?php echo Html::a('Regresar', $url2, ['class' => 'btn btn-default']); ?>        
        <?= ($btnadd === true) ? Html::button('Nuevo registro', 
        ['value' =>Url::to(['informacionprestadores/create',
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
        ]), 'title' => '1.1. PRESTADORES COMUNITARIOS',
        'class' => 'showModalButton btn btn-success']) : ''; ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],            
            ['attribute' => 'posee_prestadores', 'label' => 'Tiene prestadores' ,'value'=>
            function ($data)
            {
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->posee_prestadores])
                        ->one();
                return $_nombrevalor->nom_opcion_select;
            }
            ],
            ['attribute' => 'numero_prestadores', 'value' => 'numero_prestadores', 'label' => 'N° prestadores'],
            ['attribute' => 'numero_prestadores_legal', 'value' => 'numero_prestadores_legal', 'label' => 'N° prestadores con reconocimiento legal'],
            ['attribute' => 'numero_prestadores_economico', 'value' => 'numero_prestadores_economico', 'label' => 'N° prestadores con apoyo económico'],
            ['attribute' => 'numero_prestadores_tecnico', 'value' => 'numero_prestadores_tecnico', 'label' => 'N° prestadores con apoyo técnico'],
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => ' {acceder}{update}',
                'buttons' => [
                    'update' => function ($url, $model) use ($id_fmt,$id_conj_prta,$id_cnj_rpta,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista) {
                     $urlup = Url::toRoute(['informacionprestadores/update',
                                                        'id' => $model->id_informacion_prestadores,
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
                                         'title' => 'Editar Prestadores comunitarios',
                                         'class' => 'btn btn-default btn-xs showModalButton',                                         
                            ]);
                            
                            
 
                    }, //Primera columna encontrada id_informacion_prestadores 
                    

                    'acceder' => function ($url, $model) use ($id_fmt,$id_conj_prta,$id_cnj_rpta,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista){
                     $url2 = Url::toRoute(['juntasgad/index',
                                                        'id' => $model->id_informacion_prestadores,
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
                            return Html::button('Acceder',['value'=>$url2,
                                    'title' => Yii::t('app', 'Acceder a Ficha'),
                                    'data-method' => 'post',
                                    'class' => 'btn btn-default btn-xs btn-primary',     
                                    'data-confirm' => Yii::t('yii', 'Accediendo a Prestadores comunitarios'.'::'.$url2),
                            ]);              
                    }             
                                        
            ],
	],
        ],
    ]); ?>
</div>
</div>
