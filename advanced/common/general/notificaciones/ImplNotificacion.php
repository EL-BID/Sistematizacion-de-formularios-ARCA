<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\general\notificaciones;
use Yii;
/**
 * Description of ImplNotificacion
 *
 * @author asus1
 */
class ImplNotificacion {
    
    public static function Enviar($destinatarios,$cuerpo,$asunto){
        
         $message = \Yii::$app->mailer->compose();

        $c=0;
        if ( \yii\helpers\ArrayHelper::keyExists("DE", $destinatarios, false)){
            foreach($destinatarios["DE"] as $de){
                $c=$c+1;
                $message->setFrom($de);
            }
        }
        if($c=0){$message->setFrom(\Yii::$app->params['adminEmail']);}
        
        if ( \yii\helpers\ArrayHelper::keyExists("PARA", $destinatarios, false)){
            foreach($destinatarios["PARA"] as $para){
                $message->setTo($para);
            }
        }
        
        if ( \yii\helpers\ArrayHelper::keyExists("CON COPIA", $destinatarios, false)){
            foreach($destinatarios["CON COPIA"] as $para){
                $message->setCc($para);
            }
        }
        
        if ( \yii\helpers\ArrayHelper::keyExists("CON COPIA OCULTA", $destinatarios, false)){
            foreach($destinatarios["CON COPIA OCULTA"] as $para){
                $message->setBcc($para);
            }
        }
        
        $patternImg ='/src\s*=\s*\"(.+?)\"/'; 

        $busqueda=array();
           // echo $correo;
        preg_match_all($patternImg, $cuerpo,$busqueda);
        foreach($busqueda[1] as $imagen){
//            echo \Yii::getAlias("@app/../..$imagen");
            $cid=$message->embed( \Yii::getAlias("@app/../..$imagen"));      
            $cuerpo= str_replace($imagen,$cid,$cuerpo);
        }
       

        
        $message->setSubject($asunto);
        $message->setHtmlBody($cuerpo);
         ini_set('max_execution_time', 60); 
       $message->send();
        
        return $message;

            
    }
}
