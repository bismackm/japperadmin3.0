/**
 * modalEffects.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com 
 */
Modal = (function() {

	return {
	//Aquí carga el modal, pero hay que meterle un returns json
			show : function ( returns , config) {

				$('#content-modal').html( returns );
				$('.md-modal').addClass('md-effect-'+config.effect);
				$('.md-content').addClass('md-content-'+config.color);
				$('.md-content h3').text(config.title);

				var overlay = document.querySelector( '.md-overlay' );

				[].slice.call( document.querySelectorAll( ".btn-effect" ) ).forEach( function( el, i ) {

				var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
					close = modal.querySelector( '.btn-modal' );

				setTimeout(function(){
					classie.add( modal, 'md-show' );
					overlay.removeEventListener( 'click', removeModalHandler );
					overlay.addEventListener( 'click', removeModalHandler );
					if( classie.has( el, 'md-setperspective' ) ) {
						setTimeout( function() {
							classie.add( document.documentElement, 'md-perspective' );
						}, 25 );
					}
				}, 25);

					function removeModal( hasPerspective ) {
						classie.remove( modal, 'md-show' );

						setTimeout( function() {
							modal.remove();
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

				} );

			}

	};

})();