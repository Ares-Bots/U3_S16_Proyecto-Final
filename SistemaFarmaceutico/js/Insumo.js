
$(document).ready(function() {

    var funcion = '';
    var id_usuario = $('#id_usuario').val();
    buscar_usuario(id_usuario);
    
    function buscar_usuario(dato) {
        funcion='buscar_usuario';
        $.post('../Controller/ControladorUsuario.php',{dato,funcion},(response)=>{
            
            const usuario = JSON.parse(response);
            $('#nombre2').text(usuario.nombre);
            $('#apellido2').text(usuario.apellido);
        });
    }

    loadInsumos();

    function loadInsumos() {
        $.ajax({
            url: '../Model/CargarInsumo.php',
            method: 'GET',
            success: function(data) {
                $('#Cuentas tbody').html(data);
                initializeDataTable();
                $('#editButton').prop('disabled', true);
                $('#deleteButton').prop('disabled', true);
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
            "rowCallback": function(row, data, index) {
                var today = new Date();
                var dateText = data[8]; // Assuming the date is in the 9th column (index 8)
                if (dateText) {
                    var dateParts = dateText.split('-'); // Assuming date format is YYYY-MM-DD
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
        $('#id').val(row.data('id'));
        $('#id_producto').val(row.find('td:eq(0)').text());
        $('#nombre_prod').val(row.find('td:eq(1)').text());
        $('#laboratorio').val(row.find('td:eq(2)').text());
        $('#presentacion').val(row.find('td:eq(3)').text());
        $('#concentracion').val(row.find('td:eq(4)').text());
        $('#tipo_producto').val(row.find('td:eq(5)').text());
        $('#dis_cantidad').val(row.find('td:eq(6)').text());
        $('#precio_unitario').val(row.find('td:eq(7)').text());
        $('#fecha_vencimiento').val(row.find('td:eq(8)').text());
    }

    $('#Cuentas tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected').siblings().removeClass('selected');

        const selectedRow = getSelectedRow();
        if (selectedRow.length) {
            $('#editButton').prop('disabled', false);
            $('#deleteButton').prop('disabled', false);
        } else {
            $('#editButton').prop('disabled', true);
            $('#deleteButton').prop('disabled', true);
        }
    });

    $('#userForm').on('submit', function(event) {
        event.preventDefault();
        var actionUrl = $(this).find('#id').val() ? '../Controller/EditarInsumo.php' : '../Controller/NuevoInsumo.php';

        $.ajax({
            url: actionUrl,
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                $('#userModal').modal('hide');
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + textStatus + " - " + errorThrown);
            }
        });
    });

    $('#editButton').on('click', function() {
        var selectedRow = getSelectedRow();
        if (selectedRow.length) {
            populateModal(selectedRow);
            $('#userModalLabel').text('Editar Insumo');
            $('#userModal').modal('show');
        } else {
            alert('Por favor, seleccione una fila para editar.');
        }
    });

    $('#deleteButton').on('click', function() {
        var selectedRow = getSelectedRow();
        if (selectedRow.length) {
            if (confirm('¿Estás seguro de que deseas borrar este insumo médico?')) {
                $.ajax({
                    url: '../Controller/EliminarInsumo.php',
                    method: 'POST',
                    data: { id_producto: selectedRow.data('id') },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Error: " + textStatus + " - " + errorThrown);
                    }
                });
            }
        } else {
            alert('Por favor, seleccione una fila para borrar.');
        }
    });

});