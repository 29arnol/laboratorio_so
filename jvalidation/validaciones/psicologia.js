$(function(){

  /* Incluimos un método para validar el campo nombre */
  jQuery.validator.addMethod("texto", function(value, element) {
    return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
  }); 

  /* Capturar el click del botón */
  $("#btn").on("click", function(){
      /* Validar el formulario */
    $("#formulario").validate({
     rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
     {
       //email: {required: true, email: true, minlength: 5, maxlength: 80},
       orientacion: {required: true},
       orientacion_hallazgo:{required: true, maxlength: 1000},
       atencion: {required: true},
       atencion_hallazgo:{required: true, maxlength: 1000},
       sensopercepcion: {required: true},
       sensopercepcion_hallazgo:{required: true, maxlength: 1000},
       memoria: {required: true},
       memoria_hallazgo:{required: true, maxlength: 1000},
       pensamiento: {required: true},
       pensamiento_hallazgo:{required: true, maxlength: 1000},
       lenguaje: {required: true},
       lenguaje_hallazgo:{required: true, maxlength: 1000},
       concepto: {required: true},

     },

     messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
     {

       orientacion: {required: 'Seleccione'},
       orientacion_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       atencion: {required: 'Seleccione'},
       atencion_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       sensopercepcion: {required: 'Seleccione'},
       sensopercepcion_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       memoria: {required: 'Seleccione'},
       memoria_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       pensamiento: {required: 'Seleccione'},
       pensamiento_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       lenguaje: {required: 'Seleccione'},
       lenguaje_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       concepto: {required: 'Seleccione una opcion'},

     }
    });
  });
});