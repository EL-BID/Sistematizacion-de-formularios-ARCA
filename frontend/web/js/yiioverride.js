$(function () {

/*------------------------------------------------------------------------------------------------*/
/*---------------------------------Funcion para el TOOLTIP----------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
	
$('[data-toggle="tooltip"]').tooltip({
    placement: "right",
    trigger: "focus hover"
});

/*------------------------------------------------------------------------------------------------*/
/*---------------------------------Funcion para el CAROUSEL----------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
$('.carousel').carousel({
    interval: 10000,
    animateout: 'fadeIn',
});

/*------------------------------------------------------------------------------------------------*/
/*--------------------------Funcion Ventana Emergente GridView------------------------------------*/
/*------------------------------------------------------------------------------------------------*/

$(document).on('click','.showModalButton', function(){
    
        if ($('#modal').data('bs.modal').isShown){
                 $('#modal').find('#modalContent').load(''+$(this).attr('value')+'');
       }else{
		$('#modal').modal('show').find('#modalContent').load(''+$(this).attr('value')+'');
                //document.getElementById('modalHeader').style.display = "none";
                
                var headerHTML = '<h4>' + $(this).attr('title') + '</h4>\n\
                                  <div class="butonclosemodal">\n\
                                        <button type="button" class="closebutton" data-dismiss="modal">x</button>\n\
                                  </div>'
                document.getElementById('modalHeader').innerHTML = headerHTML;
                
	}
});


$('#modal').on('hidden.bs.modal', function (e) {
    $("#modalContent").html("");  
    location.reload();
});


});


$(document).on('click','.buttonotify', function(){
     $(".notify").toggle();
});


/*------------------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------------------*/

$('.not-active').click(function(e){
     e.preventDefault();
  })


/*-------------------------Funcion sobre clic boton actividad---------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
function eventClick(value,title){

    if ($('#modal').data('bs.modal').isShown){
        $('#modal').find('#modalContent').load(''+value+'');
    }else{
        $('#modal').modal('show').find('#modalContent').load(''+value+'');
        //document.getElementById('modalHeader').style.display = "none";

        var headerHTML = '<h4>' + title+ '</h4>\n\
                          <div class="butonclosemodal">\n\
                                <button type="button" class="closebutton" data-dismiss="modal">x</button>\n\
                          </div>'
        document.getElementById('modalHeader').innerHTML = headerHTML;
     }
}


/*------------------------------------------------------------------------------------------------*/
/*--------------------------Funcion Confirmación Submit-------------------------------------------*/
/*------------------------------------------------------------------------------------------------*/

   
    
$('#create-form').submit(function (e, params) {
        var localParams = params || {};

        if (!localParams.send) {
            e.preventDefault();
        }

        var myEle = document.getElementById("detcapitulo-hidden1");
        
        //Entradas adicionales de validación
        if(clicked == 'subpantalla'){
            
            if(myEle){
                document.getElementById("detcapitulo-hidden1").value = "0";
            }
            
            var mesaggetext = "¿Se redirigirá a otra pantalla, Desea Guardar los Cambios?";
        }else{
            
            if(myEle){
                document.getElementById("detcapitulo-hidden1").value = "1";
            }
            
            var mesaggetext = "¿Estas seguro de Guardar los Datos?";
        }


    swal({
                title: "Solicitud de Confirmación",
                text: mesaggetext,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#85B200",
                confirmButtonText: "Confirmar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true
            }, function (isConfirm) {
                if (isConfirm) {
                    $(e.currentTarget).trigger(e.type, { 'send': true });
                } else {

              //Funciones adicionales cuando se cancela 

            }
    });
});



/*------------------------------------------------------------------------------------------------*/
/*--------------------------Reemplazo Ventana de Confirmación--------------------------------------*/
/*Variables a recibir:  @message => Mensaje que se debe mostrar en la ventana de confirmacion, esta variable es un string concatenado, debe contener dos datos separados por "::" (dato1::dato2) el dato 1 es el mensaje a mostrar en pantalla y el dato2 es la url completa de redireccionamiento ver ejemplo en /view/clientesprueba/index.php funcion deletep
/*------------------------------------------------------------------------------------------------*/

yii.allowAction = function ($e) {
        var message = $e.data('confirm');
		var id=$e.data('id');
        return message === undefined || yii.confirm(message,$e,id);
};
	
yii.confirm = function (message, $e, id) {
	
   var datos=message.split('::');
   swal({
       title: datos[0],
       type: 'warning',
       showCancelButton: true,
       closeOnConfirm: false,
       allowOutsideClick: true
   }, function(isConfirm){
		if (isConfirm) {
			window.location=datos[1];
		} else {

			  //Funciones adicionales cuando se cancela 

		}
   });
};



