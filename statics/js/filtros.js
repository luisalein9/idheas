$(document).ready(function() {
    
    $('#eliminarActor').click(function() {
		
		var name =  $('#eliminarActor').attr('name');
		
		var cadena = name.split('&');
		
		var id = cadena[0];
		
		var tipo = cadena[1];
		
		eliminarActor(id,tipo);
				
    });
    
    $('#clearButton').click(function() {
		
		document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
				
    });
});

function cargarActor(actor,tipo){
	
	document.location.href = base+'index.php/actores_c/mostrar_actor/'+actor+'/'+tipo;
}

function cargarCaso(casoId){
   document.location.href = base+'index.php/casos_c/mostrar_caso/'+casoId;

}
function desplegarActores(nombre, filtro, tipoActor){

	if(nombre != '' || filtro != 0){
		
		var url = base+'index.php/actores_c/filtrarActor';
	
		var data = 'cadena='+nombre+'&tipoFiltro='+filtro+'&tipoActor='+tipoActor;
		
			$.ajax({
	    
	        url: url,
	    
	        data: data,
	        
	        type: 'POST',
	                
	        success: function(data){ 
	               
	          $('#listaActorIndiv').html(data);  
	            
	        },
	        
	        error: function(){
	        
	           alert("no se pudo");
	        }
	    
	    });
		
	}else{
		
		document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
		
	}
	
	
}

function filtroRadio(){
	
	var nombre = $('#'+active+'_nombre').val();
			
	var filtro = getRadioButtonSelectedValue(document.frmR.filtroR);
			
	var tipoActor = $('#tipoActor').attr('name');		
			
	if(filtro == null && nombre==''){		
	
		alert('Introduce un filtro válido de búsqueda')
	}
	if(filtro == null){		
	
		filtro=0;
				
	}
	
	desplegarActores(nombre, filtro, tipoActor);
}

function getRadioButtonSelectedValue(ctrl)
{
    for(i=0;i<ctrl.length;i++)
        if(ctrl[i].checked) return ctrl[i].value;
}

function eliminarActor(id,tipoActor){
	
	var url = base+'index.php/actores_c/eliminar_actor';
	
	var data = 'actorId='+id+'&tipoActor='+tipoActor;

	$.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
        	
             alert(data);    
              
             document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
        },
        
        error: function(){
        
           alert("no se pudo");
        }
    
    });
	
}



