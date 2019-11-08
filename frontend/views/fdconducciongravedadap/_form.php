<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use common\models\poc\FdTipoSelect;
/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConduccionGravedadAp */
/* @var $form yii\widgets\ActiveForm */

SweetSubmitAsset::register($this);
?>
<div class="fd-conduccion-gravedad-ap-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form',
                            		],
                ]); 
    $_nombrevalorfconduc = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'FORMA CONDUCCION'])
                        ->one();
                $valor_tselectfconduc= $_nombrevalorfconduc->id_tselect;
                
    $_nombrevalormconduc = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'MATERIAL TUBERIA'])
                        ->one();
                $valor_tselectmconduc= $_nombrevalormconduc->id_tselect;
                
    $_nombrevalorfmconduc = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'FRECUENCIA MANTENIMIENTO CONDUCCION'])
                        ->one();
                $valor_tselectfmconduc= $_nombrevalorfmconduc->id_tselect;
                
    $_nombrevaloreconduc = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'ESTADO CONDUCCION'])
                        ->one();
                $valor_tselecteconduc= $_nombrevaloreconduc->id_tselect;
    
    
    
    ?>

    
        <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta">Nombre o lugar de la conducción: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Nombre de la conduccion',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td>
              <?= $form->field($model, 'nombre_conduccion_g')->textInput([
                                        'maxlength' => 200,
                                        'title' => 'Indique Nombre Conduccion G',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre Conduccion G'        
                                         ])->label(false); ?>
           </td>
        </tr> 
        <tr>                    
            <td class="labelpregunta">Forma de conducción:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Forma de conducción", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_forma_conduccion_g')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectfconduc])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un item'])->label(false); ?>       
            </td>           
         </tr>
       <tr>                    
            <td class="labelpregunta">Material de la conducción:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Material de la conducción", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_material_conduccion_g')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectmconduc])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un item'])->label(false); ?>       
            </td>           
           </tr>
        <tr>                    
            <td class="labelpregunta">Frecuencia de mantenimiento de la conducción:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Frecuencia de mantenimiento", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_frec_mantenimiento_g')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectfmconduc])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un item'])->label(false); ?>       
            </td>           
           </tr>
         <tr>                    
            <td class="labelpregunta">Estado de la conducción:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Estado de la conduccion", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_estado_conduccion_g')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselecteconduc])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un item'])->label(false); ?>       
            </td>           
           </tr>
        <tr>
            <td class="labelpregunta">Problemas identificados: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => '',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td>
               <?= $form->field($model, 'problemas_identificados')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Problemas Identificados',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Problemas Identificados'        
                                         ])->label(false); ?>
           </td>
        </tr>   
         
         
         
         
         
         
 </table>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
