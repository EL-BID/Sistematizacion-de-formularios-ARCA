<?php
namespace backend\models\autenticacion;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
/**
 * Signup form
 */
class ReporteUnirForm extends Model
{
    public $file;
    public $id_formato;
    public $POC;
    public $uploadFile;

/**
 *  <?= $form->field($model, 'id_correo')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\CorCorreo::find()->all(),'id_correo','nom_correo'),['prompt'=>'Indique la configuracion del correo']) ?>
 */
 
    /**
     * @inheritdoc
     */
  
    /**
     * @inheritdoc Reglas de Validaci�n
     */
    public function rules()
    {
       /* return [
            [['tipo_usuario', 'identificacion','nombres', 'email','id_tipo_entidad','cod_rol'], 'required','message'=>'Campo Obligatorio'],
            [['identificacion'], 'number', 'message'=>'Campo de solo numeros, escriba el documento sin . ó ,'],
            [['tipo_usuario'], 'string', 'max' => 1,'message'=>'Maximo 200 caracteres'],
            [['nombres', 'email'], 'string', 'max' => 200,'message'=>'Maximo 200 caracteres'],
            [['email'], 'email','message'=>'Correo mal formado'],
            [['email'], 'email_existe'],
            [['identificacion'], 'identificacion_existe'],
            [['cod_canton','cod_provincia','cod_parroquia'], 'string'],
            // [['id_correo'], 'number'],
            [['id_formato'], 'number'],
			[['POC'],'safe'],
        ];*/
        return [
            [['file,uploadFile'], 'file'],
            [['id_formato'], 'number'],
            [['POC'],'safe'],
        ];
    }
    
    
    
    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {

        return [
            'file'=>'Archivo',
            'id_formato'=>'Formato',
            'uploadFile'=>'Archivos'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function actionReporteUnir($formato)
    {
         $model = new ReporteUnirForm();
         $uploaded_file_name = $_FILES['ReporteUnirForm']['tmp_name'];         
        
         if(empty($uploaded_file_name['uploadFile']))
         {
              Yii::$app->getSession()->setFlash('error', [
                             'message' => 'Debe seleccionar un archivo',
                         ]);             
              return null;
         }
         $html="";
       
         $i=0;
         $j=0; 
         $html2=$html3=$html4=$html5=$html6=$html7=$html8=$html9=$html10="";
         foreach($uploaded_file_name['uploadFile'] as $archi)
         {
             $objReader = \PHPExcel_IOFactory::createReaderForFile($archi);
             $objPhpExcel = $objReader->load($archi);
             $sheetData = $objPhpExcel->getActiveSheet()->toArray(null, true, true, true);
                          
             $html.="<table>";
             foreach($sheetData as $k=>$valor)
             {
                $html.="<tr>";
                if($i>0)
                  if($k==1)continue;  
                  foreach($valor as $val)
                  {
                    $html.="<td>".$val."</td>";
                  }
                 $html.="</tr>";
             }
             $html.="</table>";             
             $i++;  
             
             /*Creación de las demás hojas*/
             $y=2;                          
             for($x=1;$x<10;$x++)
             {                
                $hoja_1= $objPhpExcel->getSheet($x)->toArray(null, true, true, true);
                ${"html".$y}.="<table>";
                foreach ($hoja_1 as $clave=>$valor)
                {
                   ${"html".$y}.="<tr>";
                   if($j>0)
                     if($clave==1)continue;  
                     foreach($valor as $val)
                     {
                       ${"html".$y}.="<td>".$val."</td>";
                     }
                    ${"html".$y}.="</tr>";                     
                }
                ${"html".$y}.="</table>";               
                $y++;
             } 
             $j++;
          }         
          $_stringprint = utf8_decode($html);
          $_stringprint2 = utf8_decode($html2);
          $_stringprint3 = utf8_decode($html3);
          $_stringprint4 = utf8_decode($html4);
          $_stringprint5 = utf8_decode($html5);
          $_stringprint6 = utf8_decode($html6);
          $_stringprint7 = utf8_decode($html7);
          $_stringprint8 = utf8_decode($html8);
          $_stringprint9 = utf8_decode($html9);
          $_stringprint10 = utf8_decode($html10);
          $nombre_formato="REPORTE CONSOLIDADO ";    
          $GeneraExcel = new \common\general\documents\genExcel();                  
          $GeneraExcel->generadorExcelHTML2($_stringprint,$nombre_formato,'../../frontend/web/css/formato.css','','','','',$formato,$_stringprint2,$_stringprint3,$_stringprint4,$_stringprint5,$_stringprint6,$_stringprint7,$_stringprint8,$_stringprint9,$_stringprint10);
    }
}
