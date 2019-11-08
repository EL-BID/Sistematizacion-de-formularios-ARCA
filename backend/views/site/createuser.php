<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\CreateUserForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Crear Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title); ?></h1>
    

    <p>Por favor llene los siguientes campos para crear el usuario:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'create-user-form']); ?>

                    <?= $form->field($model, 'tipo_usuario')->dropDownList(['p' => 'Tipo Persona', 'e' => 'Tipo Empresa']); ?>

                    <?= $form->field($model, 'identificacion')->textInput([
                                                        'maxlength' => true,
                                                        'title' => 'Indique Identificacion',
                                                        'data-toggle' => 'tooltip',
                                                        'placeholder' => 'Indique Identificacion',
                                                         ]); ?>

                    <?= $form->field($model, 'nombres')->textInput([
                                                        'maxlength' => true,
                                                        'title' => 'Indique Nombres',
                                                        'data-toggle' => 'tooltip',
                                                        'placeholder' => 'Indique Nombres',
                                                         ]); ?>

                    <?= $form->field($model, 'email')->textInput([
                                                        'maxlength' => true,
                                                        'title' => 'Indique Email',
                                                        'data-toggle' => 'tooltip',
                                                        'placeholder' => 'Indique Email',
                                                         ]); ?>


                    <?= $form->field($model, 'id_tipo_entidad')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\TipoEntidad::find()->all(), 'id_tipo_entidad', 'nombre_tipo_entidad'), ['prompt' => 'Indique el tipo de entidad']); ?>

            
                    <?= $form->field($model, 'cod_provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(), 'cod_provincia', 'nombre_provincia'), ['prompt' => 'Indique la provincia', 'onchange' => '
                    $.post("index.php?r=site/actualiza-canton&cod_provincia='.'"+$(this).val(),function(data){
                      $("select#createuserform-cod_canton").html(data);
                    });']); ?>
           
            
                    <?php

                    if (empty($msg) and empty($model->cod_provincia)) {
                        echo $form->field($model, 'cod_canton')->dropDownList([], ['prompt' => 'Indique el canton', 'onchange' => '
                            $.post(\'index.php?r=site/actualiza-parroquia&cod_canton='.'\'+$(this).val()+\'&cod_provincia=\''.'+$(\'select#createuserform-cod_provincia\').val(),function(data){
                              $(\'select#createuserform-cod_parroquia\').html(data);
                            });']);
                    } elseif (!empty($model->cod_provincia)) {
                        echo $form->field($model, 'cod_canton')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Cantones::find()
                                ->where(['cod_provincia' => $model->cod_provincia])->all(), 'cod_canton', 'nombre_canton'),
                                ['prompt' => 'Indique el canton',
                                  'onchange' => '
                                    $.post(\'index.php?r=site/actualiza-parroquia&cod_canton='.'\'+$(this).val()+\'&cod_provincia=\''.'+$(\'select#createuserform-cod_provincia\').val(),function(data){
                                      $(\'select#createuserform-cod_parroquia\').html(data);
                                    });',
                                ]);
                    } else {
                        echo $form->field($model, 'cod_canton')->dropDownList([], ['prompt' => 'Indique el canton', 'onchange' => '
                            $.post(\'index.php?r=site/actualiza-parroquia&cod_canton='.'\'+$(this).val()+\'&cod_provincia=\''.'+$(\'select#createuserform-cod_provincia\').val(),function(data){
                              $(\'select#createuserform-cod_parroquia\').html(data);
                            });']);
                    }

                    if (empty($model->cod_provincia) and empty($model->cod_canton)) {
                        echo $form->field($model, 'cod_parroquia')->dropDownList([], ['prompt' => 'Indique la parroquia']);
                    } else {
                        echo $form->field($model, 'cod_parroquia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Parroquias::find()
                                ->where(['cod_canton' => $model->cod_canton, 'cod_provincia' => $model->cod_provincia])->all(), 'cod_parroquia', 'nombre_parroquia'), ['prompt' => 'Indique la parroquia']);
                    }

                    echo $form->field($model, 'id_correo')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\CorCorreo::find()->all(), 'id_correo', 'nom_correo'), ['prompt' => 'Indique la configuracion del correo']); ?>
                    
                    <?= $form->field($model, 'cod_rol')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Rol::find()->all(), 'cod_rol', 'nombre_rol'), ['prompt' => 'Indique el rol', 'onchange' => '
                    $.post("index.php?r=site/actualiza-formulario&id='.'"+$(this).val(),function(data){
                      $("select#createuserform-id_formato").html(data);
                    });']); ?>
            
					<?= $form->field($model, 'POC')->checkbox()->label('POC'); ?>
					
                    <?= $form->field($model, 'id_formato')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdFormato::find()->all(), 'id_formato', 'nom_formato'), ['prompt' => 'Indique el Formato asociado al rol']); ?>
            
                <div class="form-group">
                    <?= Html::submitButton('Crear Usuario', ['class' => 'btn btn-primary', 'name' => 'create-user-button']); ?>
                </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
