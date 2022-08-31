var album = ( function () {

	return{

         getTemplate: function(datos, callback) {

            $.get('album/templates', datos, function(template) {
                callback(template);
            });

        },

        willSave : function(){

            $.post('album/save', function( returns ){

                modal.show( returns , {
                    title : 'Nuevo Album'
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

        save : function(){

            var datos = {
                flag : "x",
                alb_nombre : $('#alb_nombre').val(),
                alb_anio : $('#alb_anio').val(),
                archivo : $('#archivo').val()
            };

            if( datos.alb_nombre == '' ){
                general.message( { message : 'Inserte un nombre', type : 'danger' }, 0 );
                return false;
            }

            if( datos.archivo == '' ){
                $.post('album', datos, function( returns ){

                    general.message( returns );
                    setTimeout(function(){
                        location.reload();
                    },3000);

                }, 'json');
            } else {
                $('#formAlbum').submit();
            }

        },

		willRemove: function(me){

			general.getTemplate({id: 'confirm'}, function (template){

            var rendered = Mustache.render(template);

            modal.show(rendered, {
                title : 'Eliminar Album',
                effect : '7',
                color : 'dark'
            });
			$('#modalConfirm').find('#var').val( $(me).parents('tr').attr('alb_id') );

            $('#saveModal').on('click', function(){
                $('#saveModal').attr( 'disabled','disabled' );
                album.remove();
            });

        });

		},

		remove: function(){

			var datos = {
                alb_id: $('#modalConfirm').find('#var').val()
			};

			$.post('album/remove', datos, function( returns ){
				general.message(returns, 1);
			},'json');
		},

        willUpdate: function( me ){

            var datos = {
                alb_id: $(me).parents('tr').attr('alb_id')
            };

            $.post('album/save', function( returns ){

                modal.show( returns , {
                    title : 'Editar Album'
                });
                //Si tiene PREVIEW del Upload, agregar:
                $("#archivo").fileinput({
                    showUpload: false,
                    showCaption: false,
                    browseClass: "btn btn-default",
                    allowedFileExtensions: ["jpg",'png']
                });
                //end

                $.post('album/updates', datos, function( returns ){
                    $('#alb_id').val(returns.alb_id);
                    $('#alb_nombre').val(returns.alb_nombre);
                    $('#alb_anio').val(returns.alb_anio);
                    if( returns.alb_foto ){
                        var namePic = general.getHost() + '/assets/img/album/'+returns.alb_foto;
                    }
                    $('.file-preview-image').attr('src', namePic );
                    console.log( returns );
                });

            });

        },

        imprimir : function( returns ){

            general.message( returns );
            setTimeout(function(){
                location.reload();
            },3000);

        }

	};
})();
