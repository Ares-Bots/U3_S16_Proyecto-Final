$(document).ready(function() {
    var porcentaje = 0.15;
    var id_usuario = $('#id_usuario').val();
    buscar_usuario(id_usuario);

    function buscar_usuario(dato) {
        $.post('../Controller/ControladorUsuario.php', { dato, funcion: 'buscar_usuario' }, (response) => {
            const usuario = JSON.parse(response);
            $('#nombre2').text(usuario.nombre);
            $('#apellido2').text(usuario.apellido);
        });
    }

    loadProductos();

    function loadProductos() {
        $.ajax({
            url: '../Model/CargarDetalles.php', // Cambiar a la ruta correcta del archivo de carga de productos
            method: 'GET',
            success: function(data) {
                $('#Factura tbody').html(data);
                initializeDataTable();
                calcularSubtotal();
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
                "pageLength": 10,
                "scrollX": false,
                "autoWidth": true
            });
        }
    }

    function calcularSubtotal() {
        var subtotal = 0;
        $('#Factura tbody tr').each(function() {
            var cellValue = parseFloat($(this).find('td:eq(2)').text());
            if (!isNaN(cellValue)) {
                subtotal += cellValue;
            }
        });
        $('#subtotal_label').text(subtotal.toFixed(2));
        $('#subtotal').val(subtotal.toFixed(2)); // Establecer el valor del campo oculto
        calcularIVA(subtotal);
    }
    
    function calcularIVA(subtotal) {
        var iva = subtotal * porcentaje;
        $('#iva_label').text(iva.toFixed(2));
        $('#iva').val(iva.toFixed(2)); // Establecer el valor del campo oculto
        calcularTotal(subtotal, iva);
    }
    
    function calcularTotal(subtotal, iva) {
        var total = subtotal + iva;
        $('#total_label').text(total.toFixed(2));
        $('#total').val(total.toFixed(2)); // Establecer el valor del campo oculto
    }

    // Manejar el botón de borrar
    $('#cancelarCompraButton').on('click', function() {
        if (confirm('¿Estás seguro de que deseas cancelar esta compra?')) {
            $.ajax({
                url: '../Model/CancelarCompra.php',
                method: 'POST',
                success: function(response) {
                    alert(response);
                    window.location.href = '../View/VentaProductos.php';
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Error: " + textStatus + " - " + errorThrown);
                }
            });
        }
    });

});