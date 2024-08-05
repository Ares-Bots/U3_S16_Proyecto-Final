$(document).ready(function() {
    loadProductos();

    function loadProductos() {
        $.ajax({
            url: '../Model/CargarDetalles.php', // Cambiar a la ruta correcta del archivo de carga de productos
            method: 'GET',
            success: function(data) {
                $('#Factura tbody').html(data);
                initializeDataTable();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + textStatus + " - " + errorThrown);
            }
        });
    }

    function initializeDataTable() {
        if (!$.fn.DataTable.isDataTable('#Factura')) {
            $('#Factura').DataTable({
                "paging": false,
                "searching": false,
                "info": false,
                "lengthChange": false,
                "ordering": false,
                "autoWidth": true
            });
        }
    }
});