jQuery(function($){
    
        $('.borrar-pac').live('click', function(){
           return confirm("Esta seguro de que lo quiere borrar??") ;
        });
        
        $('#select-dia').live('change', function(){
           document.forms['form1'].submit();
        });
    
          
           $('.obligatorio').live('blur', function(){
               validaCampos( $(this).attr("id") );
           });
           $('#enviar').live('click', function(){
              if ( validaCampos() ){
                document.forms["form1"].submit(); }
                else { return false; }
           });

        function validaCampos(IdCampo){
            if(IdCampo != undefined){
                if (IdCampo == "email"){
                    var emailReg = /^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$/;
                    if ( !emailReg.test( $("#"+IdCampo).val()) ){
                        $("#"+IdCampo).addClass("error");
                        $('#error-'+IdCampo).html('<br />El email debe completarse, con un email valido');
                        return false;
                        
                    }
                }else if( $("#"+IdCampo).val().length < 3 ){
                    $("#"+IdCampo).addClass("error");
                    $('#error-'+IdCampo).html('<br />Debe completarlo obligatoriamente');
                    return false;
                    
                }
                $("#"+IdCampo).removeClass("error");
                $('#error-'+IdCampo).html('Bien ^^');
                return true;
                
            }

                var IdCampoArray = new Array("nombre","apellido","dni","email");
                for( var i = 0; i <= IdCampoArray.length; i++ ){
                    if ( !validaCampos(IdCampoArray[i]) ){
                        return false;
                         }
                     }
                     return true;
                    }
  
});