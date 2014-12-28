
var usuario = ( function () {

	return{

		save : function(){

			var datos = {
				foto : $('#file').val(),
				nombre : $('#nombre h4').text(),
				mail : $('#mail h4').text()
			};

			$.post('usuario', datos, function( returns ){

           		console.log( returns );

			});


		}

	};
})();

 window.onload = function(){
 
}