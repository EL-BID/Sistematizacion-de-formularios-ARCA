<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

SweetSubmitAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\hidricos\Cda */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="cda-create">
    
    <?php
    if(empty($ajax)){
    ?>
    <div class="headSection"><h1 class="titSection"><?= Html::encode('Registrar datos del solicitante') ?></h1></div>
    
    <div class="aplicativo table-responsive">
        <div class="cda-form">
        
         <!----------------------------------Boton de Regresar---------------------------->
		 
        <?php 
		
		if($_labelmiga == 'cda/ps-cproceso/index_gestor'){
		
			echo Html::button("Regresar",
					['class'=>'btn btn-default btn-xs',
						'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/ps-cproceso/index_gestor','tipo'=>'1']) . "';",
						'data-toggle'=>'Regresar'
					]
				); 
		}else{
			
			echo Html::button("Regresar",
					['class'=>'btn btn-default btn-xs',
						'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['detalleproceso/index','id_cda'=>$id_cda]) . "';",
						'data-toggle'=>'Regresar'
					]
				); 
		}
        
     }
    ?>
     <!----------------------------------Encabezado------------------------------------>
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
                <td class="datosbasicos1"> Numero de Quipux Arca </td>
                <td class="datosbasicos2"><?= $encabezado[0]['arca']; ?></td>
                <td class="datosbasicos1"> Enviado por: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['enviadopor']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Numero de Quipux Senagua </td>
                <td class="datosbasicos2"><?= $encabezado[0]['senagua']; ?></td>
                <td class="datosbasicos1"> Rol: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['nom_cda_rol']; ?></td>
            </tr>
            
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2"><?= $encabezado[0]['usuario_accion']; ?></td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2"><?= $encabezado[0]['fecha_solicitud']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha Ultima Actividad </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_actividad']; ?></td>
                <td class="datosbasicos1"> Fecha Ultimo Estado </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_estado']; ?></td>
            </tr>
        </table>        

        
            <?php $form = ActiveForm::begin(['options' => [
                            'id' => 'crear-form'
                                                ]
                        ]); ?>


             <?= $form->field($model, 'institucion_solicitante')->textInput([
                                                'maxlength' => true,
                                                'title' => 'Nombre Institucion Solicitante',
                                                'data-toggle' => 'tooltip',
                                                'placeholder'=>'Nombre Institucion Solicitante'        
                                                 ]) ?>

             <?= $form->field($model, 'solicitante')->textInput([
                                                'maxlength' => true,
                                                'title' => 'Nombre Solicitante',
                                                'data-toggle' => 'tooltip',
                                                'placeholder'=>'Nombre Solicitante',
                                                'disabled' => !$_editararca    
                                                 ]) ?>
     
             <?= $form->field($model, 'id_demarcacion')->dropDownList(\yii\helpers\ArrayHelper::map(
                                    $listadodemarcacion,'id_demarcacion','nombre_demarcacion'),['prompt'=>'Indique Demarcacion','onchange'=>'$.post("index.php?r=cda/cda/centrociudadano&id='.'"+$(this).val(),function(data){
                                                $("#cda-cod_centro_atencion_ciudadano").html(data);
                                            });']
                               ) ?> 
                               
                               
            <?php 
            
                if($model->isNewRecord){
                    echo $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList([],['prompt'=>'Indique Centro de Atencion']
                                   ); 
                    
                }else{
              
                    echo $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList(\yii\helpers\ArrayHelper::map(
                                        $listadocentro,'cod_centro_atencion_ciudadano','nom_centro_atencion_ciudadano'),['prompt'=>'Indique Centro de Atencion']
                                   ); 
                }
                        
                        
            ?> 
     
          

            <div class="form-group">
                <?php if($_editararca == TRUE){
                         echo Html::submitButton('Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
                }?>
                
            </div>

            <?php ActiveForm::end(); ?>
        </div>     
    </div>
</div>
 
    
