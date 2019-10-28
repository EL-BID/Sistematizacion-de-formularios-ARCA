<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdObrasCaptacionRiegoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $numerar.' '.$nom_prta;
if (!empty($capitulo)) {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => $capitulo, 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
} else {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => '', 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Formato', 'url' => $_urlmiga];
}
//$_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>$capitulo,'cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista) ;
//$this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
$this->params['breadcrumbs'][] = $this->title;

$_counteobras=0;
$_counteobras = \common\models\poc\FdObrasCaptacionRiego::find()
                        ->where(['id_conjunto_respuesta'=>$id_cnj_rpta])->count(); 
?>
<script>
    function Valida_retorno()
    {
        var valor = <?= $btnadd ?>; 
        var num_f = <?= $conteodata?>;
        console.log(valor);
      if(valor === 1){         
          alertify.alert('Mensaje','No puede regresar hasta que ingrese las '+num_f+' obras de captación faltantes').set('label', 'Aceptar').set({transition:'zoom'}).show();
          return false;
      }
      return true;
    }
    
</script>

<div class="fd-obras-captacion-riego-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <div class="aplicativo">
    <p>
  <?php echo Html::a('Regresar', $_urlmiga, ['class' => 'btn btn-default','onclick'=>'return Valida_retorno();']); ?>
        
         <?= ($btnadd === true) ? Html::button('Adicionar',
        ['value' => Url::to(['fdobrascaptacionriego/createdetcapitulo',
                            'id_fmt' => $id_fmt,
                            'id_version' => $id_version,
                            'id_conj_prta' => $id_conj_prta,
                            'id_cnj_rpta' => $id_cnj_rpta,
                            'id_capitulo' => $id_capitulo,
                            'id_prta' => $id_prta,
                            'id_rpta' => $id_rpta,
                            'nom_prta' => $nom_prta,
                            'numerar' => $numerar,
                            'estado' => $estado,
                            'capitulo' => $capitulo,
                            'cantones' => $cantones,
                            'provincia' => $provincia,
                            'parroquias' => $parroquias,
                            'periodos' => $periodos,
                            'antvista' => $antvista,
                            'migadepan' => $migadepan,
                            'focus' => $focus,                             
                            ]), 'title' => 'Adicionar',
        'class' => 'showModalButton btn btn-success']) : ''; ?>
       
     
    </p>
    	<?php
        if ($botton === false) {
            $_adbutton = '{update}{delete}';
        } else {
            $_adbutton = '';
        }  
    ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'numero_obras',            
            ['attribute' => 'tipo_obra', 'label' => 'Tipo obra captación' ,'value'=>
            function ($data)
            {            
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->tipo_obra])
                        ->one();                 
                return $_nombrevalor->nom_opcion_select;
            }
            ],
              'especifique',              
            ['attribute' => 'estado_obra', 'label' => 'Estado obra captación' ,'value'=>
            function ($data)
            {
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->estado_obra])
                        ->one();
                return $_nombrevalor->nom_opcion_select;
            }
            ],
            ['attribute' => 'ubicacion_obra', 'label' => 'Ubicación obra captación' ,'value'=>
            function ($data)
            {
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->ubicacion_obra])
                        ->one();
                return $_nombrevalor->nom_opcion_select;
            }
            ],
            'especifique_ubicacion', 
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => $_adbutton,
                'buttons' => [
                    'update' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus) {
                        $urlup = Url::toRoute(['fdobrascaptacionriego/updatedetcapitulo',
                                                        'id' => $model->id_obracaptacion,
                                                        'id_fmt' => $id_fmt,
                                                        'id_version' => $id_version,
                                                        'id_conj_prta' => $id_conj_prta,
                                                        'id_cnj_rpta' => $id_cnj_rpta,
                                                        'id_capitulo' => $id_capitulo,
                                                        'id_prta' => $id_prta,
                                                        'id_rpta' => $id_rpta,
                                                        'nom_prta' => $nom_prta,
                                                        'numerar' => $numerar,
                                                        'estado' => $estado,
                                                        'capitulo' => $capitulo,
                                                        'cantones' => $cantones,
                                                        'provincia' => $provincia,
                                                        'parroquias' => $parroquias,
                                                        'periodos' => $periodos,
                                                        'antvista' => $antvista,
                                                        'migadepan' => $migadepan,
                                                        'focus' => $focus,     
                                                        ]);

                        return Html::button('<span class="glyphicon glyphicon-pencil"></span> Editar', ['value' => $urlup,
                                            'title' => 'Editar',
                                            'class' => 'btn btn-default btn-xs showModalButton',
                                ]);
                    }, 
                    'delete' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus) {
                        $url2 = Url::toRoute(['fdobrascaptacionriego/deletep',
                                                        'id' => $model->id_obracaptacion,
                                                        'id_fmt' => $id_fmt,
                                                        'id_version' => $id_version,
                                                        'id_conj_prta' => $id_conj_prta,
                                                        'id_cnj_rpta' => $id_cnj_rpta,
                                                        'id_capitulo' => $id_capitulo,
                                                        'id_prta' => $id_prta,
                                                        'id_rpta' => $id_rpta,
                                                        'nom_prta' => $nom_prta,
                                                        'numerar' => $numerar,
                                                        'estado' => $estado,
                                                        'capitulo' => $capitulo,
                                                        'cantones' => $cantones,
                                                        'provincia' => $provincia,
                                                        'parroquias' => $parroquias,
                                                        'periodos' => $periodos,
                                                        'antvista' => $antvista,
                                                        'migadepan' => $migadepan,
                                                        'focus' => $focus,
                                                        ], true);

                        return Html::button('<span class="glyphicon glyphicon-trash"></span> Borrar', ['value' => $url2,
                                        'title' => Yii::t('app', 'Borrar'),
                                        'data-method' => 'post',
                                        'class' => 'btn btn-default btn-xs',
                                        'data-confirm' => Yii::t('yii', 'Desea eliminar el registro'.'::'.$url2),
                                ]);
                    },
            ],
    ],
        ],
    ]); ?>
</div>
