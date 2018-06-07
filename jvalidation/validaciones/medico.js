$(function(){
/*Capturar el click del botón */
$("#btn").on("click", function(){
  /* Validar el formulario*/
  $("#formulario").validate({
    rules:/* Accedemos a los campos a través de su nombre: email, nombre, edad */
    {
    //email: {required: true, email: true, minlength: 5, maxlength: 80},
     cabeza: {required: true},
     amigdalas: {required: true},
     abdomen: {required: true},
     piel_anexos: {required: true},
     ojos: {required: true},
     cuello: {required: true},
     genitales: {required: true},
     neurologico: {required: true},
     oidos: {required: true},
     torax: {required: true},
     miembros_superiores: {required: true},
     muscular: {required: true},
     nariz: {required: true},
     pulmones: {required: true},
     miembros_inferiores: {required: true},
     vascular: {required: true},
     dentadura: {required: true},
     corazon: {required: true},
     columna: {required: true},
     oseo: {required: true},
     lengua: {required: true},
     hernias: {required: true},
     viceras: {required: true},
     otro_examen_fisico: {minlength: 3, maxlength: 120},
     observaciones_ex_fisico: {required: true, minlength: 3, maxlength: 1000},

     marcha: {required: true},
     miembros_superiores_funcionales: {required: true},
     coordinacion: {required: true},
     columna_funcional: {required: true},
     miembros_inferiores_funcionales: {required: true},
     reflejos: {required: true},
     phalen: {required: true},
     finkelstein: {required: true},
     braggard: {required: true},
     shober: {required: true},
     babinski_weil: {required: true},
     romber_sensibilidad: {required: true},
     romber: {required: true},
     tinel: {required: true},
     lasegue: {required: true},
     adams: {required: true},
     unterberger: {required: true},
     nariz_dedo: {required: true},

     m_superior_tono: {required: true},
     m_superior_fuerza: {required: true},
     m_superior_sensibilidad: {required: true},
     m_superior_arcosmovimiento: {required: true},
     m_inferior_tono: {required: true},
     m_inferior_fuerza: {required: true},
     m_inferior_sensibilidad: {required: true},
     m_inferior_arcosmovimiento: {required: true},
     hallazgos_funcionales: {required: true, minlength: 3, maxlength: 1000},
     otro_paraclinico: {minlength: 3, maxlength: 120},
     paradiagnostico: {minlength: 3, maxlength: 800},
     remision: {required: true},
     remision_desde: {minlength: 3, maxlength: 120},
     remision_hacia: {minlength: 3, maxlength: 120},
     especialidad: {minlength: 3, maxlength: 120},
     remision_motivo: {minlength: 3, maxlength: 1000},
     remision_pendiente: {required: true},
     observaciones_aptitud_laboral: {minlength: 3, maxlength: 1000},
     otro_enfasis: {minlength: 3, maxlength: 120},
     ef_no_defectos: {required: true},
     ef_disminuye_capacidad: {required: true},
     ef_condiciones_agravarse: {required: true},
     ef_condiciones_atendidas_eps_arl: {required: true},
     recomendacion_trabajador: {required: true, minlength: 3, maxlength: 1000},
     recomendacion_empleador: {required: true, minlength: 3, maxlength: 1000},
     restriccion_trabajador: {minlength: 3, maxlength: 1000},
     restriccion_empleador: {minlength: 3, maxlength: 1000},
     autorizacion: {required: true}
       //---
    },
    messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
    {
      cabeza: {required: 'Seleccionar'},
      amigdalas: {required: 'Seleccionar'},
      abdomen: {required: 'Seleccionar'},
      piel_anexos: {required: 'Seleccionar'},
      ojos: {required: 'Seleccionar'},
      cuello: {required: 'Seleccionar'},
      genitales: {required: 'Seleccionar'},
      neurologico: {required: 'Seleccionar'},
      oidos: {required: 'Seleccionar'},
      torax: {required: 'Seleccionar'},
      miembros_superiores: {required: 'Seleccionar'},
      muscular: {required: 'Seleccionar'},
      nariz: {required: 'Seleccionar'},
      pulmones: {required: 'Seleccionar'},
      miembros_inferiores: {required: 'Seleccionar'},
      vascular: {required: 'Seleccionar'},
      dentadura: {required: 'Seleccionar'},
      corazon: {required: 'Seleccionar'},
      columna: {required: 'Seleccionar'},
      oseo: {required: 'Seleccionar'},
      lengua: {required: 'Seleccionar'},
      hernias: {required: 'Seleccionar'},
      viceras: {required: 'Seleccionar'},
      otro_examen_fisico: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'},
      observaciones_ex_fisico: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},

      marcha: {required: 'Seleccionar'},
      miembros_superiores_funcionales: {required: 'Seleccionar'},
      coordinacion: {required: 'Seleccionar'},
      columna_funcional: {required: 'Seleccionar'},
      miembros_inferiores_funcionales: {required: 'Seleccionar'},
      reflejos: {required: 'Seleccionar'},
      phalen: {required: 'Seleccionar'},
      finkelstein: {required: 'Seleccionar'},
      braggard: {required: 'Seleccionar'},
      shober: {required: 'Seleccionar'},
      babinski_weil: {required: 'Seleccionar'},
      romber_sensibilidad: {required: 'Seleccionar'},
      romber: {required: 'Seleccionar'},
      tinel: {required: 'Seleccionar'},
      lasegue: {required: 'Seleccionar'},
      adams: {required: 'Seleccionar'},
      unterberger: {required: 'Seleccionar'},
      nariz_dedo: {required: 'Seleccionar'},

      m_superior_tono: {required: 'Seleccionar'},
      m_superior_fuerza: {required: 'Seleccionar'},
      m_superior_sensibilidad: {required: 'Seleccionar'},
      m_superior_arcosmovimiento: {required: 'Seleccionar'},
      m_inferior_tono: {required: 'Seleccionar'},
      m_inferior_fuerza: {required: 'Seleccionar'},
      m_inferior_sensibilidad: {required: 'Seleccionar'},
      m_inferior_arcosmovimiento: {required: 'Seleccionar'}, 
      hallazgos_funcionales: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
      otro_paraclinico: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'},
      paradiagnostico: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 800 caracteres'},
      remision: {required: 'Seleccionar una opcion'},
      remision_desde: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'},
      remision_hacia : {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'}, 
      especialidad : {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'},
      remision_motivo : {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'}, 
      remision_pendiente: {required: 'Seleccionar una opcion'},
      observaciones_aptitud_laboral: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
      otro_enfasis: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'}, 
      ef_no_defectos: {required: 'Seleccionar'},
      ef_disminuye_capacidad: {required: 'Seleccionar'},
      ef_condiciones_agravarse: {required: 'Seleccionar'},
      ef_condiciones_atendidas_eps_arl: {required: 'Seleccionar'},
      recomendacion_trabajador: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
      recomendacion_empleador: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
      restriccion_trabajador: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
      restriccion_empleador: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
      autorizacion: {required: '(Seleccionar una opcion)'}
      }
    });
  });
});
