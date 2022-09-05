var album = ( function () {

	return{

         getTemplate: function(datos, callback) {

            $.get('buyer/templates', datos, function(template) {
                callback(template);
            });

        },

        willSave : function(){

            $.post('buyer/save', function( returns ){

                modal.show( returns , {
                    title : 'Registrar Comprador'
                });

                $.get('buyers/qr_correlative', function( returns ){

                    var type_entry_local = window.localStorage.getItem("type_entry")
                    var type_entry = 1
                    if(type_entry_local!=null){
                        type_entry = type_entry_local
                    }

                    $('#type_entry').val(type_entry)

                    $('#qr_code_1').val(returns.general_correlative)
                    $('#qr_code_2').val(returns.preferential_correlative)
                    $('#qr_code_3').val(returns.vip_correlative)
                    $('#qr_code_4').val(returns.platinium_correlative)

                    $('#qr_code_'+type_entry).removeClass('display-none')

                });

            });

        },

        change_type_entry : function(){

            var type_entry = $('#type_entry').val()
            window.localStorage.setItem("type_entry", type_entry)

            $('#qr_code_1').addClass("display-none")
            $('#qr_code_2').addClass("display-none")
            $('#qr_code_3').addClass("display-none")
            $('#qr_code_4').addClass("display-none")

            $('#qr_code_'+type_entry).removeClass('display-none')

        },

        save : function(){

             var name_ = $('#name').val();
             var dni_ = $('#dni').val();
             var phone_ = $('#phone').val();
             var number_entries_ = $('#number_entries').val();
             var qr_code_1_ = $('#qr_code_1').val();
             var qr_code_2_ = $('#qr_code_2').val();
             var qr_code_3_ = $('#qr_code_3').val();
             var qr_code_4_ = $('#qr_code_4').val();

             if(name_==='' || name_ === undefined || name_ === null ||
                 dni_==='' || dni_ === undefined || dni_ === null ||
                 phone_==='' || phone_ === undefined || phone_ === null ||
                 number_entries_==='' || number_entries_ === undefined || number_entries_ === null || number_entries_ <= 0 ||
                 qr_code_1_==='' || qr_code_1_ === undefined || qr_code_1_ === null ||
                 qr_code_2_==='' || qr_code_2_ === undefined || qr_code_2_ === null ||
                 qr_code_3_==='' || qr_code_3_ === undefined || qr_code_3_ === null ||
                 qr_code_4_==='' || qr_code_4_ === undefined || qr_code_4_ === null
             ){
                 general.message({message:"Faltan completar datos", type:"warning"} );
                 return;
             }

             $('.form-control').attr('disabled','disabled')
             $('.btn_').attr('disabled','disabled')

            var datos = {
                id : $('#id').val(),
                name : name_,
                dni : dni_,
                phone : phone_,
                type_entry : $('#type_entry').val(),
                number_entries : number_entries_,
                pay_mode : $("input[name='pay_mode']:checked").val(),
                qr_code_1 : qr_code_1_,
                qr_code_2 : qr_code_2_,
                qr_code_3 : qr_code_3_,
                qr_code_4 : qr_code_4_
            };

            $.post(general.getHost() + '/buyer', datos, function ( returns ){

                general.message( returns, 1);

            }, 'json');

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

			$.post('buyer/remove', datos, function( returns ){
				general.message(returns, 1);
			},'json');
		},

        willUpdate: function( me ){

            var datos = {
                alb_id: $(me).parents('tr').attr('alb_id')
            };

            $.post('buyer/save', function( returns ){

                modal.show( returns , {
                    title : 'Editar Album'
                });

                $('#number_entries').addClass('display-none')
                $('#number_entries_label').addClass('display-none')

                $('.form-control').attr('disabled','disabled')
                $('.btn_').attr('disabled','disabled')

                $.post('buyer/updates', datos, function( returns ){
                    $('#id').val(returns.id);
                    $('#name').val(returns.name);
                    $('#dni').val(returns.dni);
                    $('#phone').val(returns.phone);
                    $('#type_entry').val(returns.type_entry);
                    $("input[name='pay_mode']").filter('[value='+returns.pay_mode+']').prop('checked', true)
                    $('#qr_code').val(returns.qr_code);
                    console.log( returns );

                    // para no malograr el warining de campos llenos al guardar
                    $('#number_entries').val(1);
                    $('#qr_code_1').val("x");
                    $('#qr_code_2').val("x");
                    $('#qr_code_3').val("x");
                    $('#qr_code_4').val("x");
                    // para no malograr el warining de campos llenos

                    $('.form-control').removeAttr('disabled')
                    $('.btn_').removeAttr('disabled')

                    $('#type_entry').attr('disabled','disabled')
                    $('#qr_code').attr('disabled','disabled')
                    $('#qr_code').removeClass('display-none')

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
