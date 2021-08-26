/* sidebar menu */
$('.sidebar-menu').tree()

/*data table*/
$(".tablas").DataTable({
    "language": {
        "sProcessing":  "Procesando",
        "sLengthMenu":  "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable":  "Ningun dato disponible en esta tabla",
        "sInfo":  "Mostrando registros del _START_ al _END_ de un  total de _TOTAL_",
        "sInfoEmpty":  "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":  "(Filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":  "",
        "sSearch":  "Buscar",
        "sUrl":  "",
        "sInfoThoudands":  ",",
        "sLoadingRecords":  "Cargando...",
        "oPaginate":  {
            "sFirst":  "Primero",
            "sLast":  "Ultimo",
            "sNext":  "Siguiente",
            "sPrevious":  "Anterior"
        },
        "oAria":    {
            "sSortAscending":   ": Activar para ordenar la columna de manera ascendente",
            "sSortDesending":   ": Activar para ordenar la columna de manera descendente"
        }
    }
});