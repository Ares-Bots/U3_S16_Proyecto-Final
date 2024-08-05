
$(document).ready(function() {
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
            url: '../Model/CargarInsumo.php', // Cambiar a la ruta correcta del archivo de carga de productos
            method: 'GET',
            success: function(data) {
                $('#Cuentas tbody').html(data);
                initializeDataTable();
                $('#addToCartButton').prop('disabled', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + textStatus + " - " + errorThrown);
            }
        });
    }

    function initializeDataTable() {
        if ($.fn.DataTable.isDataTable('#Cuentas')) {
            $('#Cuentas').DataTable().destroy();
        }

        $('#Cuentas').DataTable({
            "paging": true,
            "searching": true,
            "info": true,
            "lengthChange": false,
            "pageLength": 10,
            "scrollX": false,
            "autoWidth": false,
            "rowCallback": function(row, data) {
                var today = new Date();
                var dateText = data[8];
                if (dateText) {
                    var dateParts = dateText.split('-');
                    var expiryDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);

                    if (expiryDate < today) {
                        $(row).addClass('expired');
                    } else {
                        var timeDiff = expiryDate - today;
                        var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
                        if (daysDiff <= 30) {
                            $(row).addClass('warning');
                        }
                    }
                }
            }
        });
    }

    function getSelectedRow() {
        return $('#Cuentas tbody tr.selected');
    }

    function populateModal(row) {
        var productId = row.find('td:eq(0)').text();
        var productName = row.find('td:eq(1)').text();
        var unitPrice = parseFloat(row.find('td:eq(7)').text());

        $('#producto_id').val(productId);
        $('#selectedProductLabel').text(productName);
        $('#quantityInput').val(1); // Reset quantity input
        calculateTotalValue(unitPrice);
    }

    $('#Cuentas tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected').siblings().removeClass('selected');

        const selectedRow = getSelectedRow();
        if (selectedRow.length) {
            $('#addToCartButton').prop('disabled', false);
        } else {
            $('#addToCartButton').prop('disabled', true);
        }
    });

    $('#addToCartButton').on('click', function() {
        var selectedRow = getSelectedRow();
        if (selectedRow.length) {
            populateModal(selectedRow);
            $('#userModalLabel').text('Añadiendo Producto a Carrito');
            $('#userModal').modal('show');
        } else {
            alert('Por favor, seleccione un producto para añadir al carrito.');
        }
    });

    $('#userForm').on('submit', function(event) {
        event.preventDefault();
        var productId = $('#producto_id').val();
        var cantidad = $('#quantityInput').val();
        var unitPrice = parseFloat(getSelectedRow().find('td:eq(7)').text());
        var precioTotal = unitPrice * cantidad;

        $.ajax({
            url: '../Controller/AgregarCarrito.php',
            method: 'POST',
            data: {
                producto_id: productId,
                cantidad: cantidad,
                precio: precioTotal
            },
            success: function(response) {
                alert('Producto añadido al carrito');
                $('#userModal').modal('hide');
                loadProductos();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + textStatus + " - " + errorThrown);
            }
        });
    });

    $('#quantityInput').on('input', function() {
        var unitPrice = parseFloat(getSelectedRow().find('td:eq(7)').text());
        calculateTotalValue(unitPrice);
    });

    function calculateTotalValue(unitPrice) {
        var cantidad = $('#quantityInput').val();
        var totalValue = unitPrice * cantidad;
        $('#totalValueLabel').text(totalValue.toFixed(2));
    }
});