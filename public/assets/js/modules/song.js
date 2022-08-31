var song = ( function () {

	return{

         getTemplate: function(datos, callback) {

            $.get('song/templates', datos, function(template) {
                callback(template);
            });

        },

        willSave : function(){

            $('.formAdd').show();
            $('.listSongs').hide();

        },

        backList : function(){

            $('.formAdd').hide();
            $('.listSongs').show();
            $('#can_id').val('');

        },

        changeTypeFile : function(){
           setTimeout( function () {
             var el = $("input[name='can_tipo_archivo']:checked").val();
             console.log( el )
             if( el == 'mp3' ){
               $('#use_mp3').show();
               $('#use_video').hide();
             }else {
               $('#use_video').show();
               $('#use_mp3').hide();
             }
           }, 200 );

        },

        save : function(){

          var _titulo = $('#can_titulo').val();

          if( _titulo == '' ){
              general.message( { message : 'Inserte un título', type : 'danger' }, 0 );
              return false;
          }

           // general.disabledBtns();

            var datos = {
                flag: 'x',
                can_id : $('#can_id').val(),
                album_id : $('#album_id').val(),
                can_titulo : _titulo,
                can_autores : $('#can_autores').val(),
                can_intro : $('#can_intro').val(),
                can_letra : CKEDITOR.instances.can_letra.getData(),
                can_tipo_archivo : $("input[name='can_tipo_archivo']:checked").val(),
                convertURL_text : $('#convertURL_text').val()
            };

            if( datos.can_tipo_archivo == 'mp3' ){
              datos.can_mp3 = $('#can_mp3').prop('files');
              if( datos.can_mp3.length == 0 ){
                general.message( { message : 'Falta subir el MP3', type : 'danger' }, 0 );
                general.enabledBtns();
              } else {
                $('#formSong').submit();
              }
              return false;
            } else {
              datos.can_video = $('#can_video').val();
              if( datos.can_video == '' ){
                general.message( { message : 'Falta poner el link del video de youtube', type : 'danger' }, 0 );
                general.enabledBtns();
                return false;
              }
            }

            $.post( general.getHost() + '/album/'+ datos.album_id +'/songs', datos, function (returns) {
              general.message(returns);
              if(returns.type == 'success'){
                location.reload();
              }
              general.enabledBtns();
            })


        },

		willRemove: function(me){

			general.getTemplate({id: 'confirm'}, function (template){

            var rendered = Mustache.render(template);

            modal.show(rendered, {
                title : 'Eliminar song',
                effect : '7',
                color : 'dark'
            });
			$('#modalConfirm').find('#var').val( $(me).parents('tr').attr('can_id') );

            $('#saveModal').on('click', function(){
                $('#saveModal').attr( 'disabled','disabled' );
                song.remove();
            });

        });

		},

		remove: function(){

			var datos = {
          can_id: $('#modalConfirm').find('#var').val()
			};

			$.post(general.getHost() + '/album/'+ $('#album_id').val() +'/song/remove', datos, function( returns ){
				general.message(returns, 1);
			},'json');
		},

        willUpdate: function( me ){

            var datos = {
              can_id: $(me).parents('tr').attr('can_id')
            };

          $.post(general.getHost() + '/album/'+ $('#album_id').val() +'/song/updates', datos, function( returns ){
            $('#can_id').val(returns.can_id);
            $('#can_titulo').val(returns.can_titulo);
            $('#can_intro').val(returns.can_intro);
            $('#convertURL_text').val(returns.can_link);
            $('#can_video').val(returns.can_video);
            CKEDITOR.instances.can_letra.setData(returns.can_letra);
            song.willSave();
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
