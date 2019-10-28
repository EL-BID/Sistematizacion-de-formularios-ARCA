 function soloNumeros(e,campo){
        
        var key = window.event ? e.which : e.charCode;            
        if (key < 48 || key > 57) {
            //Usando la definición del DOM level 2, "return" NO funciona.
            e.preventDefault();
        }
    }
     function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        //letras = " ÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
        especiales = [8, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial){
           // alert('SOLO MAYÚSCULAS');
            return false;


        }
    }
    /*mceron:Funcion para permitir el ingreso solo letras mayúsculas en un campo 2018-12-26*/
    function soloMayusculas(e,campo) {
        document.getElementById(campo.id).value=document.getElementById(campo.id).value.toUpperCase()
    }
    /*mceron:Funcion para permitir el ingreso solo letras minúsculas en un campo 2018-12-26*/
    function soloMinusculas(campo) {
        document.getElementById(campo.id).value=document.getElementById(campo.id).value.toLowerCase();
    }
    /*mceron:Funcion para validar el campo teléfono 2018-12-26*/
    function validarTelefono(campo)
    {        
        var valor = document.getElementById(campo.id).value;

		var val_combo = document.getElementById('fddatosgeneralesriego-posee_convencional').value;
		if(val_combo!='')
			{
			if(valor.substr(0, 3)=="000")
			{
				alert('Número telefónico inválido');
				//alertify.alert('Mensaje','Número telefónico inválido').set('label', 'Aceptar').set({transition:'zoom'}).show();
				document.getElementById(campo.id).value='';
				//setTimeout(function() { $(campo).focus(); }, 100);
				return;                
			}
			
		  if (isNaN(valor) == false) {
			  if (valor.length < 9 ) {      
				alert("Número telefónico inválido, debe tener 9 dígitos");												 
				//alertify.alert('Mensaje','Número telefónico inválido, debe tener 9 dígitos').set('label', 'Aceptar').set({transition:'zoom'}).set('onfocus', function(){campo.value='';  campo.focus();}).show();
				campo.value='';
				//setTimeout(function() { $(campo).focus(); }, 100);
			   
				return;
			  }
			}
			else
			{
					alert("Ingrese el número telefónico solicitado");
					//alertify.alert('Mensaje','Ingrese el número telefónico solicitado').set('label', 'Aceptar').set({transition:'zoom'}).show();
					document.getElementById(campo.id).value='';
					//setTimeout(function() { $(campo).focus(); }, 100);
					return;     
			}  
	   }			
    }
    
    function validarCelular(campo)
    {
        var valor = campo.value;
        if(valor.length<10)
            {
                alert("Número de celular inválido, ingrese 10 dígitos");
                setTimeout(function() { $(campo).focus(); }, 100);
            }
        
    }
    /*mceron:Funcion que se lee desde el campo atributos de la tabla fd_pregunta 2018-12-03*/
    function sumar(total,campo1,campo2,totalfr,campo1fr,campo2fr)
    {        
        var campo_tot= document.getElementById("detcapitulo-rpta" + totalfr).value;
        var campo_val1= document.getElementById("detcapitulo-rpta" + campo1fr).value;
        var campo_val2= document.getElementById("detcapitulo-rpta" + campo2fr).value;
        if((campo_tot!='') && (campo_val1!='') && (campo_val2!=''))
        {
            var suma = parseInt(campo_val1)+parseInt(campo_val2);
            if(suma!=campo_tot)
            {
                //alert('Error en la operación, revise valores');
                document.getElementById("detcapitulo-rpta" + totalfr).focus();
                alertify.alert('Mensaje','Error en la operación, revise valores').set('label', 'Aceptar').set({transition:'zoom'}).show();

            }
        }
    }
    /*mceron:Funcion que se lee desde el campo atributos de la tabla fd_pregunta 2018-12-03*/
    function sumdecimales(total,campo1,campo2,totalfr,campo1fr,campo2fr)
    {
        var campo_tot= document.getElementById("detcapitulo-rpta" + totalfr).value;
        var campo_val1= document.getElementById("detcapitulo-rpta" + campo1fr).value;
        var campo_val2= document.getElementById("detcapitulo-rpta" + campo2fr).value;
        if((campo_tot!='') && (campo_val1!='') && (campo_val2!=''))
        {
            var suma = parseFloat(campo_val1)+parseFloat(campo_val2);
            if(suma!=campo_tot)
            {
                //alert('Error en la operación, revise valores');
                document.getElementById("detcapitulo-rpta" + totalfr).focus();
                alertify.alert('Mensaje','Error en la operación, revise valores').set('label', 'Aceptar').set({transition:'zoom'}).show();

            }
        }
    }	
/*mceron:Funcion que se lee desde el campo atributos de la tabla fd_pregunta 2018-12-03*/
    function utilidad(campo1,campo2,campo1fr,campo2fr,totalfr)
    {  
        
        var campo_val1= document.getElementById("detcapitulo-rpta" + campo1fr).value;
        var campo_val2= document.getElementById("detcapitulo-rpta" + campo2fr).value;
        if(campo_val1.indexOf(",")>0){            
            campo_val1 = campo_val1.replace(new RegExp(',', 'g'), '');}
        if(campo_val2.indexOf(",")>0){
            campo_val2 = campo_val2.replace(new RegExp(',', 'g'), '');}
        var resta = parseFloat(campo_val1)-parseFloat(campo_val2);
         var mensaje ='';       
        if (isNaN(resta) == false)
        {
            if(resta==0){mensaje='No ha generado pérdida/utilidad';}
            else if(resta>0) {            
               mensaje='Está seguro que su utlidad es de $'+resta;}
            else{         
               mensaje='Está seguro que su pérdida es de $'+resta;}            
            Confirmacion(mensaje,resta,totalfr,campo1fr,campo2fr);            
        }        
    }
    
    function Confirmacion(mensaje,resta,totalfr,campo1fr,campo2fr)
    {     
            alertify.confirm('Confirmación', mensaje, function(){ 
            document.getElementById("detcapitulo-rpta" + totalfr).value=resta; 
            }
            , function(){ 
                    document.getElementById("detcapitulo-rpta" + campo1fr).value='';
                    document.getElementById("detcapitulo-rpta" + campo2fr).value='';
                    document.getElementById("detcapitulo-rpta" + totalfr).value='';                    
                    document.getElementById("detcapitulo-rpta" + campo1fr).focus();      
        }).set('labels', {ok:'Aceptar', cancel:'Cancelar'}).set({transition:'zoom'}).show();         

    }
    /*mceron:Funcion que calcula los totales 2019-01-09*/
    function totales(e,campo)
    {        
        var valorcampo = campo.value;        
        if(valorcampo>100)
        {
                //alert('Error en los valores, no puede ser más de 100%');
                alertify.alert('Mensaje','Error en los valores, no puede ser más de 100%').set('label', 'Aceptar').set({transition:'zoom'}).show();
                document.getElementById(campo.id).value='';          
                for(var i=32;i<37;i++)
                {
                    document.getElementById("detcapitulo-rpta"+i).disabled=false;             
                }
                setTimeout(function() { $(campo).focus(); }, 100);
                return false;
         }
         var id_campo=campo.id;
         var suma=0;
         var valores = new Array();
         for(var i=32;i<37;i++)
         {
             valor1= document.getElementById("detcapitulo-rpta"+i ).value;                                                       
             valores["detcapitulo-rpta"+i]=valor1;
            // console.log("[detcapitulo-rpta"+i+"]="+valor1);
             
         }
         var bande =false;
         var bande2=false;
         var bande3=false;
         //var valoresBand = new Array();
         var foco =0;
         var almacena='';
         for(var clave in valores)
         {
             valo = valores[clave];    
             if(valo=='')valo=0;  
             suma+=parseInt(valo);  
             //console.log(suma);
             if(suma>100){
                 campo.value='';
                 //setTimeout(function() { $(campo).focus(); }, 100);
                 bande=true;
                 continue;                
             }
             else if(suma==100)
             {
                 if(clave==id_campo)continue;

                 document.getElementById(clave).disabled=true;
                 
                 console.log(clave);
                 
                separa = clave.split("-");
                nclave = separa[1];
                var element1 = document.createElement("input");
                element1.type = "hidden";
                element1.value = "";
                element1.id = clave;
                element1.name = "Detcapitulo["+nclave+"]";
                document.getElementById("create-form").appendChild(element1);  
                 
                 if(document.getElementById(clave).value!='')
                     {
                         document.getElementById(clave).disabled=false;
                     }                                
             }
             else
             {
                document.getElementById(clave).disabled=false;                                
                /*if(clave==id_campo)
                {
                  almacena=clave;                  
                }
                bande3=true;
                continue;  */               
             }
         } 
         var otros = document.getElementById('detcapitulo-rpta36').value;
         if(otros!=''){document.getElementById('detcapitulo-rpta37').disabled=false;}
         else {
             document.getElementById('detcapitulo-rpta37').value="";
             document.getElementById('detcapitulo-rpta37').disabled=true;
         }         
         if(suma<100)
             {
                 var surc = document.getElementById('detcapitulo-rpta32').value;
                 var asp = document.getElementById('detcapitulo-rpta33').value;
                 var micro_asp = document.getElementById('detcapitulo-rpta34').value;
                 var goteo = document.getElementById('detcapitulo-rpta35').value;                 
                 if(surc!='' && asp!='' && micro_asp!='' && goteo!='' && otros!=''){
                   alertify.alert('Mensaje','Error en los datos, el total debe sumar 100%').set('label', 'Aceptar').set({transition:'zoom'}).show();
                   
                 }
                 
             }
         if(bande)
         {
             //alert("Error en los datos, el total no puede sumar más del 100%");
             alertify.alert('Mensaje','Error en los datos, el total no puede sumar más del 100%').set('label', 'Aceptar').set({transition:'zoom'}).show();
             setTimeout(function() { $(campo).focus(); }, 10);             
         }
         /*else 
         {
             if(bande3){
            if(almacena!=''){
                num= parseInt(almacena.substr(-2, 2));
                num+=parseInt(1);
                console.log(num);
                unir = 'detcapitulo-rpta'+parseInt(num);
                console.log(unir);
                campi= document.getElementById(unir);
                setTimeout(function() { $(campi).focus(); }, 10);
                return;
          }
          }
         }  */      
        
    }
    
    /*mceron:Funcion que se lee desde el campo atributos de la tabla fd_pregunta 2019-01-04*/
    function Validar_fuente()
    {
        var valor = document.getElementById('detcapitulo-rpta0').value;
        if(valor=='' || valor==0)
            {
                //alert('Debe ingresar el valor del número de fuentes');
                document.getElementById('detcapitulo-rpta0').focus();
                alertify.alert('Mensaje','Debe ingresar el valor del número de fuentes').set('label', 'Aceptar').set({transition:'zoom'}).show();
                
                return false;
            }
            else
                {
                clicked='subpantalla';
                
                }
    }    
    function Validar_obras()
    {
        var valor = document.getElementById('detcapitulo-rpta2').value;
        if(valor=='' || valor==0)
            {
                //alert('Debe ingresar el valor del número de obras de captación');
                document.getElementById('detcapitulo-rpta2').focus();
                alertify.alert('Mensaje','Debe ingresar el valor del número de obras de captación').set('label', 'Aceptar').set({transition:'zoom'}).show();
                
                return false;
            }
            else
                {
                clicked='subpantalla';
                
                }
    }       
    
    /**/
    
    function NumCheck(e, field) {
        key = e.keyCode ? e.keyCode : e.which;
 
        if (key == 8) return true;
        if (key > 47 && key < 58) {
          if (field.value === "") return true;
          var existePto = (/[.]/).test(field.value);
          if (existePto === false){
              regexp = /.[0-9]{10}$/;
          }
          else {
            regexp = /.[0-9]{2}$/;
          }
 
          return !(regexp.test(field.value));
        }
        if (key == 46) {
          if (field.value === "") return false;
          regexp = /^[0-9]+$/;
          return regexp.test(field.value);
        }
        return false;
    }
    
    
    function bloqueoEspecial(e,campo)
    {
        var valor = campo.value;        
        if(valor ==0)
            {
                document.getElementById('detcapitulo-rpta9').disabled=true;
                document.getElementById('detcapitulo-rpta10').disabled=true;
                document.getElementById('detcapitulo-rpta11').disabled=true;
                document.getElementById('detcapitulo-rpta12').disabled=true;
                document.getElementById('detcapitulo-rpta13').disabled=true;
                document.getElementById('detcapitulo-rpta14').disabled=true;
                document.getElementById('detcapitulo-rpta15').disabled=true;  
                
                document.getElementById('detcapitulo-rpta9').checked=0;
                document.getElementById('detcapitulo-rpta10').checked=0; 
                document.getElementById('detcapitulo-rpta11').checked=0;
                document.getElementById('detcapitulo-rpta12').checked=0;
                document.getElementById('detcapitulo-rpta13').checked=0;
                document.getElementById('detcapitulo-rpta14').checked=0;
                document.getElementById('detcapitulo-rpta15').checked=0;
            }
            else
            {                
                document.getElementById('detcapitulo-rpta9').disabled=false;
                document.getElementById('detcapitulo-rpta10').disabled=false;
                document.getElementById('detcapitulo-rpta11').disabled=false;
                document.getElementById('detcapitulo-rpta12').disabled=false;
                document.getElementById('detcapitulo-rpta13').disabled=false;
                document.getElementById('detcapitulo-rpta14').disabled=false;
                document.getElementById('detcapitulo-rpta15').disabled=false;
                    
            }
    }
    /*mceron:Funcion para permitir el ingreso solo letras en un campo 2018-12-26*/
    function Bloqueocampo(campo,bloqueo)
    {
        var valor_condi = document.getElementById(campo.id).value;
        var campo_bloqueo = 'fddatosgeneralesriego-'+bloqueo;
        var objeto_bloqueo = document.getElementById(campo_bloqueo);        
        if(valor_condi==2){
            document.getElementById(campo_bloqueo).disabled = true;
            document.getElementById(campo_bloqueo).value ='';            
            /*Se crea campo input hidden cuando el elemento se deshabilita, ya que un disabled no reconoce el post y no se actualiza el valor*/
            var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = "";
            element1.id = campo_bloqueo;
            element1.name = "FdDatosGeneralesRiego["+bloqueo+"]";
            document.getElementById("create-form").appendChild(element1);    
        }
        else
        {            
            document.getElementById(campo_bloqueo).disabled = false;
            $('input[type="hidden"][id='+campo_bloqueo+']').remove();                        
            $("#"+campo_bloqueo).attr('required', 'true');   
        }
            
    }
    
    
    function Bloqueo_campo_det_fte(campo,bloqueo)
    {
        var valor_condi = document.getElementById(campo.id).value;
        var campo_bloqueo = 'fddetallesfuente-'+bloqueo;
        var objeto_bloqueo = document.getElementById(campo_bloqueo);
        
        if(valor_condi==2){
            document.getElementById(campo_bloqueo).disabled = true;
            document.getElementById(campo_bloqueo).value ='';            
            /*Se crea campo input hidden cuando el elemento se deshabilita, ya que un disabled no reconoce el post y no se actualiza el valor*/
            var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = "";
            element1.id = campo_bloqueo;
            element1.name = "FdDetallesFuente["+bloqueo+"]";
            document.getElementById("create-form").appendChild(element1);    
        }
        else
        {
            document.getElementById(campo_bloqueo).disabled = false;
            $('input[type="hidden"][id='+campo_bloqueo+']').remove();
            $("#"+campo_bloqueo).attr('required', 'true');   
        }
            
    }
    
    
    function isBlank(target) {
      var isEmpty = !target.value.length

      if (isEmpty) {
        target.setAttribute('required', true)
        target.setAttribute('aria-required', true)
      }
      return isEmpty
    }
    
    function validateRequired(event) {
      var target = event.target
      isBlank(target)
    }
    
    function ValidaTipoPrestador(campo)
    {
        var id =campo.id;
        var selObj = document.getElementById(id);
        var selIndex = selObj.options[selObj.selectedIndex].text;        
        
        if(selIndex=='Otros')
        {    
            console.log('estoy');
            document.getElementById('fddatosgeneralescomunitarioap-especifique').value="";
            document.getElementById('fddatosgeneralescomunitarioap-especifique').style.display="block";        
            document.getElementById('label_especifique').style.display="block";
        }
        else
        {
            document.getElementById('fddatosgeneralescomunitarioap-especifique').style.display ="none";                    
            document.getElementById('label_especifique').style.display ="none"; 
        }
    }
    function validaAnio(e,campo)
    {
        valor =campo.value;
        var fecha = new Date();
        var anio = fecha.getFullYear();        
        if(valor>=1900 && valor<=anio)
            {
                return true
            }
       else
           {
              alert('Rango permitido desde 1900 hasta '+anio);   
              campo.value='';
              //setTimeout(function() { $(campo).focus(); }, 100);
              return false;      
           }
            
    }
    function validaHorario(e,campo)
    {
        
        var key = window.event ? e.which : e.charCode;            
        if (key < 48 || key > 57) {
            //Usando la definición del DOM level 2, "return" NO funciona.
            e.preventDefault();
        }
         valor =campo.value;
         if(valor>24)
             {
                  alert('Error, debe ingresar un valor menor a 24 horas');  
                  campo.value='';
                  return false;
             }
    }