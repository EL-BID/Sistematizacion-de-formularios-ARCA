

<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>

    Hola <?= $user->nombres ?>,

    Se ha creado un usuario con la siguiente información:
    
    Usuario:<?=$user->usuario ?> 
    Contraseña:<?=$user->login ?>

    <?php


        

            if($user->estado_usuario!="s"){
                   
                $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm', "id" => $user->id_usuario, "key" => $user->authKey]);

                echo 'Por favor confirme su correo para activar el usuario en el siguiente enlace: '.$resetLink;

                   
            }
    ?>
    
