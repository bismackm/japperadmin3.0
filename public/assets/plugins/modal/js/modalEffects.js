/**
 * modalEffects.js v1.0.0
 *
 * Colors:
 * dark / blue / red / white
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com 
 */
modal = (function() {

	return {
	//Aquí carga el modal, pero hay que meterle un returns json
			show : function ( returns , config) {

                //Valores por Defecto
                if( !config.effect ){ config.effect = '8';}
                if( !config.color ){ config.color = 'white';}
                //
				$('#content-modal').html( returns );
				$('.md-modal').addClass('md-effect-'+config.effect);
				$('.md-content').addClass('md-content-'+config.color);
				$('.md-content h3').text(config.title);

                $('.md-content').addClass('md-content-scroll');

				var overlay = document.querySelector( '.md-overlay' );

				[].slice.call( document.querySelectorAll( ".btn-effect" ) ).forEach( function( el, i ) {

				var modalOrigin = document.querySelector( '.md-modal' ),
					close = modalOrigin.querySelector( '.btn-modal' );

				setTimeout(function(){
					classie.add( modalOrigin, 'md-show' );
					//overlay.removeEventListener( 'click', removeModalHandler );
					//overlay.addEventListener( 'click', removeModalHandler );
					if( classie.has( el, 'md-setperspective' ) ) {
						setTimeout( function() {
							classie.add( document.documentElement, 'md-perspective' );
						}, 25 );
					}
				}, 25);

					function removeModal( hasPerspective ) {
						classie.remove( modalOrigin, 'md-show' );

						setTimeout( function() {
							modalOrigin.remove();
							overlay.remove();
						}, 1000 );

						if( hasPerspective ) {
							classie.remove( document.documentElement, 'md-perspective' );
						}
					}

					function removeModalHandler() {
						removeModal( classie.has( el, 'md-setperspective' ) );
					}

					close.addEventListener( 'click', function( ev ) {
						ev.stopPropagation();
						removeModalHandler();
					});

					//Evento para que se cierre con la tecla escape
				    $(document).on('keydown',function(e){
					    if( e.which == 27 ){
							removeModalHandler();
					    };
				    });

				});

                setTimeout( function(){
                    if( $('.md-modal').find('.datepicker').length ){
                        $('.md-modal').find('.datepicker').datepicker({
                            format: "dd/mm/yyyy"
                        });
                    }
                },0);

			},
			close : function(){

				$('#closeModal').click();

			}

	};

})();