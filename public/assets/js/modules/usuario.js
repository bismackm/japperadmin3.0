var usuario = ( function () {

	return{

		profile : function(){

            $.post( general.getHost() + '/usuario/profile',function( returns ){

			    modal.show( returns , { 
					title : 'Mi Perfil'
				});
			    //Si tiene PREVIEW del Upload, agregar:
	                $("#archivo").fileinput({
	                    showUpload: false,
	                    showCaption: false,
	                    browseClass: "btn btn-default",
	                    allowedFileExtensions: ["jpg",'png']
	                });
	            //end
            });

		},
		saveProfile : function(){

			var datos = {
				flag : 0,
				nombre : $('#nombre').val(),
				ruc : $('#ruc').val(),
				archivo : $('#archivo').val()
			};
			
			if( datos.archivo == '' ){
				$.post(general.getHost() + '/usuario', datos, function( returns ){

	           		general.message( returns );
	           		setTimeout(function(){
	           			location.reload();
	           		},3000);

				}, 'json');
			}else{
				$('#formProfile').submit();
			}

		},
		imprimir : function( returns ){

	  		general.message( returns );
	       		setTimeout(function(){
	       			location.reload();
	       		},3000);

		},
		password : function(){

            $.get(general.getHost() + '/usuario/password',function( returns ){

			    modal.show( returns , { 
					title : 'Cambio de Contraseña'
				});
            });

		},
		savePassword : function(){

			var datos = {
				last_password : $('#last_password').val(),
				new_password : $('#new_password').val(),
				renew_password : $('#renew_password').val()
			};
			
			$.post(general.getHost() + '/usuario/password', datos, function ( returns ){

				general.message( returns );

			}, 'json');

		}

	};
})();

 $(window).load( function(){
 	
});