
var general = ( function () {

	return{

		getTemplate : function ( datos, callback ) {

            $.get( general.getHost() + '/admin/templates', datos, function ( template ) {

                callback( template );

            } );

        },
		message : function( data , reload){

			if(data.type === 'success'){
				$('#saveModal').attr('disabled','disabled');
			}
			
			var icon;

			switch (data.type){
				case 'success' :
					icon = '<i class="fa fa-check-circle"></i>';
					break;
				case 'danger' :
					icon = '<i class="fa fa-times-circle"></i>';
					break;
				case 'warning' :
					icon = '<i class="fa fa-warning"></i>';
					break;
				case 'info' :
					icon = '<i class="fa fa-question-circle"></i>';
					break;
			}

			var selector = $('#messages'),
				alert_id = general.randomString(4);

            selector.append('<div id="'+alert_id+'" class="alert alert-'+data.type+' "><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>'+icon+'</strong> <span>'+data.message+'</span>.</div>');
            setTimeout(function(){
            	$('#'+alert_id).fadeOut('slow', function(){
            		$('#'+alert_id).remove();
            		if(data.type === 'success'){
            			modal.close();
            			if( reload == 1 ){
            				location.reload();
            			}
            		}
            	});
            },2000);

		},

		randomString : function (L){
		    var s= '';
		    var randomchar=function(){
		    	var n= Math.floor(Math.random()*62);
		    	if(n<10) return n; //1-10
		    	if(n<36) return String.fromCharCode(n+55); //A-Z
		    	return String.fromCharCode(n+61); //a-z
		    }
		    while(s.length< L) s+= randomchar();
		    return s;
		},
		convertURL : function ( me ){

			var title = $(me).val();

			title = title.replace(/[\s]/gi, '-');
			title = title.toLowerCase();
		    title = title.replace(/[àáâãäå]/g,"a");
		    title = title.replace(/[æ]/g,"ae");
		    title = title.replace(/[ç]/g,"c");
		    title = title.replace(/[èéêë]/g,"e");
		    title = title.replace(/[ìíîï]/g,"i");
		    title = title.replace(/[ñ]/g,"n");                
		    title = title.replace(/[òóôõö]/g,"o");
		    title = title.replace(/[œ]/g,"oe");
		    title = title.replace(/[ùúûü]/g,"u");
		    title = title.replace(/[ýÿ]/g,"y");
		    title = title.replace(/[ñ]/g,"n");
		    title = title.replace(/[=();:.{},"\[\]\/]/g,"");  
		    
			$('#convertURL_text').val(title);

		},
		toggle : function ( me ){

			var item = $(me).attr('item');
			$('#'+item).toggle();

		},
		toggleClass : function ( me ){

			var item = $(me).attr('item');
			$('.'+item).toggle();

		},
		print : function( returns ){

	  		general.message( returns );

	  		if(returns.type == 'success'){
	       		setTimeout(function(){
	       			//location.reload();
	       		},2500);
	       	}
		},
		disabledBtns: function(){
			$('.edit').attr('disabled','disabled');
		},		
		enabledBtns: function(){
			$('.edit').removeAttr('disabled');
		},
		viewPassword: function( me ){

				var icon = $(me).find('i');
				icon.removeClass('fa-lock');
				icon.addClass('fa-unlock-alt');
				var el = $(me).attr('item');
				$('#'+el).attr('type','text');

				setTimeout(function(){
						icon.removeClass('fa-unlock-alt');
						icon.addClass('fa-lock');
						$('#'+el).attr('type','password');
				},5000);
		},
		getHost : function(){
			return $('body').attr('host');
		}

	};
})();

$(window).load( function() {

});