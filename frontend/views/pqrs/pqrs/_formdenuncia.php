<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\pqrs\Pqrs */
/* @var $form yii\widgets\ActiveForm */

SweetSubmitAsset::register($this);
?>

<div class="pqrs-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form',
                    ],
                ]); ?>
<!------------------------------------IDENTIFICACIONES DEL FORMATO------------------------------------------->
     <table style="text-align:center" width="100%">
        <tr>
            <td colspan='4' class='titulopqr'>FORMATO DE DENUNCIAS</td>
        </tr>
        <tr>
            <td colspan='4' class='comentariopqr'>Comunicación de caracter legal y debidamente motivada a través de la cual se pone en conocimiento
            de la autoridad administrativa de la presunta ocurrencia de hechos u omisiones que amenazan el uso adecuado, eficiente, eficaz o incumplimiento de los requisitos y disposiciones legales.</td>
        </tr>
        <!------------------------------------IDENTIFICACIONES DEL FORMATO------------------------------------------->
        <tr>
            <td class='campopqr'>Fecha de Recepci&oacute;n</td>
            <td><?= $form->field($model, 'fecha_recepcion')->textInput(['disabled' => true])->label(false); ?></td>
            <td class='campopqr'>No. Consecutivo</td>
            <td><?= $form->field($model, 'num_consecutivo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Consecutivo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Num Consecutivo',
                                        'disabled' => true,
                                         ])->label(false); ?>
            </td>
        </tr>


<!--------------------------------IDENTIFICACION DEL USUARIO ---------------------------------------------------->
        <tr>
            <td colspan='4' class='titulopqr'>IDENTIFICACION DEL USUARIO</td>
        </tr>
        <tr>
            <td class='campopqr'>Nombres y Apellidos completos</td>
            <td colspan='3'> <?= $form->field($model, 'sol_nombres')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Nombres',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Sol Nombres',
                                         ])->label(false); ?>
            </td>
        <tr>
            <td class='campopqr'>Documento de Identificación</td>    
            <td colspan='3'><?= $form->field($model, 'sol_doc_identificacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Doc Identificacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Sol Doc Identificacion',
                                         ])->label(false); ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Dirección</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_direccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Direccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Sol Direccion',
                                         ])->label(false); ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Email</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_email')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Email',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Sol Email',
                                         ])->label(false); ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Teléfono</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_telefono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Telefono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Sol Telefono',
                                         ])->label(false); ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Provincia</td>
            <td>
                 <?= $form->field($model, 'sol_cod_provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(), 'cod_provincia', 'nombre_provincia'),
                                    ['prompt' => 'Seleccione una provincia',
                                    'onchange' => '$.post("index.php?r=pqrs/pqrs/listadocantones&id='.'"+$(this).val(),function(data){
                                        $("#pqrs-sol_cod_canton").html(data);
                                    });', ])->label(false); ?>
            </td>
            <td class='campopqr'>Canton</td>
            <td>
                <?= $form->field($model, 'sol_cod_canton')->dropDownList([], ['prompt' => 'Seleccione un Canton'])->label(false); ?>
            </td>
        </tr>
        

<!--------------------------------EMPRESA REPRESENTADA ---------------------------------------------------->

        <tr>
            <td colspan='4' class='comentariopqr'>***Si usted escribe en representación de una empresa o una organización por favor incluya</td>
        </tr>

        <tr>
            <td class='campopqr'>Nombre</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_nombres')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique En Nom Nombres',
                                            'data-toggle' => 'tooltip',
                                            'placeholder' => 'Indique En Nom Nombres',
                                             ])->label(false); ?>
            </td>
        </tr>

        <tr>
            <td class='campopqr'>Ruc</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_ruc')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique En Nom Ruc',
                                            'data-toggle' => 'tooltip',
                                            'placeholder' => 'Indique En Nom Ruc',
                                             ])->label(false); ?>
            </td>
        </tr>

        <tr>
            <td class='campopqr'>Dirección</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_direccion')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique En Nom Direccion',
                                            'data-toggle' => 'tooltip',
                                            'placeholder' => 'Indique En Nom Direccion',
                                             ])->label(false); ?>
            </td>
        </tr>


        <tr>
            <td class='campopqr'>Email</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_email')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique En Nom Email',
                                            'data-toggle' => 'tooltip',
                                            'placeholder' => 'Indique En Nom Email',
                                             ])->label(false); ?>
            </td>
        </tr> 

        <tr>
            <td class='campopqr'>Teléfono</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_telefono')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique En Nom Telefono',
                                            'data-toggle' => 'tooltip',
                                            'placeholder' => 'Indique En Nom Telefono',
                                             ])->label(false); ?>
            </td>
        </tr> 


        <tr>
              <td class='campopqr'>Provincia</td>
              <td>
                   <?= $form->field($model, 'en_nom_cod_provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(), 'cod_provincia', 'nombre_provincia'),
                                        ['prompt' => 'Seleccione una provincia',
                                        'onchange' => '$.post("index.php?r=pqrs/pqrs/listadocantones&id='.'"+$(this).val(),function(data){
                                            $("#pqrs-en_nom_cod_canton").html(data);
                                        });', ])->label(false); ?>
              </td>
              <td class='campopqr'>Canton</td>
              <td>
                  <?= $form->field($model, 'en_nom_cod_canton')->dropDownList([], ['prompt' => 'Seleccione un Canton'])->label(false); ?>
              </td>
        </tr>

<!--------------------------------DESCRIPCIÓN DE LA DENUNCIA ---------------------------------------------------->
        <tr>
            <td colspan='4' class='titulopqr'>DESCRIPCIÓN DE LA DENUNCIA</td>
        </tr>
        
        <tr>
            <td colspan='4' class='comentariopqr'>Datos del Denunciado</td>
        </tr>
        
        <tr>
            <td class='campopqr'>Nombre del denunciado</td>    
            <td colspan='3'> <?=  $form->field($model, 'denunc_nombre')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Denunc Nombre',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Denunc Nombre',
                                         ])->label(false); ?>
            </td>
        </tr> 
        
         <tr>
              <td class='campopqr'>Dirección</td>
              <td>
                   <?= $form->field($model, 'denunc_direccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Denunc Direccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Denunc Direccion',
                                         ])->label(false); ?>
              </td>
              <td class='campopqr'>Teléfono</td>
              <td>
                  <?= $form->field($model, 'denunc_telefono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Denunc Telefono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Denunc Telefono',
                                         ])->label(false); ?>
              </td>
        </tr>
        
         <tr>
              <td class='campopqr'>Lugar donde ocurrió el hecho?</td>
              <td>
                   <?= $form->field($model, 'lugar_hechos')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Lugar Hechos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Lugar Hechos',
                                         ])->label(false); ?>
              </td>
              <td class='campopqr'>Fecha</td>
              <td>
                  <?= $form->field($model, 'fecha_hechos')->
                            widget(\yii\jui\DatePicker::className(), [
                               'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                                'options' => ['readOnly' => 'readOnly'],
                               'clientOptions' => [
                                   'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual
                                   'changeYear' => true,            //Permitir cambio de año
                                   'changeMonth' => true, ],            //Permitir cambio de Mes
                           ])->label(false); ?>
              </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Narración de los hechos</td>    
            <td colspan='3'> <?=  $form->field($model, 'naracion_hechos')->widget(\yii\redactor\widgets\Redactor::className(), [
                                    'clientOptions' => [
                                        'lang' => 'es',
                                        'plugins' => ['bold', 'italic', 'orderedlist'],
                                        'buttonsHide' => ['image', 'file', 'html', 'formatting', 'deleted', 'outdent', 'indent', 'link', 'alignment', 'horizontalrule'],
                                    ],
                                  ])->label(false); ?>
            </td>
        </tr> 
        
         <tr>
            <td class='campopqr'>Elementos Probatorios</td>    
            <td colspan='3'> <?=  $form->field($model, 'elementos_probatorios')->widget(\yii\redactor\widgets\Redactor::className(), [
                                'clientOptions' => [
                                   'lang' => 'es',
                                   'plugins' => ['bold', 'italic', 'orderedlist'],
                                   'buttonsHide' => ['image', 'file', 'html', 'formatting', 'deleted', 'outdent', 'indent', 'link', 'alignment', 'horizontalrule'],
                                ],
                              ])->label(false); ?>
            </td>
        </tr> 
     </table>    


   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
