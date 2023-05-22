// resources/js/script.js

$(document).ready(function () {
    $('#miTabla').DataTable({
        "pagingType": "full_numbers",
        "language": {
            "decimal": "",
            "emptyTable": "No hay datos disponibles en la tabla",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 de 0 registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron registros coincidentes",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": ">",
                "previous": "<"
            },
            "aria": {
                "sortAscending": ": activar para ordenar la columna en orden ascendente",
                "sortDescending": ": activar para ordenar la columna en orden descendente"
            }
        }
    });
});

