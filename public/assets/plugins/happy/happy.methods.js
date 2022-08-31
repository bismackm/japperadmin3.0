//Los retornos son booleanos

var happy = {
    
    numeric: function (val) {
        return /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/.test(val);
    },
    numericPositive: function (val) {
        if( val > 0 ) { return true; } else{ return false; }
    },
    phone: function (val) {
        return /^[0-9]{2,3}-? ?[0-9]{6,7}$/.test(val);
    },

    // matches mm/dd/yyyy (requires leading 0's (which may be a bit silly, what do you think?)
    date: function (val) {
        return /^(?:0[1-9]|1[0-2])\/(?:0[1-9]|[12][0-9]|3[01])\/(?:\d{4})/.test(val);
    },

    email: function (val) {
        return /^(?:\w+\.?\+?)*\w+@(?:\w+\.)+\w+$/.test(val);
    },

    minLength: function (val, length) {
        return val.length >= length;
    },

    maxLength: function (val, length) {
        return val.length <= length;
    },

    equal: function (val1, val2) {
        return (val1 == val2);
    },

    url : function(val){  
        return !/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/g.test(val);
    },

    ip : function(val){
        return /^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/g.test(val);
    },

    combo : function(val){
        //? undefined:undefined ?  * Parche para vacio en angular
        if( val !== '? undefined:undefined ?'){ return true; } else{ return false; }
    },

    dateMinToday : function(val){

        var val = val.split('/',3);
        val = val[2]+val[1]+val[0];

        var hoy = new Date();
        hoy = hoy.getFullYear() + '' + ('0' + (hoy.getMonth()+1)).slice(-2) + '' + ('0' + hoy.getDate()).slice(-2);

        if( val < hoy ){ return false; } else{ return true; }
    },

    dni : function(val){
        // Falta mejorar,  cuando entra 8595564F -> acepta letras despues de nuemeros
        el = parseInt(val);
        return !!(el > 0 && val.length == 8);
    }

};

var validator = ( function(){

    return {

        email : {
            required: false,
            message: 'Mail no válido',
            test: happy.email
        },

        dni : {
            required: true,
            message: '* DNI incorrecto',
            test: happy.dni
        },

        requiredDateMinToday : {
            required: true,
            message: 'Fecha incorrecta',
            test: happy.dateMinToday
        },

        required : {
            required: true,
            message: '* Campo requerido'
        },

        requiredCombo : {
            required : true,
            message: '* Seleccione una opción',
            test: happy.combo
        },

        phone : {
            required: true,
            message: '* Número telefónico incorrecto',
            test: happy.phone
        },

        numeric : {
            required: true,
            message: 'El número?',
            test: happy.numeric
        },

        numericPositive : {
            required: true,
            message: 'El número?',
            test: happy.numericPositive
        }

    }

} )();