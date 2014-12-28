
var admin = ( function () {

	return{

		modalPerfil : function(){

            $.post('admin/perfil',function( returns ){
				var config = { title : 'Mi Perfil', effect : '4', color : 'dark'};
			    Modal.show( returns , config);
			    //Si tiene upload, agregar:
	                $("#file").fileinput({
	                    showUpload: false,
	                    showCaption: false,
	                    browseClass: "btn btn-default",
	                    fileType: "any"
	                });
	            //end
            });

		}

	};
})();
